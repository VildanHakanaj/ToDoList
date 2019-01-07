<?php
function getItems($userId){
    global $db;
    $sql = "SELECT * FROM items WHERE user_id = " . $userId;
    return $db->select($sql);
}

function delete_item($userId){
    $sql = "DELETE FROM items where user_id = " . $userId;
}

function updateBought($itemId, $value){
    global $db;
    
    $sql = "UPDATE items SET bought = ?";
    
    $sql = $sql . "WHERE id = ?";
    
    $type = "ii";
    
    $params = array(&$value, &$itemId);

    $db->query_param($sql, $type, $params);
}
    