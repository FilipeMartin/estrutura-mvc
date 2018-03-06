<?php
require_once 'environment.php';

if(ENVIRONMENT == 'development'){
	define('BASE_URL', 'http://localhost/');

	$config['host'] = 'localhost';
	$config['dbname'] = 'login_mvc';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}else{
	define('BASE_URL', 'http://localhost/');

	$config['host'] = 'localhost';
	$config['dbname'] = 'login_mvc';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;

try {
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
	$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['dbuser'], $config['dbpass'], $options);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $ex){
	echo "ERRO: ".$ex->getMessage();
}
