<?php
$sqllietke = "SELECT * FROM tbl_dmbaiviet where iddmbaiviet=$_GET[iddmbaiviet] LIMIT 1";
$query_sua_danhmucbv = mysqli_query($mysqli, $sqllietke);
?>
<p class="fs-4">Sửa danh mục bài viết</p>
<div class="container mt-4">
  <form action="modules/quanlydanhmucbaiviet/xuly.php?iddmbaiviet=<?php echo $_GET['iddmbaiviet']?>" method="POST" class="w-50">
    <?php
    while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
    ?>
    <div class="mb-3">
      <label for="tendmbaiviet" class="form-label">Điền danh mục bài viết</label>
      <input type="text" class="form-control" id="tendmbaiviet" name="tendmbaiviet" value="<?php echo $dong['tendmbaiviet']?>">
    </div>
    <div class="mb-3">
      <label for="thutu" class="form-label">Thứ tự</label>
      <input type="text" class="form-control" id="thutu" name="thutu" value="<?php echo $dong['thutu']?>">
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-primary" name="suadmbaiviet">Sửa danh mục bài viết</button>
    </div>
    <?php
    }
    ?>
  </form>
</div>