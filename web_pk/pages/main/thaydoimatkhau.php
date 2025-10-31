<?php
if (isset($_POST['doimk'])) {
    $error = '';
    $success = '';

    $email = $_POST['email'];
    $matkhaucu = md5($_POST['password_cu']);
    $matkhaumoi = md5($_POST['password_moi']);
    $matkhau_rp = md5($_POST['password_rp']);

    $sql = "SELECT * FROM nguoidung WHERE email='$email' AND matkhau='$matkhaucu' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        if ($matkhaumoi === $matkhau_rp) {
            // Thực hiện cập nhật mật khẩu
            $sql_update = "UPDATE nguoidung SET matkhau='$matkhaumoi' WHERE email='$email'";
            if (mysqli_query($mysqli, $sql_update)) {
                $success = "Mật khẩu đã được thay đổi thành công.";
            } else {
                $error = "Có lỗi xảy ra trong quá trình thay đổi mật khẩu.";
            }
        } else {
            $error = "Mật khẩu mới và mật khẩu nhập lại không khớp.";
        }
    } else {
        $error = "Tài khoản hoặc mật khẩu cũ không đúng.";
    }
}
?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="form-container w-50 p-4 shadow">
        <h3 class="text-center mb-4">Đổi Mật Khẩu</h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Tài khoản</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
            </div>
            <div class="mb-3">
                <label for="password_cu" class="form-label">Mật khẩu cũ</label>
                <input type="password" class="form-control" id="password_cu" name="password_cu" placeholder="Nhập mật khẩu cũ" required>
            </div>
            <div class="mb-3">
                <label for="password_moi" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="password_moi" name="password_moi" placeholder="Nhập mật khẩu mới" required>
            </div>
            <div class="mb-3">
                <label for="password_rp" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="password_rp" name="password_rp" placeholder="Nhập lại mật khẩu mới" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="doimk" value="Đổi mật khẩu">Đổi mật khẩu</button>
                <a href="index.php" class="btn btn-secondary">Quay lại</a>
            </div>
        </form>
    </div>
</div>

