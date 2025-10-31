<?php
$sqllietke = "SELECT * FROM tbl_baiviet, tbl_dmbaiviet 
               WHERE tbl_baiviet.iddmbaiviet = tbl_dmbaiviet.iddmbaiviet 
               ORDER BY idbv DESC";
$query_lietke_baiviet = mysqli_query($mysqli, $sqllietke);
?>
<div class="container mt-5">
  <h2>Liệt kê bài viết</h2>

  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>STT</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
        <th>Tóm tắt</th>
        <th>Nội dung</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_baiviet)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['tenbaiviet']; ?></td>
        <td>
          <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']; ?>" width="100px" class="img-fluid">
        </td>
        <td><?php echo $row['tendmbaiviet']; ?></td>
        <td><?php echo $row['tomtat']; ?></td>
        <td><?php echo $row['noidung']; ?></td>
        <td>
          <?php echo ($row['tinhtrang'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?>
        </td>
        <td>
          <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['idbv'] ?>" class="btn btn-danger btn-sm">Xóa</a> |
          <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['idbv'] ?>" class="btn btn-warning btn-sm">Sửa</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>