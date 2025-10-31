<?php
session_start();
include('../../admincp/config/config.php');

// Xử lý Ajax request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array('success' => false);
    
    if (isset($_POST['action']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $action = $_POST['action'];
        $product = array();
        $tongtien = 0;

        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id'] == $id) {
                if ($action === 'cong' && $cart_item['soluong'] < 10) {
                    $cart_item['soluong']++;
                } elseif ($action === 'tru' && $cart_item['soluong'] > 1) {
                    $cart_item['soluong']--;
                }
                $response['quantity'] = $cart_item['soluong'];
                $response['thanhtien'] = number_format($cart_item['soluong'] * $cart_item['gia'], 0, ',', '.');
            }
            $product[] = $cart_item;
            $tongtien += $cart_item['soluong'] * $cart_item['gia'];
        }

        $_SESSION['cart'] = $product;
        $response['success'] = true;
        $response['tongtien'] = number_format($tongtien, 0, ',', '.');
        
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
if (isset($_GET['cong'])) {
    $id = $_GET['cong']; 
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id && $cart_item['soluong'] < 10) {
            $cart_item['soluong']++; 
        }
        $product[] = array(
            'tensanpham' => $cart_item['tensanpham'],
            'id' => $cart_item['id'],
            'soluong' => $cart_item['soluong'],
            'gia' => $cart_item['gia'],
            'hinhanh' => $cart_item['hinhanh'],
            'masp' => $cart_item['masp']
        );
    }

    $_SESSION['cart'] = $product;
}
if (isset($_GET['tru'])) {
    $id = $_GET['tru']; 
    $product = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] == $id && $cart_item['soluong'] > 1) {
            $cart_item['soluong']--; 
        }
        $product[] = array(
            'tensanpham' => $cart_item['tensanpham'],
            'id' => $cart_item['id'],
            'soluong' => $cart_item['soluong'],
            'gia' => $cart_item['gia'],
            'hinhanh' => $cart_item['hinhanh'],
            'masp' => $cart_item['masp']
        );
    }

    $_SESSION['cart'] = $product; 
   
}
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa']; 
    $product = array();
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],
                'id' => $cart_item['id'],
                'soluong' => $cart_item['soluong'],
                'gia' => $cart_item['gia'],
                'hinhanh' => $cart_item['hinhanh'],
                'masp' => $cart_item['masp']
            );
        }
        $_SESSION['cart'] = $product;
        header('Location: ../../index.php?quanly=giohang');
    }
}

if (isset($_GET['xoatatca'])) {
    unset($_SESSION['cart']); 
    header('Location: ../../index.php?quanly=giohang');
    exit;
}


$idsp = isset($_GET['idsanpham']) ? $_GET['idsanpham'] : '';
if ($idsp) {
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$idsp' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);

    if ($row) {
        $new_product = array(
            array(
                'tensanpham' => $row['tensanpham'],
                'id' => $row['id_sanpham'],
                'soluong' => 1,
                'gia' => $row['gia'],
                'hinhanh' => $row['hinhanh'],
                'masp' => $row['masp']
            )
        );

        if (isset($_SESSION['cart'])) {
            $found = false;
            $cart = $_SESSION['cart'];

            foreach ($cart as &$cart_item) {
                if ($cart_item['id'] == $idsp) {
                    $cart_item['soluong'] += 1; // Tăng số lượng nếu sản phẩm đã tồn tại
                    $found = true;
                }
            }

            if (!$found) {
                $cart = array_merge($cart, $new_product);
            }

            $_SESSION['cart'] = $cart;
        } else {
            // Tạo giỏ hàng mới
            $_SESSION['cart'] = $new_product;
        }
    }
}

header('Location: ../../index.php?quanly=giohang');
exit;
?>