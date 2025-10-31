<h4 style="color:red">chi tiết sản phẩm</h4>
<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc  WHERE tbl_sanpham.iddanhmuc=tbl_danhmuc.iddanhmuc AND tbl_sanpham.id_sanpham ='$_GET[id]'
 LIMIT 1";
 $query_chitiet=mysqli_query($mysqli,$sql_chitiet);
while($row_chitiet =mysqli_fetch_array($query_chitiet)){
?>

<div class=" d-flex flex-wrap">
    <div class="hinhanh_sanpham col-lg-6 col-md-12 mb-4">
        <img class="img-fluid rounded" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']; ?>" alt="<?php echo $row_chitiet['tensanpham']; ?>">
    </div>
    <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'];?>" method="POST" class="col-lg-6 col-md-12">
        <div class="chitiet_sanpham p-3 border rounded shadow-sm">
            <h4 class="title_product mb-3">Tên sản phẩm: <?php echo $row_chitiet['tensanpham']; ?></h4>
            <p class="price_product text-danger font-weight-bold">Giá: <?php echo number_format($row_chitiet['gia'], 0, ',', '.'); ?> VNĐ</p>
            <p class="text-secondary">Số lượng: <?php echo $row_chitiet['soluong']; ?></p>
            <p class="text-secondary">Danh mục: <?php echo $row_chitiet['tendanhmuc']; ?></p>
            <button type="submit" name="themgiohang" class="btn btn-primary btn-block mt-3">Thêm vào giỏ hàng</button>
        </div>
    </form>
</div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Thông số </a></li>
    <li><a href="#tab2">Nội dung chi tiết</a></li>
    <li><a href="#tab3">Hình ảnh sản phẩm</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
    <?php echo $row_chitiet['tomtat']; ?>
    </div>
    <div id="tab2" class="tab-content">
    <?php echo $row_chitiet['noidung']; ?>
    </div>
    <div id="tab3" class="tab-content">
    <img width ="80%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']; ?>" alt="">
    </div>
  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->
<?php
}

?>

