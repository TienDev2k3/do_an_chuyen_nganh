<?php
include("../../config/config.php");

$tendanhmuc = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

if (isset($_POST['themdanhmuc'])) {
    // Thêm danh mục
    $sqlthem = "INSERT INTO tbl_danhmuc(tendanhmuc, thutu) VALUE('$tendanhmuc', '$thutu')";
    mysqli_query($mysqli, $sqlthem);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} elseif (isset($_POST['suadanhmuc'])) {
    // Sửa danh mục
    $sqlsua = "UPDATE tbl_danhmuc SET tendanhmuc='$tendanhmuc', thutu='$thutu' WHERE iddanhmuc='$_GET[iddanhmuc]'";
    mysqli_query($mysqli, $sqlsua);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} else {
    // Xóa danh mục
    $id = $_GET['iddanhmuc'];

    // Kiểm tra xem danh mục có sản phẩm liên kết không
    $sql_check = "SELECT * FROM tbl_sanpham WHERE iddanhmuc='$id'";
    $query_check = mysqli_query($mysqli, $sql_check);
    $row_count = mysqli_num_rows($query_check);

    if ($row_count > 0) {
        // Có sản phẩm liên kết
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them&message=cannot_delete');
    } else {
        $sqlxoa = "DELETE FROM tbl_danhmuc WHERE iddanhmuc='$id'";
        mysqli_query($mysqli, $sqlxoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them&message=deleted');
    }
}
?>
