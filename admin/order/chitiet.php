<?php
foreach ($listhd as $bill) {
    
    if ($bill['id_bill'] == $_GET['id_bill']) {
        $id_bill = $bill['id_bill'];
        $idact = $bill['id_user'];
        $nd = $bill['ngaydat'];
        $thd = $bill['tongbill'];
        $pt = $bill['pttt'];
        $trangthai = $bill['trangthai'];
        if ($trangthai == 4) {
            $s = "selected";
        } else {
            $s = "";
        }
        
        
        

       
        
    }
}
?>
<br>
<br>
<br>
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="" method="POST">
                        <input type="hidden" name="id_bill" value="<?= $id_bill ?>">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Mã hóa đơn</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="#<?= $id_bill ?>" class="form-control p-0 border-0" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Ngày đặt hàng</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="<?= $nd ?>" class="form-control p-0 border-0" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Tổng tiền</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="<?= number_format((int) $thd, 0, ",", ".") ?> (VND)"
                                    class="form-control p-0 border-0" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phương thức thanh toán</label>
                            <div class="col-md-12 border-bottom p-0">
                                <?php
                                if ($pt == 1) {
                                    echo '<input type="text" value="Thanh toán trực tiếp" class="form-control p-0 border-0" disabled>';
                                } else if ($pt == 2) {
                                    echo '<input type="text" value="Thanh toán QR MOMO" class="form-control p-0 border-0" disabled>';
                                } else if ($pt == 3) {
                                    echo '<input type="text" value="Thanh toán ATM MOMO" class="form-control p-0 border-0" disabled>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Nơi nhận hàng</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" value="<?= $bill['diachi'] ?>" class="form-control p-0 border-0" disabled>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Trạng thái</label>
                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none p-0 border-0" name="trangthain">
                                    <option value="0">Chờ xác nhận</option>
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2">Đang chuẩn bị hàng</option>
                                    <option value="3">Đang giao hàng</option>
                                    <option value="4">Đã giao hàng</option>
                                    <option value="5">Đơn hàng bị hủy</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">

                            <?php if ($trangthai != 4 ) { ?>
            <!-- Hiển thị nút cập nhật hóa đơn nếu trạng thái không phải 4 -->
            <button class="btn btn-success" type="submit" name="updatevaitro" value="vaitro">Cập nhật hóa đơn</button>
        <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <a class="btn btn-success" href="index.php?act=list-carts">Danh sách hóa đơn</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="white-box border">
                <div class="user-bg">
                    <div class="overlay-box ">
                        <div class="user-content p-2">
                            <br>
                            <br>
                            <br>
                            <p class="text-black mt-2">
                              Người nhận:  <?= $bill['name_user'] ?>
                            </p>
                            <p class="text-black mt-2">
                               email: <?= $bill['email'] ?>
                            </p>
                            <p>Số điện thoại:
                        <?= $bill['sdt'] ?>
                    </p>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title mt-3 mb-3">Chi tiết đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Sản phẩm</th>
                                <th class="border-top-0">Số lượng</th>
                                <th class="border-top-0">Size sản phẩm</th>
                                <th class="border-top-0">Đơn giá</th>
                                <th class="border-top-0">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $listbhd = select_billhoadon();
                            foreach ($listbhd as $lbhd) {
                                extract($lbhd);
                                if ($_GET['id_bill'] == $id_bill) { ?>
                                    <tr>
                                        <td>
                                            <?= $name_sp ?>
                                        </td>
                                        <td>
                                            <?= $soluong_sp ?>
                                        </td>
                                        <td>
                                            <?= $size_sp ?>
                                        </td>
                                        <td>
                                            <?= number_format((int) $price_sp, 0, ",", ".") ?>
                                        </td>
                                        <td>
                                            <?= number_format((int) $bill['tongbill'], 0, ",", ".") ?>
                                        </td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
</div>
<!-- End Container fluid  -->