<?php
if($Product['matsan']==1){
  echo '
  <div style="background-color: #DCDCDC;" class="ps-3 container">
                      <a href="index.php" class=" text-black text-decoration-none">Trang chủ</a><a class="text-black text-decoration-none">/ Danh mục</a> <a href="?act=loai&matsan=1" class="text-black text-decoration-none">/ Giày cỏ nhân tạo</a> <a href="" class="text-black text-decoration-none">/ Chi tiết sản phẩm</a>
                      </div>
  ';
}
if($Product['matsan']==2){
  echo '
  <div style="background-color: #DCDCDC;" class="ps-3 container">
                      <a href="index.php" class=" text-black text-decoration-none">Trang chủ</a><a class="text-black text-decoration-none">/ Danh mục</a> <a href="?act=loai&matsan=2" class="text-black text-decoration-none">/ Giày cỏ tự nhiên</a> <a href="" class="text-black text-decoration-none">/ Chi tiết sản phẩm</a>
                      </div>
  ';
}
if($Product['matsan']==3){
  echo '
  <div style="background-color: #DCDCDC;" class="ps-3 container">
                      <a href="index.php" class=" text-black text-decoration-none">Trang chủ</a><a class="text-black text-decoration-none">/ Danh mục</a> <a href="?act=loai&matsan=3" class="text-black text-decoration-none">/ Phụ kiện</a> <a href="" class="text-black text-decoration-none">/ Chi tiết sản phẩm</a>
                      </div>
  ';
}

?>
   <section class="container mt-4">
      <h2 class="text-center mt-4 mb-5">Chi tiết sản phẩm</h2>
      <style>
    /* Ẩn các ô radio */
/* Hiệu ứng khi hover và khi được chọn */
.size-option {
    cursor: pointer;
}

.size-option:hover {
    background-color: lightgray;
}

.size-option.active {
    background-color: lightblue;
}

</style>

       <div class="row">
       
                     
            <div class="col-lg-6 d-flex justify-content-center p-1 border mb-1 pb-9" >
            <form action="?act=add-to-cart" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="name_sp" value="<?=$Product['name_sp']?>">
        <input type="hidden" name="image_sp" value="<?=$Product['image_sp']?>">
     
        <input type="hidden" name="price_sp" value="<?=$Product['price_sp']?>">

        <input type="hidden" name="id_sp" value="<?=$_GET['id_sp']?>">
                <img src="../img/<?=$Product['image_sp']?>" alt="Product Image" class="img-fluid" name="image">
                
            </div>
            <div class="col-lg-6">
                <h4><?=$Product['name_sp']?> </h4>
                <p>Loại : 
                  <?php
if($Product['matsan']==1){
  echo "Giày cỏ nhân tạo (Turf)";
}
if($Product['matsan']==2){
  echo "Giày cỏ tự nhiên (Ag, Fg)";
}
if($Product['matsan']==3){
  echo "Phụ kiện";
}

?>

                 </p>
                <h3 class="text-danger"><?=number_format((int)$Product['price_sp'], 0, ",", ".")?>₫</h3>
    
                <!-- Chọn màu -->
                <div class="container">
                    <div class="row">
                    <div class="col-md-4 ml-2">
                    <div class="col-md-4 ml-2">
    <p>Chọn size</p>
    <div class="form-group d-flex">
        <div class="border p-1 me-2 size-option" data-value="40">40</div>
        <div class="border p-1 me-2 size-option" data-value="41">41</div>
        <div class="border p-1 me-2 size-option" data-value="42">42</div>
        <div class="border p-1 me-2 size-option" data-value="43">43</div>
        <div class="border p-1 me-2 size-option" data-value="44">44</div>
    </div>
    <input type="hidden" id="selectedSize" name="selectedSize">
</div>

                    </div>
                  </div> <br>
                  <p>Số lượng</p>
                  <div >
        
        <input type="number" name="soluongcart" id="quantityInput" value="1" min="1" max="<?=$Product['soluong']?>" style="width: 50px; height: 30px;">
       
         <?=$Product['soluong']?> sản phẩm có sẵn
    </div>
    <br>
    <button class="btn btn-success" type="submit" name="addToCart" >Thêm vào giỏ hàng</button>
    <button class="btn btn-danger" type="submit" name="buy-now">Mua ngay</button>
                
        </div>
            </div>

    
       </form>

        <!-- Thông số kỹ thuật -->
      
        <div class="row mt-4">
            <div class="col-lg-12 fs-5 ">
                <h3>Mô tả chi tiết</h3>
                <p id="detailDescription" style="max-height: 300px; overflow: hidden;">
    <?=nl2br($Product['desc_sp'])?>
</p>

