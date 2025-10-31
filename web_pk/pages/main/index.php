<?php
if (isset($_GET['trang'])) {
  $page = $_GET['trang'];
} else {
  $page = '1';
}
if ($page == '' || $page == '1') {
  $begin = 0;
} else {
  $begin = ($page * 8) - 8;
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc  WHERE tbl_sanpham.iddanhmuc=tbl_danhmuc.iddanhmuc 
ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,8";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h3 class="text-center my-4">Sản phẩm mới nhất</h3>
<div class="row">
  <?php
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
  ?>
</div>

<ul class="pagination justify-content-center">
  <?php
  $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham ");
  $row_count = mysqli_num_rows($sql_trang);
  $trang = ceil($row_count / 8);
  for ($i = 1; $i <= $trang; $i++) {
    ?>
    <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
      <a href="index.php?trang=<?php echo $i; ?>" class="page-link"> <?php echo $i; ?></a>
    </li>
    <?php
  }
  ?>
</ul>
<style>

</style>