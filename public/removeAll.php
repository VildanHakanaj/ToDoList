<?php
require_once '../private/init.php';
$pdo = dbConnect();
if(isset($_GET['id'])){
    $sql = "DELETE FROM items WHERE user_id = " . $_GET['id'];
    $pdo->query($sql);
    header('Location: index.php');
}