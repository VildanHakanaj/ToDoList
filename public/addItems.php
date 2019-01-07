<?php 
$errors = [];

    if(isPostRequest()){
        $user_id = $_GET['userd_id'] ?? '';
        $title = htmlentities(strip_tags($_POST['title'])) ?? '';
        if(empty($title)){
            $errors['empty'] = 'Please enter a title';
        }else if(!isMinLen($title, 3)){
            $error['len'] = 'Title need to be at leas 3 characters';
        }

        if(empty($errors)){
            die($_POST);
        }
    }

    
?>