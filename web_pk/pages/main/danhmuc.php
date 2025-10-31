<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.iddanhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);

$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.iddanhmuc='$_GET[id]' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>

<h3 class="text-center my-4">Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']; ?></h3>
<div class="row">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-80 shadow-sm">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>">
                <img class="card-img-top img-fluid fixed-image" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" alt="<?php echo $row['tensanpham']; ?>">
            </a>
            <div class="card-body text-truncate">
                <h5 class="card-title">Tên sản phẩm: <?php echo $row['tensanpham']; ?></h5>
                <p class="card-text text-danger font-weight-bold">Giá: <?php echo number_format($row['gia'], 0, ',', '.'); ?> VNĐ</p>
            </div>
            <div class="card-footer text-center">
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>" class="btn btn-primary btn-sm">Xem chi tiết</a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>