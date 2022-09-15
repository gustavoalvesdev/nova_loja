<?php 

session_start();

require 'config.php';

require 'vendor/autoload.php';

use Core\Core;

$core = new Core();
$core->run();
