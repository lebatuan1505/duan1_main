<?php

    function select_hoadon($kyc, $sgia)
    {
        if ($kyc != "") {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and id_bill =" . $kyc;
        } else if ($sgia > 0) {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and tongbill >=" . $sgia;
        }else{
            $sql = "select * from bill inner join user on bill.id_user = user.id_user order by id_bill desc";
        }
        $listhd = pdo_query($sql);
        return $listhd;
    }   

function loadBill(){
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user
    ORDER BY id_bill DESC";
    $resutl = pdo_query($sql);
    return $resutl;
}
function select_billhoadon(){
    $sql = "select * from cart order by id_cart desc";
    $listbhd = pdo_query($sql);
    return $listbhd;
}
function capnhat_tthd($trangthain, $id_bill)
{
    $sql = "update bill set trangthai='" . $trangthain . "' where id_bill=" . $id_bill;
    pdo_execute($sql);
}
function loadBill_admin($page,$soSp){
    if (empty($page) || $page == 0) {
        $page = 1;
    }

    $batdau = ($page - 1) * $soSp;
    // Sửa lại cách nối chuỗi trong truy vấn
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user
    WHERE id_bill 
    LIMIT ".$batdau.",".$soSp;
    $list = pdo_query($sql);
    return $list;
}
function  hien_thi_so_trang_order($total,$soSp){
    $product = count($total);
    $number = ceil($product / $soSp);
    $html = ""; 
    for($i=1; $i <= $number; $i++){
        $html .= ' <a class="page-link text-black" href="index.php?act=list-carts&page='.$i.'">'.$i.'</a>';
    }
    return $html;
}
function content($content){
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user WHERE id_bill = $content";
    $resutl = pdo_query($sql);
    return $resutl;
}
function hien_thi($total,$soSp){
    $product = count($total);
    $number = ceil($product / $soSp);
    $html = ""; 
    for($i=1; $i <= $number; $i++){
        $html .= ' <a class="page-link text-black" href="index.php?act=list-carts&page='.$i.'">'.$i.'</a>';
    }
    return $html;
}
?>