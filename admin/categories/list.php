<table class="table mt-4">
<br>
     <br>
     <h2 class="text-center text-primary mt-3">Danh sách nhãn hàng</h2>
     <thead>
     <tr>
          <th scope="col">#</th>   
          <th scope="col">Tên nhãn hàng</th>
          <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
     <tr>
         <?php
         require_once '../model/category.php';
         $listCat = loadAll();
         foreach($listCat as $cat){ 
            $suacate = "index.php?act=update-category&id_dm=".$cat['id_dm'];
            $xoacate = "index.php?act=delete-category&id_dm=".$cat['id_dm'];
            ?>
            <tr> <td scope="row"> <?=$cat['id_dm']?> </td>
              <td scope="row"><?=$cat['name_dm']?></td>
              <td>
              <a href="<?=$suacate?>"><button type="button" class="btn btn-warning" name="edit-category"><i class="fa-solid fa-pen"></i> </button></a>
              <a href="<?=$xoacate?>"><button type="button" class="btn btn-danger" name="deletecate" onclick="return confirm('Những sản phẩm trong danh mục này cũng sẽ bị xóa, xác nhận ?')"> <i class="fa-solid fa-trash"></i> </button></a>
              <a href="index.php?act=add-product-with-cat&id_dm=<?=$cat['id_dm']?>" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
            </td> </tr>
         <?php  } ?>
     
     </tbody>
</table>
<a href="index.php?act=add-category" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> Thêm nhãn hàng</a>