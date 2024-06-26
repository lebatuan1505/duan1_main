
<main class="main" style="min-height:150vh;">
    <div class="container">
        <div class="profile">
            <div class="profile-main">
                <div class="options">
                    <h2 class="option-heading">Cài Đặt</h2>
                    <ul class="option-sidebar">
                        <li class="active">
                            <i class="fa-solid fa-user"></i>
                            <a href="">Cài đặt tài khoản</a>
                        </li>
                      
                        <li>
                            <i class="fa-solid fa-shield-halved"></i>
                            <a href="">Đăng nhập và bảo mật</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-bell"></i>
                            <a href="">Cài đặt thông báo</a>
                        </li>
                    </ul>
                </div>
                <div class="profile-info">
                    <h2 class="profile-heading">Thông tin cá nhân</h2>
                    <form action="?act=update-profile" method="POST" enctype="multipart/form-data">
                        <div class="info-list">
                            <div class="info-item">
                                <h2 class="info-heading">Họ và tên</h2>
                                <input type="text" name="name_user" value="<?php echo $_SESSION['user']['name_user']; ?>" />
                                <span>Tên của bạn xuất hiện trên trang cá nhân và bên cạnh các bình luận của bạn.</span>
                            </div>

                            <div class="info-item">
                                <h2 class="info-heading">Avatar</h2>
                                <input name="avatar" type="file" />
                                <img src="<?php echo $_SESSION['user']['avatar']; ?>" alt="avatar user" />
                                <span class="text-danger">Nên là ảnh vuông, chấp nhận các tệp: JPG, PNG hoặc GIF.</span>
                            </div>

                            <div class="info-item">
                                <h2 class="info-heading">Email</h2>
                                <input name="email" type="email" value="<?php echo $_SESSION['user']['email']; ?>" />
                            </div>

                            <div class="info-item">
                                <h2 class="info-heading">Số Điện Thoại</h2>
                                <input type="text" name="sdt" value="<?php echo $_SESSION['user']['sdt']; ?>" placeholder="Nhập số điện thoại" />
                                <span>Điện thoại liên kết với VietNamHistory</span>
                            </div>
                            <div class="info-item">
                                <h2 class="info-heading">Địa chỉ</h2>
                                <input name="diachi" type="diachi" value="<?php echo $_SESSION['user']['diachi']; ?>" />
                            </div>

                            <div class="info-item">
                                <h2 class="info-heading">Chọn giới tính của bạn</h2>
                                <select name="gender" class="genderSelect">
                                    <option value="" seleted>Chọn giới tính</option>
                                    <option value="Nam" <?= ($_SESSION['user']['gender']  ?? '') === 'Nam' ? 'selected' : ''; ?>>Nam</option>
                                    <option value="Nữ" <?= ($_SESSION['user']['gender'] ?? '') === 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                                    <option value="Khác" <?= ($_SESSION['user']['gender'] ?? '') === 'Khác' ? 'selected' : ''; ?>>Khác</option>
                                </select>
                            </div>

                            <button type="submit" name="btn-save" class="btn btn-profile btn-success">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
        function validateImage() {
        var fileInput = document.querySelector('input[type="file"]');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Vui lòng chọn file ảnh có định dạng JPG hoặc PNG.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script>