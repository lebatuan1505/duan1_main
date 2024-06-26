<?php
require_once 'pdo.php';

function register($name, $email, $password){
    $sql="INSERT INTO `user`(`name_user`, `email`, `password`) VALUES ('$name','$email','$password')";
    pdo_execute($sql);
}
function checklogin($email,$password){
    $sql="SELECT * FROM `user` WHERE email='".$email."' AND password='".$password."'";
    $check = pdo_query_one($sql);
    return $check;
}
function update_profile($id_user,$name_user,$gender,$avatar,$email,$sdt,$diachi){
    $sql="UPDATE `user` SET `name_user`='$name_user',`gender`='$gender',`avatar`='$avatar',`email`='$email',`sdt`='$sdt',`diachi`='$diachi' WHERE id_user = $id_user";
    pdo_execute($sql);
}
function updateImage($newImage, $oldImagePath)
{
    $target_dir = "../img/";

    // Kiểm tra xem có ảnh mới được tải lên không
    if (!empty($newImage["name"])) {
        // Tạo đường dẫn mới cho ảnh
        $newImagePath = $target_dir . basename($newImage["name"]);

        // Di chuyển ảnh mới vào thư mục upload
        move_uploaded_file($newImage["tmp_name"], $newImagePath);

        return $newImagePath;
    } else {
        // Nếu không có ảnh mới, giữ nguyên đường dẫn ảnh cũ
        return $oldImagePath;
    }
}
function loadAllUser(){
    $sql="SELECT * FROM `user` ";
    $result = pdo_query($sql);
    return $result;
}
function loadUser($id_user){
    $sql= "SELECT * FROM `user` WHERE id_user = $id_user";
    $result = pdo_query($sql);
    return $result;
}
function checkAccountExist($email){
    $sql="SELECT email FROM `user` WHERE email= $email";
    $result = pdo_query($sql);
    return $result;
}
function update_user($role,$id_user){
    $sql="UPDATE `user` SET `role`='$role' WHERE id_user = $id_user";
    pdo_execute($sql);
}
function del_user($id_user){
    $sql="DELETE FROM `user` WHERE id_user = $id_user";
    pdo_execute($sql);
}
?>