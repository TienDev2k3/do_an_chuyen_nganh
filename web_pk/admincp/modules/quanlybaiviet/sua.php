

<?php
$sql_sua = "SELECT * FROM tbl_baiviet WHERE idbv = '" . $_GET['idbaiviet'] . "' LIMIT 1";
$query_sua = mysqli_query($mysqli, $sql_sua);
?>

<div class="container mt-4">
  <h2 class="mb-4">Sửa bài viết</h2>
  <?php while($row = mysqli_fetch_array($query_sua)) { ?>
    <form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['idbv']; ?>" method="post" enctype="multipart/form-data" class="mb-4">
      <div class="row mb-3">
        <label for="tenbaiviet" class="col-md-5 col-form-label">Tên bài viết</label>
        <div class="col-md-7">
          <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet" value="<?php echo $row['tenbaiviet']; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="hinhanh" class="col-md-5 col-form-label">Hình ảnh</label>
        <div class="col-md-7">
          <input type="file" class="form-control" id="hinhanh" name="hinhanh">
          <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" class="img-thumbnail mt-2" width="150px">
        </div>
      </div>
      <div class="mb-3">
        <label for="tomtat" class="form-label">Tóm tắt</label>
        <textarea class="form-control" id="tomtat" name="tomtat" rows="4"><?php echo $row['tomtat']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="noidung" class="form-label">Nội dung</label>
        <textarea class="form-control" id="noidung" name="noidung" rows="6"><?php echo $row['noidung']; ?></textarea>
      </div>
      <div class="row mb-3">
        <label for="danhmuc" class="col-md-5 col-form-label">Danh mục bài viết</label>
        <div class="col-md-7">
          <select class="form-select" id="danhmuc" name="danhmuc">
            <?php
            $sql_danhmuc = "SELECT * FROM tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                if ($row_danhmuc['iddmbaiviet'] == $row['iddmbaiviet']) {
            ?>
            <option selected value="<?php echo $row_danhmuc['iddmbaiviet']; ?>">
              <?php echo $row_danhmuc['tendmbaiviet']; ?>
            </option>
            <?php } else { ?>
            <option value="<?php echo $row_danhmuc['iddmbaiviet']; ?>">
              <?php echo $row_danhmuc['tendmbaiviet']; ?>
            </option>
            <?php }} ?>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="tinhtrang" class="col-md-5 col-form-label">Tình trạng</label>
        <div class="col-md-7">
          <select class="form-select" id="tinhtrang" name="tinhtrang">
            <option value="1" <?php if ($row['tinhtrang'] == 1) echo 'selected'; ?>>Kích hoạt</option>
            <option value="0" <?php if ($row['tinhtrang'] == 0) echo 'selected'; ?>>Ẩn</option>
          </select>
        </div>
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary" name="suabaiviet">Sửa bài viết</button>
      </div>
    </form>
  <?php } ?>
</div>