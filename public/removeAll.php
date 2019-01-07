<?php require_once('../private/init.php');
$id = $_GET['user_id'] ?? '';
removeAllItems($id);