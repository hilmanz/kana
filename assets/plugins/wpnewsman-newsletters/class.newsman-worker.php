<?php

require_once(__DIR__.DIRECTORY_SEPARATOR."class.utils.php");
require_once(__DIR__.DIRECTORY_SEPARATOR."class.options.php");
require_once(__DIR__.DIRECTORY_SEPARATOR."class.ajax-fork.php");
require_once(__DIR__.DIRECTORY_SEPARATOR."class.timestamps.php");

//require_once(__DIR__.DIRECTORY_SEPARATOR."lib/php-growl/class.growl.php");

// http://cubicspot.blogspot.com/2010/10/forget-flock-and-system-v-semaphores.html

class newsmanWorkerBase {

	var $_db;
	var $_table;

	function __construct() {
		global $wpdb;
		$this->_db = $wpdb;
		$this->_table = $wpdb->prefix.'newsman_mqueue';

		$this->createTable();		
	}

	private function createTable() {
		if ( !$this->tableExists() ) {
			$sql = "CREATE TABLE $this->_table (
					`id` int(10) unsigned NOT NULL auto_increment,
					`processed` tinyint(1) unsigned NOT NULL DEFAULT 0,
					`workerId` varchar(255) NOT NULL DEFAULT '',
					`method` varchar(255) NOT NULL DEFAULT '',
					`arguments` varchar(255) NOT NULL DEFAULT '',
					`result` text NOT NULL DEFAULT '',
					PRIMARY KEY (`id`),
							KEY (`workerId`)
					) CHARSET=utf8";

			$result = $this->_db->query($sql);			
		}
	}

	static function dropTable() {
		global $wpdb;
		return $wpdb->query("DROP TABLE IF EXISTS ".$wpdb->prefix."newsman_mqueue");
	}	

	private function tableExists() {
		$sql = $this->_db->prepare("show tables like '%s';", $this->_table);
		return $this->_db->get_var($sql) == $this->_table;
	}	
}

class newsmanWorker extends newsmanWorkerBase {

	var $secret = '';
	var $u = null;
	var $stopped = false;
	var $pid = null;
	var $lockfile = null;
	var $ts = null;

	var $pm_iv = null;

	var $workerId;

	var $db;
	var $mtable;

	public function __construct($workerId) {
		parent::__construct();

		$this->workerId = $workerId;

		if ( class_exists('Growl') ) {
			$this->growl_connection = array('address' => '127.0.0.1', 'password' => 'glocksoft');
			$this->oGrowl = new Growl();			
		}

		$newsmanAdmin = function_exists('current_user_can') && current_user_can( 'newsman_wpNewsman' );

		$o = newsmanOptions::getInstance();
		$this->secret = $o->get('secret');

		if ( defined('NEWSMAN_WORKER') && ( !defined('NEWSMAN_DEBUG') || NEWSMAN_DEBUG === false ) ) {
			if ( !$newsmanAdmin && $_REQUEST['secret'] !== $this->secret ) {
				die('0');
			}
		}	

		$this->tryRemoveAjaxFork();	

		$this->u = newsmanUtils::getInstance();
	}

	public function stop() {
		$this->stopped = true;
		return true;
	}

	public function isRunning() {
		return !$this->stopped;
	}

	private function tryRemoveAjaxFork() {
		if ( defined('NEWSMAN_WORKER') && isset($_REQUEST['ts']) ) {
			$fork = newsmanAjaxFork::findOne('ts = %s', array($_REQUEST['ts']));
			if ( $fork ) {
				$fork->remove();
			}
		}
	}

	public function growl($str) {
		if ( isset($this->oGrowl) && $this->oGrowl ) {
			$this->oGrowl->addNotification('newsman_worker');
			$this->oGrowl->register($this->growl_connection);

			$this->oGrowl->notify($this->growl_connection, 'newsman_worker', get_called_class(), $str);			
		}
	}	

	/**
	 * This function should be implemented in the ancestor
	 */
	public function worker() {

	}

	public function run($worker_lock = null) {

		$u = newsmanUtils::getInstance();
		$u->log('[newsmanWorker run] worker_lock %s', $worker_lock);

		$this->processMessages();

		if ( $worker_lock === null ) {
			$this->worker();
		} else {
			//$u->log('locking %s', $worker_lock);
			if ( $this->lock($worker_lock) ) { // returns true if lock was successfully enabled
				//$u->log('running worker method...');
				$this->worker();
				$this->unlock();
			}
		}

		$this->processMessages();
		$this->clearTimestamp();
	}

	/*******************************************************
	 * Message Loop Functions	 
	 *******************************************************/

	public function setTimestamp() {
		$t = newsmanTimestamps::getInstance();
		$t->setTS($this->workerId);
	}

	public function clearTimestamp() {
		$t = newsmanTimestamps::getInstance();
		$t->deleteTS($this->workerId);
	}

