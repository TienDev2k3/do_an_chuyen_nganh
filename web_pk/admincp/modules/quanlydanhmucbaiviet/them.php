<div class="container mt-5">
  <h2>Thêm danh mục bài viết</h2>

  <form action="modules/quanlydanhmucbaiviet/xuly.php" method="POST">
    <div class="col-md-5 mb-3">
      <label for="tendmbaiviet" class="form-label">Tên danh mục bài viết</label>
      <input type="text" class="form-control" id="tendmbaiviet" name="tendmbaiviet" required>
    </div>

    <div class="col-md-5 mb-3">
      <label for="thutu" class="form-label">Thứ tự</label>
      <input type="text" class="form-control" id="thutu" name="thutu" required>
    </div>

    <div class="col-md-5 mb-3">
      <button type="submit" class="btn btn-primary" name="themdanhmucbaiviet">Thêm danh mục bài viết</button>
    </div>
  </form>
</div>