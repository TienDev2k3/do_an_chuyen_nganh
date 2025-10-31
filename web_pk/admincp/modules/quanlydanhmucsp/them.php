<div class="container mt-5">
  <h2>Thêm danh mục sản phẩm</h2>

  <form action="modules/quanlydanhmucsp/xuly.php" method="POST">
    <div class="col-md-6 mb-3">
      <label for="tendanhmuc" class="form-label">Tên danh mục sản phẩm</label>
      <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" required>
    </div>

    <div class="col-md-6  mb-3">
      <label for="thutu" class="form-label">Thứ tự</label>
      <input type="text" class="form-control" id="thutu" name="thutu" required>
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm danh mục sản phẩm</button>
    </div>
  </form>
</div>
