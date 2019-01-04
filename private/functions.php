<?php
function validateSignup($user, $errors){
    //Check if the fileds are empty or not.
    if(isFieldEmpty($user, $errors)){
        return $errors['empty'] = "Please fill all the fields";
    }else{
        //Check only if all the fields have content 
        if(!isMinLen($user['name'], 3)){
            $errors['name'] = "Name needs to be at leas 3 character long";
        }

        if(!verifyEmail($user['email'])){
            $errors['email'] = "Please enter a valid email";
        }

        if(!isMinLen($user['pass'], 6)){
            $errors['pass'] = "Password needs to be at least 6 character long";
        }
    }
    return $errors;
}

//Validate the login section
function validateLogin($user){
    $errors = array();
    if(isFieldEmpty){

    }else{

    }
}

//Check if the user fields are empty or not
function isFieldEmpty($user, $errors){
    foreach($user as $field){
        if(empty($field)){
            return true;
        }
    }
    return $false;
}

//Check if email is correct format
function verifyEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }
    return true;
}

//Check if string is proper size
function isMinLen($string, $len){
    if(strlen($string) < $len){
        return false;
    }
    return true;
}

function print_array($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function isPostRequest(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGetRequest(){
    return $_SERVER['REQUEST_METHOD'] == "GET";
}