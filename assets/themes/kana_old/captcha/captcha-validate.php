<?php
/* captcha-validate file */

session_start();

if(strtolower($_POST['answer']) == $_SESSION['captcha'])
	echo 'Captcha solved sucesfully! Do something ...';
else
	echo 'Sorry, captcha not solved !';
	
unset($_SESSION['captcha']);	
?>