<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../public/index.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"    
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <a href="../client/index.php" style="text-decoration: none;"> <img src="https://theme.hstatic.net/200000278317/1000929405/14/logo_medium.png?v=1170" alt="Logo" width="150px"> <span class="logo_name">8 Football</span></a>
            </div>

            
        </div>

        <div class="menu-items">
            <ul class="nav-links m-0 p-0">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Trang chủ</span>
                </a></li>
                <li><a href="?act=list-categories">
                    <i class="uil uil-align-left"></i>
                    <span class="link-name">Danh mục</span>
                </a></li>
                <li><a href="?act=list-products">
                    <i class="uil uil-book-alt"></i>
                    <span class="link-name">Sản phẩm</span>
                </a></li>
                <li><a href="?act=list-carts">
                    <i class="uil uil-question-circle"></i>
                    <span class="link-name">Đơn hàng</span>
                </a></li>
               
                <li><a href="?act=comments">
                    <i class="uil uil-comment-alt-dots"></i>
                    <span class="link-name">Bình luận</span>
                </a></li>
                <li><a href="?act=list-users">
                    <i class="uil uil-users-alt"></i>
                    <span class="link-name">Tài khoản</span>
                </a></li>
                <li><a href="?act=thong-ke">
                <i class="fa-solid fa-chart-simple"></i>
                    <span class="link-name">Thống kê</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode m-0 p-0">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Đăng xuất</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            
            
            <!--<img src="images/profile.jpg" alt="">-->
           
        </div>
      
  
  