<?php 

require 'environment.php';

global $config;
global $db;

$config = array();

if (ENVIRONMENT == 'development') {
	define('BASE_URL', 'http://localhost/nova_loja/');
	$config['dbname'] = 'nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else if (ENVIRONMENT == 'production') {
	define('BASE_URL', 'https://novalojab7web.000webhostapp.com/');
	$config['dbname'] = 'id19575230_nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'id19575230_gustavo_loja';
	$config['dbpass'] = 'u+Xb!)yNoX1mX6OT';
}

$config['default_lang'] = 'pt-br';

$db = new PDO('mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
