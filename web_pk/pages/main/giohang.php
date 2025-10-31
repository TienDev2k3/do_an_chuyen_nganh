<?php
if (isset($_SESSION['dangky'])) {
    echo 'Xin chào: ' . $_SESSION['dangky'];
}
?>
<!-- <div class="c" style="margin-top:5%"></div>
<div class="arrow-steps clearfix">
    <div class="step current"><span><a href="index.php?quanly=giohang">Giỏ hàng</a></span></div>
    <div class="step"><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span></div>
    <div class="step"><span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span></div>
    <div class="step"><span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span></div>
</div> -->


</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Thành tiền</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kiểm tra nếu có sản phẩm trong giỏ hàng
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $i = 0;
                $tongtien = 0;

                foreach ($_SESSION['cart'] as $cart_item) {
                    $i++;
                    $thanhtien = $cart_item['gia'] * $cart_item['soluong'];
                    $tongtien += $thanhtien;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cart_item['masp']; ?></td>
                        <td><?php echo $cart_item['tensanpham']; ?></td>
                        <td>
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="100"
                                alt="Hình ảnh sản phẩm">
                        </td>
                        <td class="icon">
                            <button onclick="updateCart('cong', <?php echo $cart_item['id'] ?>)" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <span id="quantity_<?php echo $cart_item['id'] ?>"><?php echo $cart_item['soluong']; ?></span>
                            <button onclick="updateCart('tru', <?php echo $cart_item['id'] ?>)" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        </td>

                    

                        <td><?php echo number_format($cart_item['gia'], 0, ',', '.') . ' VNĐ'; ?></td>
                        <td id="thanhtien_<?php echo $cart_item['id'] ?>">
                            <?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ'; ?>
                        </td>
                        <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"
                                class="btn btn-outline-danger btn-sm">Xóa</a></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="6" class="text-left font-weight-bold">
                        Tổng tiền: <span id="tongtien"><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ'; ?></span>
                    </td>
                    <td colspan="2" class="text-right">
                        <?php
                        if (isset($_SESSION['dangky'])) {
                            ?>
                            <a href="pages/main/thanhtoan.php" class="btn btn-success">Đặt hàng</a>
                            <?php
                        } else {
                            ?>
                            <a href="index.php?quanly=dangky" class="btn btn-warning">Đăng ký để Đặt hàng</a>
                            <?php
                        }
                        ?>
                        <br><br>
                        <a href="pages/main/themgiohang.php?xoatatca=1" class="btn btn-danger">Xóa tất cả</a>
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="7" class="text-center">Hiện tại giỏ hàng trống</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

