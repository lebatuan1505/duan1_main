

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-6 text-center">
      <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
      <h2>Đặt hàng thành công!</h2>
      <p>Cảm ơn bạn đã mua hàng của chúng tôi.</p>
    </div>
    <div class="d-flex justify-content-center">
        <button class="btn btn-danger me-4"><a href="?act=view-bill&id_bill=<?=$_GET['id_bill']?>" class="text-white" style="text-decoration: none;">Xem đơn hàng</a></button> 
        <button class="btn btn-primary"><a href="index.php" class="text-white" style="text-decoration: none;">Trang chủ</a></button>
    </div>
  </div>
</div>
