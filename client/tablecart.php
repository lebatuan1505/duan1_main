<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h2>Giỏ hàng</h2>
        </div>
    </div>
</div>
<div>
    <form method="post" action="#">
        <div class="container" id="cart">
            <table class="table">
                <thead>
                    <tr>
                        <td></td>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Size</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    $id_sp = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($cart as $ca) {
                            $total = $ca['price_sp'] * $soluongcart;
                            $totalPrice += $total;
                            $id_sp = $ca['id_sp'];
                            $Product = loadProductById($id_sp);
                    ?>
                            <tr class="cart_item container  ">
                                <td>
                                    <form method="POST" action="?act=delete-cart&id_sp=<?= $id_sp ?>">
                                        <input type="hidden" name="cart_id" value="<?= $id_sp ?>">
                                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng ?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                                <td><a title="Remove this item" class="remove" href="#"></a></td>
                                <td><?= $ca['name_sp'] ?></td>
                                <td><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../img/<?= $ca['image_sp'] ?>"></td>
                                <td><?= $ca['size'] ?></td>
                                <td>
                                    <span><?= number_format((int)$ca['price_sp'], 0, ",", ".") ?>₫</span>
                                    <input type="hidden" class="iprice" value="<?= $ca['price_sp'] ?>">
                                </td>
                                <td>
                                    <!-- Tăng giảm số lượng -->
                                    <div class="input-group input-spinner">
                                        <input type="button" value="-" class="button-minus btn btn-sm border" data-field="quantity" onclick="updateQuantity(<?= $ca['id_sp'] ?>, '-')">
                                        <input type="number" class="quantity-field form-control-sm form-input" style="cursor: default" readonly min="1" step="1" max="<?= $Product['soluong'] ?>" value="<?= $soluongcart?>" name="quantity" id="quantity_<?= $Product['id_sp'] ?>">
                                        <input type="button" value="+" class="button-plus btn btn-sm border" data-field="quantity" onclick="updateQuantity(<?= $ca['id_sp'] ?>, '+')">
                                    </div>
                                    <!-- kết thúc tăng giảm -->
                                </td>
                                <td class="itotal"><?= number_format($total, 0, '.', '.') ?> ₫</td>
                            </tr>
                    <?php
                           
                        }
                    } ?>
                    <tr>
                        <td colspan="6" align="right"><strong>Tổng tiền:</strong></td>
                        <td align="right"> <?= number_format($totalPrice, 0, '.', '.') ?> ₫ </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="coupon">
                                <label for="coupon_code">Mã giảm giá:</label>
                                <input type="text" placeholder="Nhập mã" value="" id="coupon_code" class="input-text" name="coupon_code">
                                <input type="submit" value="Áp dụng" name="apply_coupon" class="btn btn-warning">
                                <input type="submit" value="Cập nhật" name="update_cart" class="btn btn-danger">
                                <a href="?act=check-out" class="btn btn-primary">Thanh toán</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