	public function processMessages() {

		$u = newsmanUtils::getInstance();
		//$u->log('[newsmanWorker processMessages]');

		if ( $this->pm_iv !== null ) {
			$now = microtime(true);	

			if ( $now - $this->pm_iv < 0.2 ) { // return if < then 200 ms elapsed since last call
				return;
			}
		}

		$this->setTimestamp();

		$sql = "SELECT * FROM $this->_table WHERE `workerId` = %s AND `processed` = 0";
		$sql = $this->_db->prepare($sql, $this->workerId);
		$res = $this->_db->get_results($sql);
		if ( is_array($res) ) {
			foreach ($res as $c) {
				if ( method_exists($this, $c->method) ) {
					$args = @unserialize($c->arguments);
					$args = is_array($args) ? $args : array();

					$res = call_user_func_array(array($this, $c->method), $args);
					$res = serialize($res);

					$sql = "UPDATE $this->_table SET `processed` = 1, `result` = %s WHERE `id` = %d";
					$sql = $this->_db->prepare($sql, $res, $c->id);

					$this->_db->query($sql);
				}
			}
		}

		$this->pm_iv = microtime(true);
	}

	/*******************************************************
	 * STATIC functions
	 *******************************************************/

	static function fork($params = array()) {
		$o = newsmanOptions::getInstance();
		$secret = $o->get('secret');

		$u = newsmanUtils::getInstance();

		//$workerURL = NEWSMAN_PLUGIN_URL.'/worker.php';
		$workerURL = NEWSMAN_BLOG_ADMIN_URL.'admin.php?page=newsman-settings';
		
		$params['newsman_worker_fork'] = get_called_class();
		$params['ts'] = sprintf( '%.22F', microtime( true ) );
		$params['workerId'] = $params['ts'].rand(1,100);

		if ( defined('ALTERNATE_WP_CRON') && ALTERNATE_WP_CRON ) {
			$u->log('[newsmanWorker::fork] ALTERNATE_WP_CRON MODE');
			// passing url to the ajax forker
			$fork = new newsmanAjaxFork();
			$fork->ts = $params['ts'];
			$fork->method = 'post';
			$fork->url = $workerURL;
			$fork->body = http_build_query($params);
			$fork->save();
			
		} else {
			$u->log('[newsmanWorker::fork] NORMAL MODE');
			$u->log('[newsmanWorker::fork] worker url %s', $workerURL);
			$u->log('[newsmanWorker::fork] worker url params %s', print_r($params, true));
			// exposing secret only in loopback requests

			$params['secret'] = $secret;
			$r = wp_remote_post(
				$workerURL,
				array(
					'timeout' => 0.01,
					'blocking' => false,
					'body' => $params
				)
			);

			$u->log('[newsmanWorker::fork] '.print_r($r , true));
		}
		return $params['workerId'];
	}

	static function getTmpDir() {
		$u = newsmanUtils::getInstance();
		return $u->addTrSlash(sys_get_temp_dir(), 'path');
	}

	// ----------------------

	/**
	 * Creates lock for some unique value(worker_lock - for example it can be an email id) so other 
	 * workers will not be able to run without obtaining the lock
	 */ 
	public function lock($worker_lock) {
		$this->lockfile = 'newsman-worker-'.$worker_lock;
		return $this->u->lock($this->lockfile);
	}

	public function unlock() {
		if ( $this->lockfile ) {
			return $this->u->releaseLock($this->lockfile);
		}
	}
}

class newsmanWorkerAvatar extends newsmanWorkerBase {

	var $workerId;

	function __construct($workerId) {
		parent::__construct();

		$this->workerId = $workerId;		
		$this->u = newsmanUtils::getInstance();
	}

	function __call($name, $arguments) {
		//$this->u->log("calling $name");
		$opId = $this->_writeCall($name, $arguments);
		$res = $this->_waitForResult($opId);
		return $res;
	}

	function _writeCall($method, $arguments){
		$sql = "INSERT INTO $this->_table (`workerId`,`method`,`arguments`) VALUES(%s, %s, %s);";
		$sql = $this->_db->prepare($sql, $this->workerId, $method, serialize($arguments));
		$res = $this->_db->query($sql);
		if ( $res === 1 ) {
			return $this->_db->insert_id;
		} else {
			return NULL;
		}
	}

	function _waitForResult($opId) {
		$totalWait = 10000000; // mks
		$count = 0; // 50 * 100 ms = 5s 
		$res = NULL;
		while ( $res === NULL ) {
			$count += 1;
			$res = $this->_getOpResult($opId);
			$s = 100000*$count;
			usleep($s); // 100 ms
			$totalWait -= $s;
			if ( $totalWait <= 0 ) { break; }
		}
		if ( $res !== NULL ) {
			$this->_clearOpResult($opId);
		}
		return $res;
	}

	function _getOpResult($opId) {
		$sql = "SELECT `result` from $this->_table WHERE `id` = %d AND `processed` = 1";
		$sql = $this->_db->prepare($sql, $opId);

		$res = $this->_db->get_var($sql);

		if ( $res === NULL ) {
			//$this->u->log('_getOpResult(opId = '.$opId.') - NULL');
			return NULL;
		}

		$data = @unserialize($res);
		//$this->u->log('_getOpResult(opId = '.$opId.') - '.$res.', data - '.$data);
		if ($res === 'b:0;' || $data !== false) {
			return $data;
		} else {
			return NULL;
		}
	}

	function _clearOpResult($opId) {
		$sql = "DELETE FROM $this->_table WHERE id = %s";
		$sql = $this->_db->prepare($sql, $opId);
		$this->_db->query($sql);
	}
}