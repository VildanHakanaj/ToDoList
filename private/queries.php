<?php

/**
 * Insert the user and return the id
 *
 * @param $user
 * @return int {the id of the row}
 * */
function insertUser($user){
    global $db;
    $sql = 'INSERT INTO users (name, email, uid, pass) VALUES (:name, :email, :username, :pass)';
    $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
    $db->prepare($sql)->execute([$user['name'], $user['email'], $user['username'], $user['password'], ]);

    return $db->lastInsertId();
}

/**
 * Check if some data is unique in the give table
 *
 *
 * @param $data, $table
 * @return boolean
 * */
function isUnique($data, $table){

    global $db;
    $sql = 'SELECT * FROM ' . $table . ' WHERE uid = :data';
    $stm = $db->prepare($sql);
    $stm->execute([$data]);
    if($stm->fetch()){
        return false;
    }

    return true;
}

function getAllItems($id){

    global $db;

    $sql = "SELECT * FROM items WHERE user_id = :id";

    $stm = $db->prepare($sql);
    $stm->execute([$id]);
    $row = $stm->fetchAll();

    if($stm->rowCount() > 0){
        return $row;
    }

    return false;
}

function insertItem($item, $user_id){

    global $db;

    $sql = "INSERT INTO items (`user_id`, `title`, `priority`) VALUES(:user_id, :title, :priority)";
    $stm = $db->prepare($sql);

    $stm = $stm->execute([$user_id, $item['title'], $item['priority']]);
}