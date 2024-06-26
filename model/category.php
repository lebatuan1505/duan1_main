<?php
require_once 'pdo.php';

function addCategory($name){
    $sql = "INSERT INTO `danhmuc`(`name_dm`) VALUES ('$name')";
    pdo_execute($sql);
}
function delete($id_dm){
    $sql="DELETE FROM `danhmuc` WHERE id_dm=$id_dm";
    pdo_query_one($sql);
}
function loadAll(){
    $sql="SELECT * FROM `danhmuc`";
    $listCat = pdo_query($sql);
    return $listCat;
}
function LoadById($id_dm){
    $sql="SELECT * FROM `danhmuc` WHERE id_dm = $id_dm";
    $info = pdo_query($sql);
    return $info;
}
function update_category($id_dm ,$name){
$sql = "UPDATE `danhmuc` SET `name_dm`='$name' WHERE id_dm = $id_dm";
pdo_execute($sql);
}
function   updateCategory($id_dm,$name){
    $sql= "UPDATE `danhmuc` SET `name_dm`='$name' WHERE id_dm = $id_dm";
    pdo_execute($sql);
}
function nameById($id_dm){
    $sql= "SELECT name_dm FROM `danhmuc` WHERE id_dm = $id_dm ";
    $name = pdo_query_one($sql);
    return $name;
}

function check_dm($name_dm){
    $sql="SELECT name_dm FROM danhmuc WHERE name_dm = '$name_dm'";
    return pdo_query_one($sql);
}


?>