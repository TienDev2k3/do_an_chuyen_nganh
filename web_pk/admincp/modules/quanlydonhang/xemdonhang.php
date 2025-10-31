
<p class="fs-4">Xem đơn hàng</p>
<?php
$code = $_GET['code'];
$sqllietke_dh = "SELECT * FROM tbl_ctdonhang, tbl_sanpham 
WHERE tbl_ctdonhang.idsanpham = tbl_sanpham.id_sanpham 
AND tbl_ctdonhang.madh = '$code' 
ORDER BY tbl_ctdonhang.idctdonhang DESC";

$query_lietke_dh = mysqli_query($mysqli, $sqllietke_dh);
?>
<p class="fs-5">Liệt kê danh mục sản phẩm</p>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Thành tiền</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i = 0;
      $tongtien = 0;
      while ($row = mysqli_fetch_array($query_lietke_dh)) {
          $i++;
          $thanhtien = $row['gia'] * $row['soluongmua'];
          $tongtien += $thanhtien;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['madh']; ?></td>
        <td><?php echo $row['tensanpham']; ?></td>
        <td><?php echo $row['soluongmua']; ?></td>
        <td><?php echo number_format($row['gia'], 0, ',', '.') . " vnđ"; ?></td>
        <td><?php echo number_format($thanhtien, 0, ',', '.') . " vnđ"; ?></td>
      </tr>
      <?php
      }
      ?>
      <tr class="table-secondary">
        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
        <td class="fw-bold"><?php echo number_format($tongtien, 0, ',', '.') . " vnđ"; ?></td>
      </tr>
    </tbody>
  </table>
</div>

