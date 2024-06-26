<?php
if(!empty($_SESSION['user'])){
    extract($_SESSION['user']);
}else{
    header('Location: ?act=login');
}
?>
<!-- Begin Kenne's Breadcrumb Area -->

<div class="kenne-login-register_area m-5">
    <div class="container">
        <div class="row">
            <div class="ttcanhan">
                <div class="titleh3">
                    <h3 class="text-center">Thông tin người nhận</h3>
                </div>
                <div>
                    <p><u>Người nhận hàng: </u><b><?= $name_user ?></b></p>
                    <p><u>Số điện thoại: </u><b><?= $sdt ?></b></p>
                  
                    <p><u>Nơi nhận hàng: </u><b><?= $diachi ?></b></p>
                </div> <hr>
            </div>
            <div class="titleh3 m-4">
                <h3 class="text-center">Chi tiết hóa đơn</h3>
            </div>
            <table class="tbcthd table border">
                <thead class="table-dark">
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Ngày đặt hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái hóa đơn</th>
                        <th>Trạng thái thanh toán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $listhd = select_hoadon(null, null);
                    foreach ($listhd as $lhd) {
                        extract($lhd);
                        $idfhd = $_GET['id_bill'];
                        if ($id_user == $_SESSION['user']['id_user'] && $id_bill == $_GET['id_bill']) {
                            $tthoadon = $tongbill;
                            $trangthaihd = $trangthai;
                            $trangthai_tt = $trangthaitt;
                            ?>
                            <tr>
                                <td>#
                                    <?= $idfhd ?>
                                </td>
                                <td>
                                    <?= $ngaydat ?>
                                </td>
                                <td>
                                    <?php
                                    if ($pttt == 1) {
                                        echo "Thanh toán trực tiếp";
                                    } else if ($pttt == 2) {
                                        echo "Thanh toán QR MOMO";
                                    } else if ($pttt == 3) {
                                        echo "Thanh toán ATM MOMO";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($trangthai == 0) {
                                        echo "Chờ xác nhận.";
                                    } else if ($trangthai == 1) {
                                        echo "Đã xác nhận.";
                                    } else if ($trangthai == 2) {
                                        echo "Đang chuẩn bị hàng.";
                                    } else if ($trangthai == 3) {
                                        echo "Đang giao hàng.";
                                    } else if ($trangthai == 4) {
                                        echo '<b style="color: green;">Đã nhận hàng.</b>';
                                        if ($trangthaitt != 1) { 
                                            // Set payment status to "Đã thanh toán"
                                            $trangthaitt = 1;
                                        }
                                    } else if ($trangthai == 5) {
                                        echo '<div style="color: red;">Đơn hàng bị hủy.</div>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($trangthaitt == 0) {
                                        echo '<div style="color: red;">Chưa thanh toán.</div>';
                                    } else if ($trangthaitt == 1) {
                                        echo '<b style="color: green;">Đã thanh toán.</b>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                </tbody>
            </table>
            <table class="tbcthd table border">
    <thead class="table-dark">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Giá (VND)</th>
            <th class="text-center">Số lượng</th>
            <th>Tổng tiền (VND)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Lặp qua tất cả sản phẩm trong hóa đơn
        foreach ($listbhd as $lbhd) {
            extract($lbhd);
        ?>
            <tr>
                <td>
                    <a href="<?= $linksp ?>" style="text-decoration: none; " class="text-black"><?= $name_sp ?></a>
                </td>
                <td><?= $size_sp ?></td>
                <td><?= number_format((int) $price_sp, 0, ",", ".") ?>₫</td>
                <td class="text-center"><?= $soluong_sp ?></td>
                <td><?= number_format((int) $tong_tien, 0, ",", ".") ?>₫</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4">
                <h6>Tổng tiền thanh toán (VND):</h6>
            </td>
            <td class="text-danger"><?= number_format((int) $tthoadon, 0, ",", ".") ?>₫</td>
        </tr>
    </tbody>
</table>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="coupon-all">
                    <?php
                    if ($trangthaihd == 3) {
                        echo '
                        <div class="coupon">
                            <a href="index.php?act=xacnhandh&trangthai=4&trangthaitt=1&id_bill=' . $idfhd . '" class="button">Đã nhận được
                                hàng</a>
                        </div>
                        ';
                    } else {
                        if ($trangthai_tt == 1 && $trangthaihd == 5) {
                            echo
                                '<div class="coupon">
                                    <a href="index.php?act=all-product" class="btn btn-success">Mua sắm thêm</a>
                                </div>';
                        } else if ($trangthaihd == 5) {
                            echo
                                '<div class="coupon">
                                    <a href="index.php?act=xacnhandh&trangthai=0&id_bill=' . $idfhd . '" class="btn btn-success">Đặt hàng lại</a>
                                </div>';
                        }
                    }
                    ?>
                    <?php
                    if ($trangthaihd == 0 || $trangthaihd == 1 || $trangthaihd == 2 && $trangthai_tt ==0) {
                        echo
                            '<div class="coupon2">
                            <a href="index.php?act=xacnhandh&trangthai=5&trangthaitt=0&id_bill=' . $idfhd . '" class="btn btn-danger">Hủy đơn hàng</a>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Login Register Area  End Here -->