<div class="container mt-5">
  <h2>Thêm sản phẩm</h2>

  <form action="modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data">
    <div class="col-md-5 mb-3">
      <label for="tensp" class="form-label">Tên sản phẩm</label>
      <input type="text" class="form-control" name="tensp" id="tensp" required>
    </div>

    <div class="col-md-5 mb-3">
      <label for="masp" class="form-label">Mã sản phẩm</label>
      <input type="text" class="form-control" name="masp" id="masp" required>
    </div>

    <div class="col-md-5 mb-3">
      <label for="giasp" class="form-label">Giá sản phẩm</label>
      <input type="number" class="form-control" name="giasp" id="giasp" required>
    </div>

    <div class="col-md-5 mb-3">
      <label for="soluong" class="form-label">Số lượng</label>
      <input type="number" class="form-control" name="soluong" id="soluong" required>
    </div>

    <div class="col-md-5 mb-3">
      <label for="hinhanh" class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" name="hinhanh" id="hinhanh" required>
    </div>

    <div class=" mb-3">
      <label for="tomtat" class="form-label">Tóm tắt</label>
      <textarea class="form-control" name="tomtat" id="tomtat" rows="5" required></textarea>
    </div>

    <div class=" mb-3">
      <label for="noidung" class="form-label">Nội dung</label>
      <textarea class="form-control" name="noidung" id="noidung" rows="5" required></textarea>
    </div>

    <div class="col-md-5 mb-3">
      <label for="danhmuc" class="form-label">Danh mục sản phẩm</label>
      <select name="danhmuc" id="danhmuc" class="form-select" required>
        <?php
        $sql_danhmuc ="SELECT * from tbl_danhmuc ORDER BY iddanhmuc DESC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
          <option value="<?php echo $row_danhmuc['iddanhmuc']; ?>"><?php echo $row_danhmuc['tendanhmuc']; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="col-md-5 mb-3">
      <label for="tinhtrang" class="form-label">Tình trạng</label>
      <select name="tinhtrang" id="tinhtrang" class="form-select" required>
        <option value="1">Kích hoạt</option>
        <option value="0">Ẩn</option>
      </select>
    </div>

    <div class="col-md-5 mb-3">
      <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
    </div>
  </form>
</div>