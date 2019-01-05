<?php
/**
 * This function will validate the user registration
 * @return $errors --> all the error messages
 * @param $user --> the user field to be validated
 */
function validateSignup($user){
    $errors = array();
    //Check if the fileds are empty or not.
    if(isFieldEmpty($user)){
        return $errors['empty'] = "Please fill all the fields";
    }else{//Only if all the fields have something in them

        //Check the length of username
        if(!isMinLen($user['uid'], 3)){
            $errors['uid'] = "Username needs to be at least 3 character long";
            //check if the username is unique
        }else if( !isUnique($user['uid'] )){
            $errors['uid'] = "Username already exists";
        }

        //Check if the email is correct format 
        if(!verifyEmail($user['email'])){
            $errors['email'] = "Please enter a valid email";
        }

        //Check the passwords length
        if(!isMinLen($user['pass'], 6)){
            $errors['pass'] = "Password needs to be at least 6 character long";
        }
    }
    return $errors;
}

/*
    This function will validate the login credential 
    against the database
    return $errors array with error messages
    return
 */
function validateLogin($user){
    global $db;
    //Check if the fields are filled
    if(!isFieldEmpty($user)){
        //Select by username
        $results = select_by_username($user['uid']);
        //Check if there was a hit
        if($results->num_rows > 0){
            //There is a match
            $row = $results->fetch_assoc();
            //Make sure the password is correct
            if( $row['uid'] == $user['uid'] && password_verify($user['pass'], $row['pass'])){
                return $row;
            }
        }
    }
    return false;
}

#region Helper Methods
/**
 * This function will utilize the createNewUser method
 * to create a new user and getting the id from the insertion
 * then will use the session and store the variables
 */
function registerUser($user){
    
    $id = createNewUser($user);

    $_SESSION['uid'] = $user['uid'];
    $_SESSION['id'] = $id;    

    header('Location: /index.php');
    exit();
}

/**
 * This function will check if the user 
 * is logged in or not
 * 
 * @return false --> if the user is not logged in
 * @return true --> if the user is looged in  
 */
function isLoggedIn(){
    return isset($_SESSION['id']);
}

/**
 * This function will check if the 
 * username already exists in the 
 * database;
 * @param $username --> username you want to check
 * @return true if the username is unique
 * @return false if the username is not unique 
 */
function isUnique($username){
    $results = select_by_username($username);
    return ($results->num_rows > 0) ? false : true;
 }

#endregion 

#region Queries
/**
 * This function will create an new sql statement
 * hash the password and try and store the new user in
 * the database
 * 
 * @param $user = [] --> is the users information taken from the form
 * @return $id ==> return the id of the this user
 */
function createNewUser($user){
    global $db;

    $hash = password_hash($user['pass'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (`name`,`email`,`uid`,`pass` ) ";
    $sql = $sql . "VALUES(?,?,?,?)";
    $type = 'ssss';
    
    $params = array(&$user['name'], &$user['email'], &$user['uid'], &$hash);
    
    return $db->insert_param($sql, $type, $params);
}
#endregion
/**
 * This function will login the user
 * after the user is verified to be in the database
 * creates the session
 * 
 * @redirects the user to the home page
 */
function loginUser($rows = []){
   
   $_SESSION['uid'] = $rows['uid'];
   $_SESSION['id'] = $rows['id']; 

   header('Location: /index.php');
   exit();
   
}

//Select by the username
function select_by_username($username){
    global $db;
    $sql = "SELECT * FROM ";
    $sql = $sql . " users WHERE uid = ?";
    $type = 's';
    $params = array(&$username);
    return $db->select_param($sql, $type, $params);
}

//Check if the user fields are empty or not
function isFieldEmpty($user){
    foreach($user as $field){
        if(empty($field)){
            return true;
        }
    }
    return false;
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