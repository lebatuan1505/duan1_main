<table class="table mt-4">
<br>
     <br>
     <h2 class="text-center text-primary mt-3">Danh sách khách hàng</h2>
     <thead>
     <tr>
          <th scope="col">#</th>   
          <th scope="col">Tên </th>
          <th scope="col">Email</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Vai trò</th>
          <th scope="col">Hành động</th>
     </tr>
     </thead>
     <tbody>
     <?php foreach ($result as $us) { ?>
          <tr>
               <td  scope="col"><?=$us['id_user']?></td>
               <td  scope="col"><?=$us['name_user']?></td>
               <td  scope="col"><?=$us['email']?></td>
               <td  scope="col"><?=$us['sdt']?></td>
               <td  scope="col"><?=$us['role']?></td>
               <td  scope="col"><button class="btn btn-info"><a href="?act=edit-user&id_user=<?=$us['id_user']?>"><i class="fa-solid fa-user-pen text-white"></i></a></button>
               <?php
                    if($us['role'] == 'Client'){
                         ?>
                              <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này không ?')"><a href="?act=delete-user&id_user=<?=$us['id_user']?>" ><i class="fa-solid fa-user-xmark text-white"></i></i></a></button>
                 <?php   } ?>
           
          </td>
     </tr>

     <?php } ?>     
     
     </tbody>
</table>
