<?php
$sqllietke = "SELECT tbl_sanpham.*, tbl_danhmuc.tendanhmuc 
              FROM tbl_sanpham
              INNER JOIN tbl_danhmuc ON tbl_sanpham.iddanhmuc = tbl_danhmuc.iddanhmuc 
              ORDER BY id_sanpham DESC";
$query_lietke_sanpham = mysqli_query($mysqli, $sqllietke);
?>

<div class="container mt-5">
  <h2>Liệt kê sản phẩm</h2>

  <!-- Bảng sản phẩm -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Tóm tắt</th>
        <th>Nội dung</th>
        <th>Hình ảnh</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_sanpham)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['tensanpham']; ?></td>
        <td><?php echo $row['masp']; ?></td>
        <td><?php echo number_format($row['gia'], 0, ',', '.'); ?> đ</td>
        <td><?php echo $row['soluong']; ?></td>
        <td><?php echo $row['tendanhmuc']; ?></td>
        <td><?php echo $row['tomtat']; ?></td>
        <td><?php echo $row['noidung']; ?></td>
        <td>
          <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']; ?>" width="100px" class="img-thumbnail">
        </td>
        <td><?php echo ($row['tinhtrang'] == 1) ? 'Kích hoạt' : 'Ẩn'; ?></td>
        <td>
          <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']; ?>" 
          class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
          <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham']; ?>" class="btn btn-warning btn-sm">Sửa</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>