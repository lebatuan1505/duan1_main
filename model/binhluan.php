<?php
function loadAllcmt(){
    $sql = "SELECT cmt.id_cmt, cmt.content_cmt, cmt.id_user, cmt.time, cmt.id_sp, us.name_user as name_user, us.avatar as avatar  FROM `binhluan` as cmt 
    INNER JOIN `user` as us
    ON cmt.id_user = us.id_user
    WHERE id_sp";
    $result = pdo_query($sql);
    return $result;
}
function addCmt($cmt,$id_sp,$id_user,$time){
    $sql="INSERT INTO `binhluan`( `content_cmt`,`id_sp`,`id_user`,`time`) VALUES ('$cmt','$id_sp','$id_user','$time')";
    pdo_execute($sql);
}
?>

