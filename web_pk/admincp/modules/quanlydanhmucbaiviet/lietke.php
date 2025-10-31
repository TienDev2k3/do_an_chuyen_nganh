<?php
$sqllietke = "SELECT * FROM tbl_dmbaiviet ORDER BY thutu DESC";
$query_lietke_dmbaiviet = mysqli_query($mysqli, $sqllietke);
?>

<div class="container mt-5">
  <h2>Liệt kê danh mục bài viết</h2>

  <?php

  if (isset($_GET['message'])) {
      if ($_GET['message'] == 'cannot_delete') {
          echo "<div class='alert alert-danger'>Bạn không thể xóa danh mục này vì vẫn còn bài viết liên kết.</div>";
      } elseif ($_GET['message'] == 'deleted') {
          echo "<div class='alert alert-success'>Xóa danh mục thành công!</div>";
      }
  }
  ?>


  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên danh mục bài viết</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_dmbaiviet)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['tendmbaiviet']; ?></td>
        <td>
            <a href="modules/quanlydanhmucbaiviet/xuly.php?iddmbaiviet=<?php echo $row['iddmbaiviet'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            <a href="?action=quanlydanhmucbaiviet&query=sua&iddmbaiviet=<?php echo $row['iddmbaiviet']?>" class="btn btn-warning btn-sm">Sửa</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>