<form class="mt-4 d-flex flex-column gap-2" id="add-category"aciton="index.php?act=add-category" method="POST">
     <br>
     <h2 class="text-center text-primary">Thêm nhãn hàng mới</h2>
     <div class="form-group">
          <label>Tên nhãn hàng</label>
          <input type="text" class="form-control" placeholder="Enter category name" require id="category_name" name="category_name">
          <span class="error" id="category_name_error" style="color:red"></span>
     </div>
     

     <div class="d-flex justify-content-between"> 
          <button type="submit" class="btn btn-primary w-25 mt-4" name="add_category">Thêm</button>
          <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
     </div>
</form>
<script src="validate.js"></script>