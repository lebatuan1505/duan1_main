<?php
foreach($User as $us){
    extract($us);
}

?>

<form class="mt-4 d-flex flex-column gap-2" action="index.php?act=update_user&id_user=<?=$id_user?>" enctype="multipart/form-data" method="POST">
     <br>
     
     <h2 class="text-center text-primary">Cập nhật tài khoản</h2>
     <div class="form-group">
     <div class="form-group">
          <label>Tên tài khoản </label>
          <input type="text" class="form-control" placeholder="Enter product name" disabled require id="product_name" name="product_name" value="<?=$name_user?>">
     </div>
     <div class="form-group">
          <label>Giới tính</label>
          <input type="text" class="form-control" placeholder="Enter product price" disabled require id="product_price" name="product_price" value="<?=$gender?>">
     </div>
     <div class="form-group">
          <label>avatar</label>
         <img src="../img/<?=$avatar?>" alt="" width="70px" class="m-3">
     </div>
     <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" placeholder="Enter product price" disabled require id="product_price" name="product_price" value="<?=$email?>">
     </div>
     <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control" placeholder="Enter product price" disabled require id="product_price" name="product_price" value="<?=$sdt?>">
     </div>
     <div class="form-group">
          <label>Vai trò</label>
        <select name="role" id="" class="form-control">
            <option value="">Lựa chọn</option>
            <option value="Client">CLient</option>
            <option value="Admin">Admin</option>
            
        </select>
     </div>

     

     <div class="d-flex justify-content-between"> 
          <button type="submit" class="btn btn-primary w-25 mt-4" name="update-user">Cập nhật</button>
          <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
     </div>
</form>