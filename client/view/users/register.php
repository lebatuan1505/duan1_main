
<style>
    .error {
        color: red;
    }
</style>

<div class="wrapper">
    <div class="container">
        <form class="login-form justify-content-center" action="" method="POST" onsubmit="return validateForm()">
            <h2 class="form-heading">Đăng ký tài khoản</h2>
            <p class="form-desc">Bạn không có tài khoản ?
                <a class="text-link" href="?act=login">Đăng nhập</a>
            </p>
            <div class="form-control">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
                <span class="error" id="nameErr"></span>
            </div>

            <div class="form-control">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                <span class="error" id="emailErr"></span>
            </div>

            <div class="form-control">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                <span class="error" id="passwordErr"></span>
            </div>
            <button name="btn-register" class="form-btn btn-success">Đăng ký</button>
        </form>
    </div>
</div>

<script>
function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var nameErr = emailErr = passwordErr = true;

    // Validate tên
    if (name == "") {
        document.getElementById("nameErr").innerHTML = "Họ và tên không được để trống";
    } else {
        document.getElementById("nameErr").innerHTML = "";
        nameErr = false;
    }

    // Validate email
    if (email == "") {
        document.getElementById("emailErr").innerHTML = "Email không được để trống";
    } else {
        var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regex.test(email)) {
            document.getElementById("emailErr").innerHTML = "Email không hợp lệ";
        } else {
            document.getElementById("emailErr").innerHTML = "";
            emailErr = false;
        }
    }

    // Validate mật khẩu
    if (password == "") {
        document.getElementById("passwordErr").innerHTML = "Mật khẩu không được để trống";
    } else if (password.length < 8) {
        document.getElementById("passwordErr").innerHTML = "Mật khẩu phải từ 8 kí tự trở lên";
    } else {
        document.getElementById("passwordErr").innerHTML = "";
        passwordErr = false;
    }

    // Trả về true nếu không có lỗi
    return !(nameErr || emailErr || passwordErr);
}

</script>

