<?php
$sqllietke = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sqllietke);
?>

<div class="container mt-5">
  <h2>Liệt kê danh mục sản phẩm</h2>

  <?php

  if (isset($_GET['message'])) {
      if ($_GET['message'] == 'cannot_delete') {
          echo "<div class='alert alert-danger'>Bạn không thể xóa danh mục này vì vẫn còn sản phẩm liên kết.</div>";
      } elseif ($_GET['message'] == 'deleted') {
          echo "<div class='alert alert-success'>Xóa danh mục thành công!</div>";
      }
  }
  ?>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['tendanhmuc']; ?></td>
        <td>
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['iddanhmuc'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['iddanhmuc']?>" class="btn btn-warning btn-sm">Sửa</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>