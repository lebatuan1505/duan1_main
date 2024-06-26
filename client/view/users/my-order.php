<div class="container">
<table class="table table-bordered table-hover">
    <h3 class="text-center m-3">Tất cả đơn hàng</h3>
                                        <tbody>
                                            <tr>
                                                <th>Mã</th>
                                                <th>Ngày đặt hàng</th>
                                                <th>Trạng thái</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Tổng (VND)</th>
                                                <th></th>
                                            </tr>
                                            <?php
                                            $listhd = select_hoadon(null, null);
                                            foreach($listhd as $lhd) {
                                                extract($lhd);
                                                if($id_user == $_SESSION['user']['id_user']) {
                                                    $linkhd = "index.php?act=view-bill&id_bill=".$id_bill; ?>

                                                    <tr>
                                                        <td><a class="account-order-id text-black" href="" style="text-decoration: none;">#
                                                                <?= $id_bill ?>
                                                            </a></td>
                                                        <td>
                                                            <?= $ngaydat ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($trangthai == 0) {
                                                                echo "Chờ xác nhận.";
                                                            } else if($trangthai == 1) {
                                                                echo "Đã xác nhận.";
                                                            } else if($trangthai == 2) {
                                                                echo "Đang chuẩn bị hàng.";
                                                            } else if($trangthai == 3) {
                                                                echo "Đang giao hàng.";
                                                            } else if($trangthai == 4) {
                                                                echo "Đã nhận hàng.";
                                                            } else if($trangthai == 5) {
                                                                echo "Đơn hàng bị hủy.";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($trangthaitt == 0) {
                                                                echo "Chưa thanh toán.";
                                                            } else if($trangthaitt == 1) {
                                                                echo "Đã thanh toán.";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= number_format((int)$tongbill, 0, ",", ".") ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= $linkhd ?>" class="btn text-white text-center bg-success ">
                                                                <span><i class="fa-solid fa-eye"></i></span></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
</div>