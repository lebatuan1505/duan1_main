
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <script src="lib/font-fontawesome-ae333ffef2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
   <link rel="stylesheet" href="../public/header.css">
    <link rel="stylesheet" href="../public/css.css">
    <link rel="stylesheet" href="../public//profile.css">
    <link rel="stylesheet" href="../public//user.css">
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <script src="../public/home.js"></script>
    <link rel="stylesheet" href="../public/css.css">
    <!-- <link rel="stylesheet" href="../public/index.css"> -->
    <script src="../public/header.js"></script>
    <script src="../lib/bootstrap.css"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="path/to/jquery.simplePagination.js"></script>
    <link rel="stylesheet" type="text/css" href="path/to/simplePagination.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../lib/font-fontawesome-ae333ffef2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/xxxxxxx.css">
<style>
  body {
    font-family: 'Roboto', sans-serif;
}

</style>
</head>
  <body>
    <header>
      <div class="container-fluid ">
      <div class="container-fluid d-flex">
          <a class="navbar-brand p-3" href="index.php">
              <img src="https://theme.hstatic.net/200000278317/1000929405/14/logo_medium.png?v=1170" alt="Logo website" width="150" >
            </a>

            <!-- thanh tìm kiếm  -->

            <div class="ms-auto p-3 " style="width:700px;">
              <form class="d-flex " role="search" method="POST" action="?act=search" >
                <input class="form-control me-2" type="search" name="content" placeholder="Bạn đang tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-success" name="search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div>
            <!-- kết thúc thanh tìm kiếm  -->

            <!-- Giỏ hàng  -->
            <div class="p-3">
              <button class="btn position-relative pt-2 pe-3">
                <a href="?act=cart"> <i class="fa-solid fa-bag-shopping fa-2xl text-dark"></i></a>
                <span class="badge bg-light text-danger rounded-pill position-absolute top-0 end-0">
<?php 

if(isset($_SESSION['cart'])){
  $count = count($_SESSION['cart']);
echo $count;
}
else{
  
}

?>

                </span>
              </button>
            </div>
            
            <!-- kết thúc giỏ hàng  -->
            
            <!-- Login -->
            <div class="ms-2 p-3" id="login">
              <?php
               if(isset($_SESSION['user'])){
              ?>
             <div class="header-action" style="width: 150px; height: 30px;" >
                    <div class="user-profile d-flex " >
                        <img src="../img/<?=$_SESSION['user']['avatar']?>" alt="User Avatar" class="user-avatar " width="40px">
                        <p ><?=$_SESSION['user']['name_user']?></p>
                        <div class="submenu">
                            <ul>
                              
                            <?php
                            
                            if (($_SESSION['user']['role']) === 'Admin' ){ ?>
                                <li><a href="/Duan1/admin/index.php">Truy cập trang admin</a></li>
                            <?php } ?>
                                <li><a href="index.php?act=profile">Trang cá nhân</a></li>
                                <li><a href="index.php?act=my-order">Đơn hàng của tôi</a></li>
                                <li><a href="index.php?act=logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


              <?php
               }
               else{
                ?>
                <button class="btn">
                <a href="index.php?act=login"> <i class="fa-solid fa-user fa-2xl text-dark"> </i></a>
              </button>
              <?php }  ?>
              <!-- kết thúc login  -->
            
            </div>
          </div>
          </div>
          <!-- Thanh menu điều hướng  -->

        <nav class="navbar navbar-expand-lg  ">
          
          <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item pr-3">
                  <a class="nav-link fw-bold active" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="index.php?act=all-product">Tất cả sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="index.php?act=loai&matsan=2">Giày cỏ tự nhiên</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="index.php?act=loai&matsan=1">Giày cỏ nhân tạo</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="index.php?act=loai&matsan=3">Phụ kiện</a>
                </li>
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hãng sản xuất
                  </a>
                  <ul class="dropdown-menu ">
                  <?php
                        require_once '../model/category.php';
                        $listCat = loadAll();
                        foreach($listCat as $cat) {?>
                        <li><a href="?act=search-by-id&id_dm=<?=$cat['id_dm']?>" style="text-decoration: none;" class="text-black dropdown-item"><?=$cat['name_dm']?></a></li>

                        <?php } ?>
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="#">Tin tức giày</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="index.php?act=khach-hang">Khách hàng</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="#">Liên hệ</a>
                </li>
              </ul>
            </div>
          
            
        </nav>
      </div> 
      <!-- Kết thúc menu  -->
      
      
    </header>