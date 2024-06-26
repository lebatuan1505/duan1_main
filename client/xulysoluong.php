<?php
session_start();

// Kiểm tra xem có tồn tại mảng giỏ hàng hay không.
if (!isset($_SESSION['cart'])) {
    // Nếu không có thì đi khởi tạo
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ request POST
    $id_sp = $_POST['id_sp'];
    $soluongcart = $_POST['soluongcart'];

    // Tìm kiếm sản phẩm trong giỏ hàng
    $index = array_search($id_sp, array_column($_SESSION['cart'], 'id_sp'));

    // Nếu sản phẩm tồn tại trong giỏ hàng, cập nhật số lượng
    if ($index !== false) {
        $_SESSION['cart'][$index]['soluongcart'] = $soluongcart;
    }

    // Trả về số lượng sản phẩm đã được cập nhật trong giỏ hàng
    header('Location: tablecart.php?soluong=' . $newQuantity);
    exit();
} else {
    // Trường hợp không phải là request POST, trả về thông báo lỗi
    echo 'Yêu cầu không hợp lệ';
}
?>
