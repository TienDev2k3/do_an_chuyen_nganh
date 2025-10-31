<?php
if (isset($_POST['dangky'])) {
    $error = '';
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM nguoidung WHERE email='" . $email . "' and matkhau ='" . $password . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    

    if ($count > 0) {
        $user = mysqli_fetch_assoc($row);
        
        
        $_SESSION['dangky'] = $user['tennguoidung'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phanquyen'] = $user['phanquyen'];
        
        if ($user['phanquyen'] == 'admin') {
    
            echo "<script>window.location.href='../../web_pk/admincp/index.php';</script>";
            exit;
        } else {
      
            echo "<script>window.location.href='index.php?quanly=giohang';</script>";
            exit;
        }
    } else {
        $error = "Bạn đã nhập sai email hoặc mật khẩu.";
    }
}
?>
<div class="container d-flex justify-content-center align-items-center ">
        <div class="form-container w-50 p-4 shadow">
            <h3 class="text-center mb-4">Đăng nhập Khách hàng</h3>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="dangky">Đăng nhập</button>
            </form>

            <div class="text-center mt-3">
                <p>Bạn chưa có tài khoản? <a href="index.php?quanly=dangky">Đăng ký ngay</a></p>
            </div>
        </div>
    </div>