

<h2 class="text-center text-primary mt-3 mt-5 ">Danh sách sản phẩm</h2>
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
          <th scope="col">Người bình luận</th>
          <th scope="col">Ngày</th>
          <th scope="col">Nội dung</th>
          <th scope="col">Sản phẩm</th>
          <th scope="col">Cập nhật</th>
     </tr>
     </thead>
     <tbody>
       <?php foreach($comment as $cmt){ ?>
            <tr>
            <td><?=$cmt['id_cmt']?></td>
                <td><?=$cmt['name_user']?></td>
                <td><?=$cmt['time']?></td>
                <td><?=$cmt['content_cmt']?></td>
                <td><?=$cmt['name_sp']?></td>
                <td><a href="?act=delete&id_cmt=<?=$cmt['id_cmt']?>"><button class="btn btn-white" onclick="return confirm('Bạn có chắc chấn muốn ẩn bình luận này chứ !')"><i class="fa-solid fa-delete-left fa-xl"></button></i></a></td>
            </tr>

        <?php } ?>
     </tbody>

</table>
<!-- <div class="container mt-2 d-flex justify-content-center pagination" id="pagination">
                
          
               <?php
                  echo $hien_thi_so_trang;
               ?>
              
            </div> -->
<a href="index.php?act=add-product" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
