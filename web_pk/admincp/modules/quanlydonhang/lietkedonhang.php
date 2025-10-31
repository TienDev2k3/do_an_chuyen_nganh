<?php
$sqllietke_dh = "SELECT * FROM tbl_giohang,nguoidung WHERE tbl_giohang.emailkh = 
nguoidung.email ORDER BY tbl_giohang.idgiohang DESC";
$query_lietke_dh = mysqli_query($mysqli, $sqllietke_dh);
?>
<div class="container mt-5">
  <h2>Liệt kê đơn hàng</h2>

  <table class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tình trạng</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      while ($row = mysqli_fetch_array($query_lietke_dh)) {
          $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['magh']; ?></td>
        <td><?php echo $row['tennguoidung']; ?></td>
        <td><?php echo $row['diachi']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['dienthoai']; ?></td>
        <td>
          <?php 
          if($row['trangthai'] == 1) {
            echo '<a href="modules/quanlydonhang/xuly.php?trangthai=0&code='.$row['magh'].'" class="btn btn-warning btn-sm">Đơn hàng mới</a>';
          } else {
            echo "<span class='text-success'>Đã xem</span>";
          }
          ?>
        </td>
        <td>
          <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['magh'] ?>" class="btn btn-info btn-sm">Xem đơn hàng</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>