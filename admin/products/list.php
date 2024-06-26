

<h2 class="text-center text-primary mt-3 mt-5">Danh sách sản phẩm</h2>
<form class="price-slider-amount" method="POST" action="?act=search">
   <div class="label-input">
      <input type="text" name="content" placeholder="Tìm kiếm" />
      <button class="filter-btn" name="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
   </div>
</form>

<table class="table mt-4">
   

     <thead>
     <tr>
          <th scope="col">#</th>   
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Danh mục</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Hành động</th>
     </tr>
     </thead>
     <tbody>
        <?php 
        
        foreach($list as $pro){
          $sua = "index.php?act=update-product&id_sp=".$pro['id_sp']."&id_dm=".$pro['id_dm'];
          $xoa = "index.php?act=delete-product&id_sp=".$pro['id_sp'];
          ?>
        <tr>
          <td scope="row"><?=$pro['id_sp']?></td>
          <td scope="row"><?=$pro['name_sp']?></td>
          <td scope="row"><img src="../img/<?=$pro['image_sp']?>" alt="Ảnh sản phẩm" width="70px"></td>
          <td scope="row"><?=$pro['name_dm']?></td>
          <td scope="row"><?=number_format((int)$pro['price_sp'], 0, ",", ".")?>₫</td>
          <td scope="row"><?=$pro['soluong']?></td>
          
          <td scope="row">
          <a href="<?=$sua?>"><button type="button" class="btn btn-warning" name="edit-category"><i class="fa-solid fa-pen"></i> </button></a>
              <a href="<?=$xoa?>"><button type="button" class="btn btn-danger" name="deletecate" onclick="return confirm('Những sản phẩm trong danh mục này cũng sẽ bị xóa, xác nhận ?')"><i class="fa-solid fa-trash fa-l"></i> </button></a>

          </td>
        </tr>
        <?php } ?>

     </tbody>

</table>
<div class="container mt-2 d-flex justify-content-center pagination" id="pagination">
                
          
               <?php
                  echo $hien_thi_so_trang;
               ?>
              
            </div>
<a href="index.php?act=add-product" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
