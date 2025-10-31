<?php
session_start();
if(!isset($_SESSION['dangky'])){
    echo "<script>window.location.href='../web_pk/index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmincp.css">
    <link rel="stylesheet" href="../test_da2/css/fontawesome-free-6.7.0-web/css/all.css">
    <link rel="stylesheet" href="../../test_da2/css/bootstrap/css/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Admincp</title>
<style>
    body{
        background-color: #f5f5f5;
    }
</style>
</head>
<body>
<div class="container text-center mt-4">
        <h2 class="admincp_title fw-bold text-primary">
            <i class="fas fa-user-shield me-2"></i>
            Welcome to Admin Dashboard
        </h2>
    </div>
    <div class="wrapper">
    <?php
    include("config/config.php");
    include("modules/header.php");
   // include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
    ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="css/ckeditor/ckeditor.js"></script>
    <script> 
     CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');

    </script>
</body>
</html>