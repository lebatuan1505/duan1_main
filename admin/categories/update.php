
<form class="mt-4 d-flex flex-column gap-2" id="update-category"aciton="index.php?act=update-category" method="POST">
     <br>
     <h2 class="text-center text-primary">Sửa danh mục</h2>
     <div class="form-group">
          <label>Tên nhãn hàng</label>
          <input type="hidden" name="id_dm" id="id_dm" value="<?=$info[0]['id_dm']?>" >
          <input type="text" class="form-control" placeholder="Enter category name" require id="category_name" name="category_name" value="<?=$info[0]['name_dm']?>">
          <span class="error" id="category_name_error" style="color:red"></span>
     </div>
     

     <div class="d-flex justify-content-between"> 
          <button type="submit" class="btn btn-primary w-25 mt-4" name="update_category">Cập nhật</button>
          <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
     </div>
</form>
<script src="validate.js"></script>