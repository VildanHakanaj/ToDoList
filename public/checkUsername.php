<?php

require_once('../private/init.php');

$username = $_POST['username'] ?? '';

if(!empty($username)){
    return isUnique($username);
}

