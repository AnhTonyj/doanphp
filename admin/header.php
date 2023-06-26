<?php require_once 'bkconnect.php';
// Kiểm tra đăng nhập >>> nếu chưa đăng nhập quản trị thì bị đẩy về trang login.php
session_start(); // Khởi động phiên session
if (!isset($_SESSION["quan_tri"])) {
    // Chuyển tới trang login.php
    header("Location: login.php");
}

?>


<div class="content-center" style="color: white">
    <div style="width: 60%; float: left; line-height: 100px">
        <h1 style="text-transform: uppercase;">Hệ thống quản lý</h1>
    </div>
    <div style="width: 40%; float: left; line-height: 100px">
        <form action="" style="float: right;">
            <input type="text" placeholder="Tìm kiếm">
            <input type="submit" name="submit" value="Tìm kiếm">
        </form>
    </div>
</div>