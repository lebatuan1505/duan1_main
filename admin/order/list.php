

<h2 class="text-center text-primary mt-3 mt-5">Danh sách hóa đơn</h2>
<form class="price-slider-amount" method="POST" action="?act=search-order">
   <div class="label-input">
      <input type="text" name="content" placeholder="Tìm kiếm" />
      <button class="filter-btn" name="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
   </div>
</form>

<table class="table mt-4">
   

     <thead>
     <tr>
          <th scope="col">Mã đơn</th>   
          <th scope="col">Tên khách hàng</th>
          <th scope="col">Ngày</th>
          <th scope="col">Tổng hóa đơn</th>
          <th scope="col">Trạng thái đơn</th>
          <th scope="col">Trạng thái thanh toán</th>
          <th scope="col">Cập nhật</th>
     </tr>
     </thead>
     <tbody>
       <?php foreach($bill as $bi){ 
        extract($bi);
        
        ?>
         <tr>
            <td> <?=$id_bill?> </td>
            <td> <?=$name_user?> </td>
            <td> <?=$ngaydat?> </td>
            <td> <?=$tongbill?> </td>
            <td>  <?php
                                                if ($trangthai == 0) {
                                                    echo "Chờ xác nhận.";
                                                } else if ($trangthai == 1) {
                                                    echo "Đã xác nhận.";
                                                } else if ($trangthai == 2) {
                                                    echo "Đang chuẩn bị hàng.";
                                                } else if ($trangthai == 3) {
                                                    echo "Đang giao hàng.";
                                                } else if ($trangthai == 4) {
                                                    $trangthaitt = 1;
                                                    echo '<b style="color: green;">Đã nhận hàng.</b>';
                                                } else if ($trangthai == 5) {
                                                    echo '<div style="color: red;">Đơn hàng bị hủy.</div>';
                                                }
                                                ?> </td>
            <td>  <?php
                                                if ($trangthaitt == 0) {
                                                    echo '<div style="color: red;">Chưa thanh toán.</div>';
                                                } else if ($trangthaitt == 1) {
                                                    echo '<b style="color: green;">Đã thanh toán.</b>';
                                                }
                                                ?></td>
            <td> <button class="btn"><a href="?act=view-bill-admin&id_bill=<?=$id_bill?>"><i class="fa-solid fa-pen-to-square text-info"></i></a></button> </td>
        </tr>
        <?php } ?>
     </tbody>

</table>
<div class="container mt-2 d-flex justify-content-center pagination" id="pagination">
                
          
               <?php
                  if(isset($content)){
                    
                  }
                  else{
                    echo $hien_thi_so_trang;
                  }
               ?>
              
            </div>
