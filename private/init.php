<?php
session_start();
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_ROOT', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_ROOT . '/public');
define('SHARED_PATH', PRIVATE_PATH . '/shared');
define('DS', DIRECTORY_SEPARATOR);
function dd($var = null, $option = null){

    if(is_numeric($var)){
        echo $var;
        die();
    }

    if(is_array($var) ){
        if($option == 'print'){
            echo '<pre>';
            print_r($var);
            echo '</pre>';
        }else{
            echo "<pre>";
            die(print_r($var));
        }
    }else{

        if(!is_null($var)){
            die($var);
        }
        die("Here");
    }
}



//Contains all the database class
require_once('library.php');
//Database connection instance
$db = dbConnect();
//Contains all the main functions
require_once('functions.php');

//contains all the queries;
require_once 'queries.php';

//Contains all the items function
require_once('items.php');
