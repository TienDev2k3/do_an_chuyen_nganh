<?php
if (isset($_POST['tukhoa'])) {
    $tukhoa = $_POST['tukhoa'];
} else {
    $tukhoa = '';
}

// Lọc từ khóa để tránh SQL Injection
$tukhoa = mysqli_real_escape_string($mysqli, $tukhoa);
$sql_pro = "SELECT tbl_sanpham.*, tbl_danhmuc.tendanhmuc 
            FROM tbl_sanpham 
            LEFT JOIN tbl_danhmuc ON tbl_sanpham.iddanhmuc = tbl_danhmuc.iddanhmuc
            WHERE tbl_sanpham.tensanpham LIKE '%$tukhoa%'";

$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3 class="text-center my-4">Kết quả tìm kiếm cho: <?php echo $tukhoa; ?></h3>
<div class="row">
<?php
if (mysqli_num_rows($query_pro) > 0) {
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-80 shadow-sm">
                <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>">
                    <img class="card-img-top img-fluid fixed-image" src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']; ?>" alt="<?php echo $row_pro['tensanpham']; ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-truncate" title="<?php echo $row_pro['tensanpham']; ?>">
                        <?php echo $row_pro['tensanpham']; ?>
                    </h5>
                    <p class="card-text text-danger font-weight-bold">Giá: <?php echo number_format($row_pro['gia'], 0, ',', '.'); ?> VNĐ</p>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']; ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '<p class="text-center">Không tìm thấy sản phẩm nào phù hợp với từ khóa "' . $tukhoa . '"</p>';
}
?>
</div>
