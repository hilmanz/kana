/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

var ckeditorBasePath = CKEDITOR.basePath.substr(0, CKEDITOR.basePath.indexOf("ckeditor/"));
var customPluginsRoot = ckeditorBasePath+ 'custom_plugins/';

CKEDITOR.plugins.addExternal('iframedialog', customPluginsRoot+'iframedialog/plugin.js', '');
CKEDITOR.plugins.addExternal('newsman_insert_posts', customPluginsRoot+'newsman_insert_posts/plugin.js', '');
CKEDITOR.plugins.addExternal('newsman_add_wp_media', customPluginsRoot+'newsman_add_wp_media/plugin.js', '');
CKEDITOR.plugins.addExternal('newsman_save', customPluginsRoot+'newsman_save/plugin.js', '');	
CKEDITOR.plugins.addExternal('newsmanshortcodes', customPluginsRoot+'newsman_shortcodes/plugin.js', '');	
CKEDITOR.plugins.addExternal('newsman_ui_label', customPluginsRoot+'newsman_ui_label/plugin.js', '');

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// config.width = 'auto';

	// config.resize_minWidth = 800;
	// config.resize_minHeight = 600;	

	config.entities = false;
	config.entities_latin = false;

	config.resize_enabled = true;

	config.extraPlugins = 'newsman_ui_label,iframedialog,newsman_insert_posts,newsman_add_wp_media,newsman_save,newsmanshortcodes';

	//config.toolbar = 'NEWSMAN';

	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;	

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'first', 	   groups: ['newsmanSave', 'mode'] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'newsmanBar' },
		'/',
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'links' },
		{ name: 'insert' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },		
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'document', 'doctools' ] },
		{ name: 'others' },
		{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript,Save,Styles';
};
