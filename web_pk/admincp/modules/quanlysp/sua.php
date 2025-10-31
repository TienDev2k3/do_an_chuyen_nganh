
<?php
$sql_sua = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '" . $_GET['idsanpham'] . "' LIMIT 1";
$query_sua = mysqli_query($mysqli, $sql_sua);
?>

<p class="fs-4">Sửa sản phẩm</p>
<div class="container mt-4">
  <?php while ($row = mysqli_fetch_array($query_sua)) { ?>
  <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" method="post" enctype="multipart/form-data" class="w-75">
    <div class="mb-3">
      <label for="tensp" class="form-label">Tên sản phẩm</label>
      <input type="text" class="form-control" id="tensp" name="tensp" value="<?php echo $row['tensanpham']; ?>">
    </div>
    <div class="mb-3">
      <label for="masp" class="form-label">Mã sản phẩm</label>
      <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $row['masp']; ?>">
    </div>
    <div class="mb-3">
      <label for="giasp" class="form-label">Giá sản phẩm</label>
      <input type="text" class="form-control" id="giasp" name="giasp" value="<?php echo $row['gia']; ?>">
    </div>
    <div class="mb-3">
      <label for="soluong" class="form-label">Số lượng</label>
      <input type="text" class="form-control" id="soluong" name="soluong" value="<?php echo $row['soluong']; ?>">
    </div>
    <div class="mb-3">
      <label for="hinhanh" class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" id="hinhanh" name="hinhanh">
      <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" class="img-thumbnail mt-2" width="150px">
    </div>
    <div class="mb-3">
      <label for="tomtat" class="form-label">Tóm tắt</label>
      <textarea class="form-control" id="tomtat" name="tomtat" rows="3"><?php echo $row['tomtat']; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="noidung" class="form-label">Nội dung</label>
      <textarea class="form-control" id="noidung" name="noidung" rows="5"><?php echo $row['noidung']; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="danhmuc" class="form-label">Danh mục sản phẩm</label>
      <select class="form-select" id="danhmuc" name="danhmuc">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
          if ($row_danhmuc['iddanhmuc'] == $row['iddanhmuc']) {
        ?>
          <option selected value="<?php echo $row_danhmuc['iddanhmuc']; ?>">
            <?php echo $row_danhmuc['tendanhmuc']; ?>
          </option>
        <?php } else { ?>
          <option value="<?php echo $row_danhmuc['iddanhmuc']; ?>">
            <?php echo $row_danhmuc['tendanhmuc']; ?>
          </option>
        <?php }
        } ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="tinhtrang" class="form-label">Tình trạng</label>
      <select class="form-select" id="tinhtrang" name="tinhtrang">
        <option value="1" <?php if ($row['tinhtrang'] == 1) echo 'selected'; ?>>Kích hoạt</option>
        <option value="0" <?php if ($row['tinhtrang'] == 0) echo 'selected'; ?>>Ẩn</option>
      </select>
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-primary" name="suasanpham">Sửa sản phẩm</button>
    </div>
  </form>
  <?php } ?>
</div>