<a href="#" class="d-flex justify-content-center" onclick="expandDescription()" id="toggleDescription">Xem thêm</a>

            </div>
        </div>
        <h3>Sản phẩm khác</h3>
       <div class="container row">
        
       
       <?php 
               require_once '../model/list.php';
               $id_dm = $_GET['id_dm'];
               $Product = productrelated ($id_dm);
               foreach($Product as $sp){ ?>

      <div class="col-3  pd-3  mt-3 mb-3 ">
    <a href="?act=viewProduct&id_sp=<?=$sp['id_sp']?>&id_dm=<?=$sp['id_dm']?>" class="text-black" style="text-decoration: none;">

      <div class="product" >
        <img src="../img/<?=$sp['image_sp']?>" alt="Image Product" style="min-height: 270px; max-width:300px;" >
        <div class="overlay">
          <div class="content">
            <p><?=$sp['name_sp']?></p>
            <p class="text-danger"> <?=$sp['price_sp']?>₫ </p>
            <button class="btn btn-success" type="submit" name="addToCart" onclick="setAction('add-to-cart')">Thêm vào giỏ hàng</button>
    <a class="btn btn-danger" name="buyNow" href="?act=buy-now" onclick="setAction('buy-now')">Mua ngay</a>
    
          </div>
        </div>
      
    </a>
        </div>
    </div>

      <?php  } ?>
       </div>

  <div class="row mt-4">
    <div class="col-md-6">
      <h3>Đánh giá | Bình luận</h3>
 <div class="container">
 <?php

 foreach($cmt as $comment){
  if($comment['id_sp'] == $_GET['id_sp']){
      
   $now = time();
   $time = strtotime($comment['time']);
   $ago = $now - $time;
   // Tính toán các đơn vị thời gian từ số giây
   $days = floor($ago / (60 * 60 * 24)); // Số ngày
   $hours = floor(($ago % (60 * 60 * 24)) / (60 * 60)); // Số giờ
   $minutes = floor(($ago % (60 * 60)) / 60); // Số phút
   $remainingSeconds = $ago % 60; // Số giây
   ?>
        <div class="post-info-1 mt-4">
          <img src="../img/<?=$comment['avatar']?>" alt="" width="30px" class="user-avatar ">
          <?=$comment['name_user']?>
          <div class="post-reaction">
     
                <div class="post-cmt">
                    <i class="fa-regular fa-comment mt-2"></i>
                    
                    <span><?=$comment['content_cmt']?></span>
                </div> 
                <p class="post-time"><?php
                              if($days >0){
                                echo $days." ngày trước";
                              }
                              elseif($hours>0){
                                echo $hours." giờ trước";
                              }
                              elseif($minutes > 0){
                                echo $minutes." phút trước";
                              }
                              else{
                                echo $remainingSeconds." giây trước";
                              }
                              ?></p>
          </div>
          <?php } } ?>
  
 </div>
<?php
if(isset($_SESSION['user'])){
  $id_sp = $_GET['id_sp'];
  $id_dm = $_GET['id_dm'];
  
?>

      <form method="POST" action="?act=comment&id_sp=<?=$id_sp?>&id_dm=<?=$id_dm?>">
        <div class="form-group">
          <label for="comment">Nhận xét:</label>
          <input type="hidden" name="id_sp" value="<?=$_GET['id_sp']?>">
          <input type="hidden" name="id_user" value="<?=$_SESSION['user']['id_user']?>">
          <textarea class="form-control" rows="5" id="comment" name="cmt"></textarea>
        </div>
        <button type="submit" name="comment" class="btn btn-primary">Gửi nhận xét</button>
      </form>
    </div>
  </div>
  <?php } ?>
    </section>
<script>


function expandDescription() {
    var description = document.getElementById("detailDescription");
    var toggleLink = document.getElementById("toggleDescription");

    if (description.style.maxHeight === "300px") {
        description.style.maxHeight = "none";
        toggleLink.textContent = "Thu gọn";
    } else {
        description.style.maxHeight = "300px";
        toggleLink.textContent = "Xem thêm";
    }
}
// Lấy danh sách tất cả các size-option
const sizeOptions = document.querySelectorAll('.size-option');

// Duyệt qua từng size-option và thêm sự kiện click
sizeOptions.forEach(sizeOption => {
    sizeOption.addEventListener('click', function() {
        // Lấy giá trị của size từ data-value
        const size = this.dataset.value;
        
        // Đặt giá trị cho input ẩn
        document.getElementById('selectedSize').value = size;
        
        // Xóa lớp active từ tất cả size-option
        sizeOptions.forEach(option => {
            option.classList.remove('active');
        });
        
        // Thêm lớp active cho size-option được chọn
        this.classList.add('active');
    });
});

</script>
