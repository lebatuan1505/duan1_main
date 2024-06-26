
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
                            $id_sp = $ca['id_sp'];
                            $Product = loadProductById($id_sp);
                    ?>
                    
                            <tr class="cart_item container">
                                <td class="max">
                                    <form method="POST" action="?act=delete-cart&id_sp=<?=$id_sp?>">
                                        <input type="hidden" name="cart_id" value="<?=$id_sp?>">
                                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng ?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td><a title="Remove this item" class="remove" href="#"></a></td>
                                <td style="max-width: 450px;"><?= $ca['name_sp'] ?></td>
                                <td>
                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="../img/<?= $ca['image_sp'] ?>">
                                </td>
                                <td><?= $ca['size'] ?></td>
                                <td>
                                    <span><?= number_format((int)$ca['price_sp'], 0, ",", ".") ?>₫</span>
                                    <input type="hidden" class="iprice" value="<?= $ca['price_sp'] ?>">
                                </td>
                                <td>
                                    <input type="number" value="<?= $ca['soluongcart'] ?>" min="1" max="<?= $Product['soluong'] ?>" id="quantity_<?= $ca['id_sp'] ?>" oninput="updateQuantity(<?= $ca['id_sp'] ?>, this.value)" class="inp-sl" onclick="reloadPage()">
                                </td>
                                <td class="itotal"><?= number_format(($ca['price_sp'] * $ca['soluongcart']), 0, '.', '.') ?> ₫</td>
                            </tr>
                    <?php
                            $total += (intval($ca['price_sp']) * intval($ca['soluongcart']));
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="6" align="right"><strong>Tổng tiền:</strong></td>
                        <td align="right"><?= number_format($total, 0, '.', '.') ?> ₫</td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="coupon">
                                <label for="coupon_code">Mã giảm giá:</label>
                                <input type="text" placeholder="Nhập mã" value="" id="coupon_code" class="input-text" name="coupon_code">
                                <input type="submit" value="Áp dụng" name="apply_coupon" class="btn btn-warning">
                                
                                <a href="?act=check-out" class="btn btn-primary">Thanh toán</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
<script>
   
   // Hàm cập nhật số lượng sản phẩm bằng AJAX
function updateQuantity(id_sp, newQuantity) {
    $.ajax({
        type: 'POST',
        url: 'xulysoluong.php',
        data: {
            id_sp: id_sp,
            soluongcart: newQuantity
        },
        success: function(response) {
            // Sau khi cập nhật thành công, cập nhật số lượng sản phẩm trên giao diện
            $('#quantity_' + id_sp).val(newQuantity);
            // Cập nhật tổng cộng của sản phẩm
            var totalPrice = parseInt($('#quantity_' + id_sp).closest('tr').find('.iprice').val()) * newQuantity;
            $('#quantity_' + id_sp).closest('tr').find('.itotal').text(totalPrice.toLocaleString('vi-VN') + ' ₫');
            // Cập nhật tổng tiền
            updateTotalPrice();
        }
    });
}

// Hàm cập nhật tổng tiền
function updateTotalPrice() {
    var total = 0;
    $('.itotal').each(function() {
        total += parseInt($(this).text().replace(' ₫', '').replace(/\./g, ''));
    });
    $('#totalPrice').text(total.toLocaleString('vi-VN') + ' ₫');
}
function reloadPage() {
        location.reload();
    }

</script>