<?php
if (isset($_POST['submit'])) {
    $tenkh = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    $error = '';
    $success = '';

    if ($password !== $conf_password) {
        $error = "Mật khẩu xác nhận không khớp!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $error = "Email không hợp lệ!";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) { // Kiểm tra số điện thoại hợp lệ (10-11 chữ số)
        $error = "Số điện thoại không hợp lệ!";
    } else {
        // Kiểm tra email đã tồn tại hay chưa
        $sqlCheck = "SELECT * FROM nguoidung WHERE email = '$email' LIMIT 1";
        $resultCheck = mysqli_query($mysqli, $sqlCheck);
        if (mysqli_num_rows($resultCheck) > 0) {
            $error = "Email đã được sử dụng. Vui lòng thử email khác.";
        } else {
 
            $password_hashed = md5($password);

            $sqlInsert = "INSERT INTO nguoidung (tennguoidung, email, diachi, matkhau, dienthoai, phanquyen) 
                          VALUES ('$tenkh', '$email', '$address', '$password_hashed', '$phone', 'user')";

            if (mysqli_query($mysqli, $sqlInsert)) {
                $success = "Đăng ký thành công!";
                $_SESSION['idnguoidung'] = mysqli_insert_id($mysqli);
                $_SESSION['dangky'] = $tenkh;
                $_SESSION['email'] = $email;
                $_SESSION['phanquyen'] = 'user';
                echo "<script>window.location.href='index.php?quanly=giohang';</script>";
                exit;
            } else {
                $error = "Đã xảy ra lỗi trong quá trình đăng ký. Vui lòng thử lại!";
            }
        }
    }
}
?>

<div class="container  justify-content-center align-items-center">
    <div class="form-container">
        <h3 class="text-center mb-4">Đăng ký Thành viên</h3>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php elseif (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Tên đầy đủ</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn" required value="<?php echo isset($tenkh) ? $tenkh : ''; ?>">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" rows="3" required><?php echo isset($address) ? $address : ''; ?></textarea>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required value="<?php echo isset($phone) ? $phone : ''; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>
                <div class="col-md-6">
                    <label for="conf_password" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Nhập lại mật khẩu" required>
                </div>
            </div>
            
            <div class="row justify-content-center">
        <button type="submit" name="submit" class="btn btn-primary w-50">Đăng ký</button>
    </div>
          
            
        </form>

        <div class="text-center mt-3">
            <p>Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập</a></p>
        </div>
    </div>
</div>