<?php
    if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
        session_start();
        unset($_SESSION['dangky']);
        echo "<script>window.location.href='../../web_pk/index.php';</script>";
        exit();
    }
    ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminMenu" aria-controls="adminMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="adminMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="fas fa-home"></i> Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">
                        <i class="fas fa-list"></i> QL Danh mục SP
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlysanpham&query=them">
                        <i class="fas fa-box"></i> QL Sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlydanhmucbaiviet&query=them">
                        <i class="fas fa-folder"></i> QL Danh mục BV
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlybaiviet&query=them">
                        <i class="fas fa-file-alt"></i> QL Bài viết
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlydonhang&query=lietkedonhang">
                        <i class="fas fa-shopping-cart"></i> QL Đơn hàng
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="index.php?action=dangxuat">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>