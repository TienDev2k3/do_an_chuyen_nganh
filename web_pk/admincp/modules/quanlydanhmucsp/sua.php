<?php
$sqllietke = "SELECT * FROM tbl_danhmuc where iddanhmuc=$_GET[iddanhmuc] LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sqllietke);
?>
<p class="fs-4">Sửa danh mục sản phẩm</p>
<div class="container mt-4">
  <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>" method="POST" class="w-50">
    <?php
    while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
    ?>
    <div class="mb-3">
      <label for="tendanhmuc" class="form-label">Điền danh mục sản phẩm</label>
      <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" value="<?php echo $dong['tendanhmuc']?>">
    </div>
    <div class="mb-3">
      <label for="thutu" class="form-label">Thứ tự</label>
      <input type="text" class="form-control" id="thutu" name="thutu" value="<?php echo $dong['thutu']?>">
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa danh mục sản phẩm</button>
    </div>
    <?php
    }
    ?>
  </form>
</div>