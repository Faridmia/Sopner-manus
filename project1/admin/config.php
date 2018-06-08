<?php
	//error_reporting(0);//only for production server
	error_reporting(E_ALL);//ONLY for development server
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');

	define('DB_PASS', '');

	define('DB_NAME', 'php90');

	date_default_timezone_set('Asia/Dhaka');

	spl_autoload_register(function($class){
		require_once ('classes/'.strtolower($class).'.php');
	});


?>