<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form class="mt-4 d-flex flex-column gap-2" id="add-product" action="index.php?act=add-product" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
        <br>
        <h2 class="text-center text-primary">Thêm sản phẩm</h2>
        <div class="form-group">
            <label>Nhà sản xuất</label>
            <select name="category" id="category">
                <?php
                require_once '../model/category.php';
                $listCat = loadAll();
                foreach($listCat as $cat) {?>
                    <option value="<?=$cat['id_dm']?>"><?=$cat['name_dm']?></option>
                <?php } ?>
            </select>
        </div> <br>
        <div class="form-group">
            <select name="matsan" id="matsan">
                <option value="1">Cỏ nhân tạo</option>
                <option value="2">Cỏ tự nhiên</option>
                <option value="3">Phụ kiện</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Enter product name" id="product_name" name="product_name">
            <span id="nameError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" class="form-control" placeholder="Enter product price"  id="product_price" name="product_price">
            <span id="priceError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea type="text" class="form-control" placeholder="Enter product desc"  id="product_desc" name="product_desc"></textarea>
            <span id="descError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" class="form-control" placeholder="Enter product image" id="product_avatar" name="product_avatar">
            <span id="avatarError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" class="form-control" placeholder="Enter product quantity" id="product_quantity" name="product_quantity" min="1" title="Số lượng phải lớn hơn hoặc bằng 1">
            <span id="quantityError" class="error"></span>
        </div>

        <div class="d-flex justify-content-between"> 
            <button type="submit" class="btn btn-primary w-25 mt-4" name="submit">Thêm sản phẩm</button>
            <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
        </div>
    </form>
    <script>
    function validateForm() {
        var name = document.getElementById("product_name").value;
        var price = document.getElementById("product_price").value;
        var desc = document.getElementById("product_desc").value;
        var avatar = document.getElementById("product_avatar").value;
        var quantity = document.getElementById("product_quantity").value;

        var nameError = document.getElementById("nameError");
        var priceError = document.getElementById("priceError");
        var descError = document.getElementById("descError");
        var avatarError = document.getElementById("avatarError");
        var quantityError = document.getElementById("quantityError");

        nameError.textContent = "";
        priceError.textContent = "";
        descError.textContent = "";
        avatarError.textContent = "";
        quantityError.textContent = "";

        if (name === "") {
            nameError.textContent = "Tên sản phẩm không được để trống";
            return false;
        }

        if (price === "") {
            priceError.textContent = "Giá sản phẩm không được để trống";
            return false;
        }

        if (desc === "") {
            descError.textContent = "Mô tả sản phẩm không được để trống";
            return false;
        }

        // Kiểm tra định dạng ảnh
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(avatar)) {
            avatarError.textContent = "Vui lòng chọn file ảnh có định dạng JPG hoặc PNG";
            return false;
        }

        if (quantity === "") {
            quantityError.textContent = "Số lượng sản phẩm không được để trống";
            return false;
        }

        return true;
    }
</script>

</body>
</html>
