<?php

function isPostRequest(){
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

/**
 * Validate the user input
 *
 * @param $user
 *
 * @return array
 * */
function validateUser($user){

    $errors = [];

    if(isFieldEmpty($user)){
        return ['empty' => 'Please make sure to fill in all the fields'];
    }

    if(!isLength($user['name'], 2, 255)){
        $errors['name'] = "Name need to be longer than 2 char and less than 255";
    }

    $user['email'] = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Please enter the correct email";
    }

    if(!isLength($user['username'], 3, 255)){

        $errors['username'] = "Username to short or long";

    }else if(!isUnique($user['username'], 'users')){
        $errors['username'] = "Username is already taken";
    }

    if(!isLength($user['password'], 6, 255)){
        $errors['password'] = "Password needs to be at least 6 characters and at most 255 char";
    }

    return $errors;
}

/**
 * Validate the user trying to log in
 *
 * @params $username, $password
 * @return boolean, integer
 *
 * */
function validateLogin($username, $password){

    global $db;

    $sql=  "SELECT * FROM users WHERE uid = :username LIMIT 1";
    $stm = $db->prepare($sql);
    $stm->execute([$username]);
//    $row = $stm->fetch();
    if($row = $stm->fetch()){

        if(password_verify($password, $row['pass'])){
            return $row['id'];
        }
    }

    return false;

}

function isLoggedIn(){
    return isset($_SESSION['id']) ? true : false;
}

function checkCredentials($username, $password){
    global $db;
    $sql = "SELECT * FROM users WHERE uid = :username COUNT 1";

    $stm = $db->prepare($sql);
    $stm->execute([$username]);

    if($stm->fetch()){
        dd($stm->fetch());
    }

}

/**
 * Inserts The user in
 *
 *
 * */

/**
 * Gets the data from the given array
 *
 * @param $data;
 * @return array;
 * */
function getValues($data){
    foreach($data as $input => $value){
        $arr[$input]=  htmlspecialchars(htmlentities(strip_tags($data[$input])));
    }
    return $arr;
}

/**
 * Check if the string meet the length
 *
 * @params $string, $min, $max
 * @return boolean
 * */
function isLength($string, $min, $max){

    if(strlen($string) < $min || strlen($string) > $max){
        return false;
    }

    return true;

}

/**
 * Check if any field is empty
 *
 * @param $user;
 *
 * @return boolean
 * */
function isFieldEmpty($user){
    foreach($user as $input){
        if(empty($input)){
            return true;
        }
    }
    return false;
}




