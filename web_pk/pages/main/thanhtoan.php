<?php
session_start();
include('../../admincp/config/config.php');
require('../../mail/sendmail.php');


if (isset($_SESSION['email']) && isset($_SESSION['cart'])) {
    $email_khachhang = $_SESSION['email']; 
    $code_order = rand(0, 9999);  
    
 
    $insert_cart = "INSERT INTO tbl_giohang (emailkh, magh, trangthai) 
                    VALUES ('$email_khachhang', '$code_order', 1)";
    $cart_query = mysqli_query($mysqli, $insert_cart);
    
 
    if ($cart_query) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_ctdonhang (idsanpham, madh, soluongmua) 
                                     VALUES ('$id_sanpham', '$code_order', '$soluong')";
            mysqli_query($mysqli, $insert_order_details);
        }
        
        $mail = new Mailer();
        $tieude = "Đặt hàng website bán phụ kiện thành công!";
        $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng: ".$code_order." </p>";
        $noidung .= "<h4>Đơn hàng bao gồm :</h4>";
        
        foreach ($_SESSION['cart'] as $key => $val) {
            $noidung .= "<ul style='border:1px solid blue;margin:10px;'>"; 
            $noidung .= "<li>" . $val['tensanpham'] . "</li>";
            $noidung .= "<li>" . $val['masp'] . "</li>";
            $noidung .= "<li>" . number_format($val['gia'], 0, ',', '.') . "đ</li>";
            $noidung .= "<li>" . $val['soluong'] . "</li>";
            $noidung .= "</ul>";
        }
        
        $maidathang = $_SESSION['email'];
        $mail->datHangMail($tieude, $noidung, $maidathang);
        
     
        unset($_SESSION['cart']);

        header('Location: ../../index.php?quanly=camon');
        exit();
    } else {
        echo "Lỗi: Không thể thêm giỏ hàng. Vui lòng thử lại!";
    }
} else {

    header('Location: index.php?quanly=dangnhap');
    exit();
}
?>
