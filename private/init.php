<?php
session_start();
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_ROOT', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_ROOT . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/shared');

//Contains all the database class
require_once('library.php');
//Database connection instance
$db = new Db();
//Contains all the main functions
require_once('functions.php');
//Contains all the items function
require_once('items.php');