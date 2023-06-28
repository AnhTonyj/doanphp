<h3 style="text-transform: uppercase; padding: 5px">Quản lý HT</h3>
<ul class="no-list-style loai_san_pham">
    <a href="index.php">
        <li>Tổng quan</li>
    </a>
    <a href="sanpham.php">
        <li>Sản phẩm</li>
    </a>
    <a href="manager_loai_san_pham.php">
        <li>Danh mục</li>
    </a>
    <a href="khachhang.php">
        <li>Khách hàng</li>
    </a>
    <a href="manager_invoice.php">
        <li>Hóa đơn</li>
    </a>
    <a href="manager_unit.php">
        <li>Đơn vị tính</li>
    </a>
    <a href="manager_news.php">
        <li>Tin tức</li>
    </a>
    <a href="manager_transfomr.php">
        <li>Phương thức vận chuyển</li>
    </a>
    <a href="manager_payment.php">
        <li>Phương thức thanh toán</li>
    </a>
    <a href="manager_account.php">
        <li>Tài khoản</li>
    </a>
</ul>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="box-menu">
        <span>Chào mừng quản trị viên: <?php echo $_SESSION["quan_tri"] ?></span>
        <a href="logout.php">(thoát)</a>
        <ul>
            <li><a href="sanpham.php">Quản lý sản phẩm</a></li>
            <li><a href="">Quản lý khách hàng</a></li>
            <li><a href="">Quản lý danh mục</a></li>
        </ul>
    </div>
</body>

</html>