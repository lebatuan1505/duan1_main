<main class="container"> 
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Xác nhận thông tin </h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="?act=thanhtoan" method="POST">
                            <?php
                                if(isset($_SESSION['user'])){
                                    $name = $_SESSION['user']['name_user'];
                                    $address = $_SESSION['user']['diachi'];
                                    $tel = $_SESSION['user']['sdt'];
                                    $id_user= $_SESSION['user']['id_user'];

                                }
                                else {
                                    $name ="";
                                    $address ="";
                                    $tel = "";
                                }
                            ?>
                            <h5 class="text-center">Thông tin khách hàng</h5>
                          <label for="" class="form-label">Họ và tên</label>
                          <input type="hidden" name="id_user" value="<?=$id_user?>">
                          <input class="form-control" type="text" name="name_user" placeholder="Họ và tên"  value="<?=$name?>">
                          <label for="" class="form-label">Địa chỉ</label>
                          <input class="form-control" type="text" name="address_user" placeholder="Địa chỉ" value="<?=$address?>">
                          <label for="" class="form-label">Số điện thoại</label>
                          <input class="form-control" type="text" name="tel_user" placeholder="Số điện thoại" value="<?=$tel?>" >
                        
                       
                    
                        
                           
                           
                            <div class="col-12 mt-4">
                            <label for="" class="form-label">Phương thức thanh toán</label> 
                                <select name="pttt">
                                    <option value="1">Thanh toán trực tiếp</option>
                                    <option value="2">Thanh toán QR MOMO</option>
                                    <option value="3">Thanh toán ATM MOMO</option>
                                </select>
                                <input type="hidden" name="trangthai" value="0">
                                <input type="hidden" name="trangthaitt" value="0">
                            </div>
                         
                          
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                
                    <div class="card-body d-flex">
                    <input type="hidden" name="id_sp" value="<?=$ca['id_sp']?>">
                        <input type="hidden" name="name_sp" value="<?=$ca['name_sp']?>">
                        <input type="hidden" name="soluongsp" value="<?=$ca['soluongcart']?>">
                        <input type="hidden" name="price_sp" value="<?=$ca['price_sp']?>">
                        <input type="hidden" name="total_price" value="<?=$total?>">
                        <input type="hidden" name="tong_soluong" value="<?=$total?>">
                        
                    
                        <!-- <img src="../img/<?=$ca['image_sp']?>" alt="" width="80px"> -->
                        <table class="tthd" cellpadding="5" cellspacing="5">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Size</th>
                                        
                                        <th class="text-center">Giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                       $total =0 ;
                       if(isset($_SESSION['cart'])){
                        foreach($cart as $ca){
                            $total_price = $ca['price_sp']* $ca['soluongcart'];
                          
                            $total +=$total_price;
                            $_SESSION['tongbill'] = $total;
							?>
                            <input type="hidden" name="size" value="<?=$ca['size']?>">
                                            <tr>
                                                <td>
                                                    <?= $ca['name_sp'] ?> <br>
                                                    <u>Số lượng:</u>
                                                    <?= $ca['soluongcart'] ?>
                                                </td>
                                                <td>
                                                    <?=$ca['size']?>
                                                </td>
                                                <td>
                                                    <?= number_format((int)$ca['price_sp'], 0, ",", ".") ?>₫
                                                </td>
                                                <td>
                                                    <?=number_format((int)$total_price, 0, ",", ".")?>₫
                                                </td>
                                            </tr>
                                            <?php } }?>
                                        <tr>
                                            <td colspan="3"><b>Tổng tiền (VND):</b></td>
                                            <td>
                                                <b>
                                                    <?php if(isset($_SESSION['cart'])){ 
                                               echo  number_format((int)$_SESSION['tongbill'], 0, ",", ".");
                                               
                                                    }
                                                    else{
                                                        echo '0';
                                                    }
                                                    ?>₫
                                                </b>
                                            </td>
                                        </tr>
                                    
                                       
                                    
                                </tbody>
                            </table>
                      
                        
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <button type="submit" name="thanhtoan" class="btn btn-primary ">Xác nhận đặt hàng</button>
       </div>
       </form>
</main>             