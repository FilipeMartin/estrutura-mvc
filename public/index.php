<?php
session_start();
require_once '../app/config.php';

spl_autoLoad_register(function($class){

	if(file_exists('../app/controllers/'.$class.'.php')){
		require_once '../app/controllers/'.$class.'.php';
	}
	else if(file_exists('../app/models/'.$class.'.php')){
		require_once '../app/models/'.$class.'.php';
	}
	else if(file_exists('../app/core/'.$class.'.php')){
		require_once '../app/core/'.$class.'.php';
	}

});

$core = new Core();
$core->run();