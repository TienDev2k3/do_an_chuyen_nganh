<div class="container mt-5">
  <h2>Thêm bài viết</h2>
  <form action="modules/quanlybaiviet/xuly.php" method="post" enctype="multipart/form-data">
    <div class="col-md-5 mb-3">
      <label for="tenbaiviet" class="form-label">Tên bài viết</label>
      <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet" required>
    </div>
    
    <div class="col-md-5 mb-3">
      <label for="hinhanh" class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" id="hinhanh" name="hinhanh" required>
    </div>
    
    <div class="mb-3">
      <label for="tomtat" class="form-label">Tóm tắt</label>
      <textarea class="form-control" id="tomtat" name="tomtat" rows="5" required></textarea>
    </div>
    
    <div class="mb-3">
      <label for="noidung" class="form-label">Nội dung</label>
      <textarea class="form-control" id="noidung" name="noidung" rows="10" required></textarea>
    </div>
    
    <div class="col-md-5 mb-3">
      <label for="danhmuc" class="form-label">Danh mục bài viết</label>
      <select class="form-control" id="danhmuc" name="danhmuc" required>
        <?php
        $sql_danhmuc = "SELECT * from tbl_dmbaiviet ORDER BY iddmbaiviet DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
          <option value="<?php echo $row_danhmuc['iddmbaiviet']; ?>"><?php echo $row_danhmuc['tendmbaiviet']; ?></option>
        <?php } ?>
      </select>
    </div>
    
    <div class="col-md-5 mb-3">
      <label for="tinhtrang" class="form-label">Tình trạng</label>
      <select class="form-control" id="tinhtrang" name="tinhtrang" required>
        <option value="1">Kích hoạt</option>
        <option value="0">Ẩn</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary" name="thembaiviet">Thêm bài viết</button>
  </form>
</div>