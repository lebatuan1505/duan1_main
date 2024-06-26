<?php
ob_start();
require_once 'header.php';

require_once '../model/pdo.php';
require_once '../model/category.php';
require_once '../model/product.php';
require_once '../model/user.php';
require_once '../model/list.php';
require_once '../model/bill.php';


if(isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'list-categories':
            require_once '../admin/categories/list.php';
            break;
            case 'add-category':
                $listCat = loadAll();
                require_once '../admin/categories/add.php';
                if(isset($_POST['add_category'])){
                    $name = $_POST['category_name'];
                    $check = check_dm($name); // Kiểm tra danh mục
                    if(empty($name)) {
                        echo '<a class="text-danger text-decoration-none">Không được để trống danh mục</a>';
                    } else if($check['name_dm'] == $name){
                        echo '<a class="text-danger text-decoration-none">Danh mục đã tồn tại</a>';
                    } else {
                        addCategory($name);
                        header("Location: index.php?act=list-categories");
                        exit(); 
                    }
                }
                break;
            
            


        case 'update-category':
            if(isset($_GET['id_dm'])){
                $id_dm = $_GET['id_dm'];
                $info = LoadById($id_dm);
                if(isset($_POST['update_category'])){
                    $id_dm = $_POST['id_dm'];
                    $name = $_POST['category_name'];
                    updateCategory($id_dm,$name);
                    header("Location: index.php?act=list-categories");
                    exit(); 
                }
            }

            require_once '../admin/categories/update.php';
            break;
        case 'thong-ke':
            require_once 'thongke/list.php';
            break;
            case 'search':
                if(isset($_POST['search'])){
                    // Lấy nội dung tìm kiếm từ form
                    $content = $_POST['content'];
                    
                    // Kiểm tra nếu trang không được chỉ định, mặc định là trang 1
                    if(!isset($_GET['page'])){
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    
                    // Số sản phẩm hiển thị trên mỗi trang
                    $soSp = 5;
                    
                    // Gọi hàm tìm kiếm sản phẩm với nội dung và trang
                    $list = search_admin($content, $page, $soSp);
                    
                    // Gọi hàm tìm kiếm tổng số sản phẩm
                    $total = search($content);
                    
                    // Hiển thị số trang
                    $hien_thi_so_trang = hien_thi_so_trang($total, $soSp);
                    
                    // Yêu cầu file danh sách sản phẩm
                    require_once '../admin/products/list.php';
                }
                break;
                     
        case 'add-product':
            require_once '../admin/products/add.php';
            if(isset($_POST['submit'])){
                $category =  $_POST['category'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $product_quantity = $_POST['product_quantity'];
                $product_avatar = basename($_FILES['product_avatar']['name']);

                // Di chuyển tệp ảnh vào thư mục img
                $target_dir = "../img/";
                $target_file = $target_dir . $product_avatar;
                move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                $matsan = $_POST['matsan'];
                addProduct($category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar,$matsan);
                header("location: index.php?act=list-products");
                exit();


            }
            
            break;
        case 'add-product-with-cat':
            require_once '../admin/products/addByCat.php';
            if(isset($_POST['submit'])){
                $category =  $_POST['category'];
                $product_name = $_POST['product_name'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $product_quantity = $_POST['product_quantity'];
                $product_avatar = basename($_FILES['product_avatar']['name']);

                // Di chuyển tệp ảnh vào thư mục img
                $target_dir = "../img/";
                $target_file = $target_dir . $product_avatar;
                move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                $matsan = $_POST['matsan'];
                addProduct($category,$product_name,$product_price,$product_desc,$product_quantity,$product_avatar,$matsan);
                header("location: index.php?act=list-products");
                exit();


            }
            break;

        case 'delete-product':
            if(isset($_GET['id_sp'])){
                $id_sp = $_GET['id_sp'];
                delete_pro($id_sp);
                header("location: index.php?act=list-products");
                exit(); 
            }
            
            break;    
            case 'update-product':
                if(isset($_GET['id_sp'])){
                    $id_sp = $_GET['id_sp'];
                    
                    $info = LoadProById($id_sp);
                    if(isset($_POST['update-product'])){
                        $id_sp = $_GET['id_sp'];
                        $category =  $_POST['category'];
                        $product_name = $_POST['product_name'];
                        $product_price = $_POST['product_price'];
                        $product_desc = $_POST['product_desc'];
                        $product_quantity = $_POST['product_quantity'];
                        $product_avatar = '';
            
                        // Kiểm tra xem người dùng đã chọn ảnh mới hay không
                        if(isset($_FILES['product_avatar']) && $_FILES['product_avatar']['size'] > 0){
                            $product_avatar = basename($_FILES['product_avatar']['name']);
                            // Di chuyển tệp ảnh vào thư mục img
                            $target_dir = "../img/";
                            $target_file = $target_dir . $product_avatar;
                            move_uploaded_file($_FILES["product_avatar"]["tmp_name"], $target_file);
                        }
            
                        // Kiểm tra xem người dùng đã chọn ảnh mới hoặc không
                        // Nếu người dùng không chọn ảnh mới thì giữ nguyên ảnh cũ
                        if($product_avatar == ''){
                            // Lấy ảnh sản phẩm hiện tại của sản phẩm
                            $product_avatar = $info['product_avatar'];
                        }
            
                        updateProduct($id_sp, $category, $product_name, $product_price, $product_desc, $product_quantity, $product_avatar);
                        header("location: index.php?act=list-products");
                        exit();
                    }
                }
                
                require_once '../admin/products/update.php';
                break;
        case 'list-products':
            if(!isset($_GET['page'])){
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }
            $soSp = 5;
            $list = loadAllProduct_admin($page,$soSp);
            $total = load();
            $hien_thi_so_trang =   hien_thi_so_trang($total,$soSp);
            require_once '../admin/products/list.php';
            break;
    
        case 'list-carts':
            if(!isset($_GET['page'])){
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }
            $soSp = 8;
            $bill = loadBill_admin($page,$soSp);
            $total = loadBill();
            $hien_thi_so_trang =   hien_thi_so_trang_order($total,$soSp);

            
            require_once '../admin/order/list.php';
            break;
        case 'view-bill-admin':
            $listhd = select_hoadon(null, null);
            if (isset($_POST['updatevaitro']) && ($_POST['updatevaitro'])) {
                $id_bill = $_POST['id_bill'];
                $trangthain = $_POST['trangthain'];
               
                capnhat_tthd($trangthain, $id_bill);
                $listhd = select_hoadon(null, null);
               
                header('Location: ?act=list-carts');
                die();
            }
          
            

            require_once '../admin/order/chitiet.php';
            break;
        case 'list-posts':
            require_once '../admin/categories/list.php';
            break;
        case 'comments':
            $comment = loadCmt();
            require_once '../admin/comment/list.php';
            break;

        case 'list-users':
            $result = loadAllUser();
            require_once '../admin/user/list.php';
            break;
        case 'edit-user':
            $id_user = $_GET['id_user'];
            $User = loadUser($id_user);
          
            require_once '../admin/user/edit.php';
            break;
        case 'update_user':
            if(isset($_POST['update-user'])){
                $id_user = $_GET['id_user'];
                $role= $_POST['role'];
                update_user($role,$id_user);
                header('Location: ?act=list-users');
                exit();
            }
            break;
        case 'delete-user':
            if(isset($_GET['id_user'])){
                $id_user = $_GET['id_user'];
                del_user($id_user);
              
            }
            header("location: ?act=list-users");
            exit();
            break;
        case 'delete-category':
            if(isset($_GET['id_dm'])){
                
                $id_dm = $_GET['id_dm'];
                delete($id_dm);
            }
            require_once '../admin/categories/list.php';
            break;
        case 'search-order':
            if(isset($_POST['search'])){
                $content = $_POST['content'];
                

            $bill =content($content);
            }
            require_once '../admin/order/list.php';
            break;
       
    }
}
require_once 'footer.php';

ob_end_flush();
?>