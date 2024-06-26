<?php
session_start();
ob_start();
require_once '../model/product.php';
require_once '../model/user.php';
require_once '../model/list.php';
require_once '../model/cart.php';
require_once '../model/pdo.php';
require_once '../model/binhluan.php';
require_once 'header.php';
if(isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'all-product':
      if(!isset($_GET['page'])){
        $page = 1;
    }
    else{
        $page = $_GET['page'];
    }
    $soSp = 6;
    $Product = loadAllProduct_admin($page,$soSp);
    $total = load();
    $hien_thi_so_trang = hien_thi_so_trang_all($total,$soSp);
     
      require_once './view/product/product.php';
      break;
    case 'loai':
      if($_GET['matsan']){
        $matsan = $_GET['matsan'];
      
      if(!isset($_GET['page'])){
        $page = 1;
    }
    else{
        $page = $_GET['page'];
    }
    $soSp = 6;
    $Product = loadPro_by_matsan($matsan,$page,$soSp);
    $total = loaigiay($matsan);
    $hien_thi_so_trang =  hien_thi_so_trang_view($matsan,$total,$soSp);
  }
      
      require_once './view/product/product.php';
      break;
    case 'bo-loc':
      if(isset($_GET['filter'])){
          if($_GET['filter'] == 1){
            if(!isset($_GET['page'])){
              $page = 1;
          }
          else{
              $page = $_GET['page'];
          }
          $soSp = 6;
          $Product = tang($page,$soSp);
            $total = loc_tang();
            $hien_thi_so_trang =  hien_thi_so_trang_tang($total,$soSp);
          }
          if($_GET['filter'] == 2){
           
              if(!isset($_GET['page'])){
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }
            $soSp = 6;
            $Product = giam($page,$soSp);
              $total = loc_giam();
              $hien_thi_so_trang =  hien_thi_so_trang_giam($total,$soSp);
          }
            
          
          
        
      }
      require_once 'view/product/product.php';
      break;
    case 'search':
      if(isset($_POST['search'])){
        $content = $_POST['content'];
        if(!isset($_GET['page'])){
          $page = 1;
      }
      else{
          $page = $_GET['page'];
      }
      $soSp = 6;
        $Product = search_text($content,$page,$soSp);
        $total = search($content);
        $hien_thi_so_trang = hien_thi_so_trang_search($total,$soSp);

        require_once './view/product/product.php';
      }
      break;
    case 'search-by-id':
      if(isset($_GET['id_dm'])){
        $id_dm = $_GET['id_dm'];
        if(!isset($_GET['page'])){
          $page = 1;
      }
      else{
          $page = $_GET['page'];
      }
      $soSp = 6;
      $Product = loadSearch($id_dm,$page,$soSp);
      $total = searchnbyid_dm($id_dm);
      $hien_thi_so_trang = hien_thi_so_trang_id_dm($id_dm,$total,$soSp);
      }
        
        require_once './view/product/product.php';
      
      break;
      case '/':
        require_once './home.php';
        break;
      case 'home':
        require_once './home.php';
        break;

        case 'login':
          require_once './view/users/login.php';
      
          if (isset($_POST['submit'])) {
              $email = $_POST['email'];
              $password = $_POST['password'];
              $check = checklogin($email,$password);
              if($check){
                $_SESSION['user'] = $check;
                echo '
                  <script>
                  alert("Đăng nhập thành công !");
                      setTimeout(function() {
                          window.location.href = "./index.php";
                      }, 0); 
                  </script>
                ';
              }else{
                echo '
                  <script>
                  alert("Tài khoản hoặc mật khẩu sai !");
                     
                  </script>
                ';
              }
          }
          break;
        case 'logout':
          session_unset();
          session_destroy();
          echo '
          <script>
          alert("Đăng Xuất thành công !");
              setTimeout(function() {
                  window.location.href = "./index.php";
              }, 0);
          </script>
        ';
          break;
        case 'profile':
          require_once './view/users/profile.php';
          break;
        
          case 'update-profile':
            if(isset($_POST['btn-save'])){
                $id_user = $_SESSION['user']['id_user'];
                $name_user = $_POST['name_user'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $avatar = '';
        
                // Kiểm tra xem người dùng đã chọn ảnh mới hay không
                if(isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0){
                    $avatar = basename($_FILES['avatar']['name']);
                    // Di chuyển tệp ảnh vào thư mục img
                    $target_dir = "../img/";
                    $target_file = $target_dir . $avatar;
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                }
        
                // Kiểm tra xem người dùng đã chọn ảnh mới hoặc không
                // Nếu người dùng không chọn ảnh mới thì giữ nguyên ảnh cũ
                if($avatar == ''){
                    // Lấy ảnh đại diện hiện tại của người dùng
                    $avatar = $_SESSION['user']['avatar'];
                }
        
                update_profile($id_user, $name_user, $gender, $avatar, $email, $sdt, $diachi);
        
                // Cập nhật session sau khi update user
                $_SESSION['user']['name_user'] = $name_user;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['gender'] = $gender;
                $_SESSION['user']['sdt'] = $sdt;
                $_SESSION['user']['diachi'] = $diachi;
                $_SESSION['user']['avatar'] = $avatar;
                header("location: ?act=profile");
            }
            break;
        
           case 'register':
            require_once './view/users/register.php';
            if(isset($_POST['btn-register'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password']; 
            
                
                // Nếu tài khoản không tồn tại, đăng ký tài khoản mới
                register($name, $email, $password);
                header("location: ?act=login");
                exit();
            }
            break;
      case 'viewProduct':
      if(isset($_GET['id_sp'])){
        $id = $_GET['id_sp'];
        $Product = loadProductById($id);
        $cmt = loadAllcmt();
        require_once './view/product/productchitiet.php';
      }
        break;    
      case 'cart':
     if(!empty($_SESSION['cart'])){
      $cart = $_SESSION['cart'];
     }
     
     require_once 'cart.php';      
        break;   
    case 'add-to-cart':
// Xử lý hành động thêm sản phẩm vào giỏ hàng
if (isset($_POST['addToCart'])) {
  // Kiểm tra xem người dùng đã đăng nhập chưa
  if (!isset($_SESSION['user'])) {
      // Nếu chưa, chuyển hướng đến trang đăng nhập
      header("location: ?act=login");
      exit();
  }

  // Kiểm tra xem giỏ hàng đã được khởi tạo chưa
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
  }

  // Lấy thông tin sản phẩm từ biến POST
  $id_sp = $_POST['id_sp'];
  $name_sp = $_POST['name_sp'];
  $soluongcart = $_POST['soluongcart'];
  $price_sp = $_POST['price_sp'];
  $image_sp = $_POST['image_sp'];
  $size = $_POST['selectedSize'];
  $tong_tien = $soluongcart * $price_sp;

  // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
  $found = false;
  foreach ($_SESSION['cart'] as $key => $item) {
      if ($item['id_sp'] == $id_sp && $item['size'] == $size) {
          // Nếu sản phẩm đã tồn tại, cập nhật số lượng
          $_SESSION['cart'][$key]['soluongcart'] += $soluongcart;
          $found = true;
          break;
      }
  }

  // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào
  if (!$found) {
      $cart = [
          'id_sp' => $id_sp,
          'name_sp' => $name_sp,
          'price_sp' => $price_sp,
          'soluongcart' => $soluongcart,
          'image_sp' => $image_sp,
          'tongtien' => $tong_tien,
          'size' => $size
      ];
      $_SESSION['cart'][] = $cart;
  }

  // Chuyển hướng người dùng đến trang giỏ hàng sau khi thêm sản phẩm thành công
  header("location: ?act=cart");
  exit();
}

// Xử lý hành động "Mua ngay"
if (isset($_POST['buy-now'])) {
  // Kiểm tra xem người dùng đã đăng nhập chưa
  if (!isset($_SESSION['user'])) {
      // Nếu chưa, chuyển hướng đến trang đăng nhập
      header("location: ?act=login");
      exit();
  }

  // Lấy thông tin sản phẩm từ biến POST
  $id_sp = $_POST['id_sp'];
  $name_sp = $_POST['name_sp'];
  $soluongcart = $_POST['soluongcart'];
  $price_sp = $_POST['price_sp'];
  $image_sp = $_POST['image_sp'];
  $size = $_POST['selectedSize'];
  $tong_tien = $soluongcart * $price_sp;

  // Tạo một mục mới cho sản phẩm vào giỏ hàng
  $cart = [
      'id_sp' => $id_sp,
      'name_sp' => $name_sp,
      'price_sp' => $price_sp,
      'soluongcart' => $soluongcart,
      'image_sp' => $image_sp,
      'tongtien' => $tong_tien,
      'size' => $size
  ];
  $_SESSION['cart'][] = $cart;

  // Chuyển hướng người dùng đến trang thanh toán sau khi thêm sản phẩm vào giỏ hàng
  header("location: ?act=check-out");
  exit();
}

      break;
    
        case 'delete-cart':
        
          if(isset($_POST['delete']) ) {
            $id_sp = $_POST['cart_id']; // Lấy ID sản phẩm từ form
        
            // Kiểm tra xem sản phẩm có trong giỏ hàng không
            
            if(!empty($_SESSION['cart'])) {
              // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
              $index = array_search($id_sp, array_column($_SESSION['cart'], 'id_sp'));
      
              // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
              if($index !== false) {
                  // Xóa sản phẩm khỏi giỏ hàng
                  unset($_SESSION['cart'][$index]);
                  $_SESSION['cart'] = array_values($_SESSION['cart']);
              } else {
                  echo 'Sản phầm ko tồn tại trong giỏ hàng';
              }
          }
           header("location: ?act=cart");
          }
          break;
        
        case 'buy-now':
          if(!isset($_SESSION['user'])){
            header("location: ?act=login");
           }
          else{
            if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
            
            if(isset($_POST['buy-now'])){
              $id_sp = $_POST['id_sp'];
              $name_sp = $_POST['name_sp'];
              $soluongcart = $_POST['soluongcart'];
              $price_sp = $_POST['price_sp'];
              $image_sp = $_POST['image_sp'];
              $size = $_POST['selectedSize'];
              $tong_tien = $soluongcart * $price_sp;
              $cart =[
                'id_sp'=>$id_sp,
                'name_sp'=>$name_sp,
                'price_sp'=> $price_sp,
                'soluongcart'=>$soluongcart,
                'image_sp'=>$image_sp,
                'tongtien' => $tong_tien,
                'size'=> $size
              ];
              $_SESSION['cart'][] = $cart;
             
           
            
           }
           header("location: ?act=check-out");
           exit();
          }
            break;
        case 'check-out':
          if(!empty($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
           
             
            // $Cart = loadCart($idList);
           }
           
          require_once 'checkout.php';
          break;
        case 'thanhtoan':
        if(isset($_SESSION['cart'])){
          if(isset($_POST['thanhtoan'])){
            $id_user = $_POST['id_user'];
            $name_user = $_POST['name_user']; 
            $diachi = $_POST['address_user'];
            $ngaytao = date('Y-m-d');
            $size= $_POST['size'];
            $tongbill = $_SESSION['tongbill'] ;
            $trangthai = $_POST['trangthai'];
            $trangthaitt = $_POST['trangthaitt'];
            $pttt = $_POST['pttt'];
            // $size = $_POST['size'];
            if ($pttt == 1) {
              $trangthai = 0;
              $trangthaitt = 0;
              $idBill = insert_hoadon($ngaytao, $pttt, $tongbill, $trangthai, $trangthaitt, $id_user);
              
              foreach ($_SESSION['cart'] as $carttt) {
                
                insert_billhoadon($idBill, $carttt['id_sp'], $carttt['name_sp'], $carttt['price_sp'],$carttt['size'], $carttt['soluongcart'], $tongtien = $carttt['tongtien'] );
                 header('location: ?act=thank&id_bill='.$idBill);
              }
          }
            if ($pttt == 2) {
              header('Location: ?act=ttqrmomo');
              die();
              
          }
          if ($pttt == 3) {
            $trangthai = 0;
            $trangthaitt = 1;
            $idBill = insert_hoadon($ngaytao, $pttt, $tongbill, $trangthai, $trangthaitt, $id_user);
            foreach ($_SESSION['cart'] as $carttt) {
              insert_billhoadon($idBill, $carttt['id_sp'], $carttt['name_sp'], $carttt['price_sp'],$carttt['size'], $carttt['soluongcart'], $tongtien = $carttt['tongtien'] );
          }
          include('view/thanhtoan/ttATMmomo.php');
                        break;
          }
          
         
          $tbdh = "Đặt hàng thành công! Cảm ơn quý khách đã ủng hộ shop của chúng tôi!";
                    unset($_SESSION['cart']);
                    
                    break;
        
          
          }
          else {
            header('Location: ?act=cart');
            die();

        }
      }
          break;
        case 'ttqrmomo':
          include('view/thanhtoan/xulyttmomo.php');
          break;
        case 'comment':
          if(isset($_POST['comment'])){
            $cmt = $_POST['cmt'];
            $id_sp = $_POST['id_sp'];
            $id_dm = $_GET['id_dm'];
            $id_user = $_POST['id_user'];
            $time = date("Y-m-d h:i:sa");
            addCmt($cmt,$id_sp,$id_user,$time);
            header("location: ?act=viewProduct&id_sp=$id_sp&id_dm=$id_dm");
            exit();
            
          }
          break;
        case 'my-order':
          require_once 'view/users/my-order.php';
          
          break;
        case 'view-bill':
          if(isset($_GET['id_bill'])){
            $id_bill = $_GET['id_bill'];
            $listbhd = select_billhoadon($id_bill);
          }
          require_once 'view/users/chitiet_bill.php';
          break;

        case 'xacnhandh':
          if (isset($_GET['id_bill']) && $_GET['id_bill'] > 0) {
              $id_bill = $_GET['id_bill'];
              $trangthai = $_GET['trangthai'];
              $trangthaitt = $_GET['trangthaitt'];
              if ($trangthaitt == 1) {
                  xacnhanttdh($id_bill, $trangthaitt);
              }
              xacnhandh($id_bill, $trangthai);
              header('Location: ?act=view-bill&id_bill=' . $id_bill . '');
          }
          include('view/taikhoan/chitiethd.php');
          break;

         case 'thank':
          require_once 'thank.php';
          break;
   
        case 'khach-hang':
          require_once 'view/users/khachhang.php';
          break;
  }

}
else{
    
  require_once './home.php';
    }
require_once 'footer.php';


ob_end_flush();
?>