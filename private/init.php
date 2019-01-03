<?php
session_start();
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_ROOT', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_ROOT . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/shared');

require_once('library.php');
$db = new Db();
require_once('functions.php');