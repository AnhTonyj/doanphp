<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="..//css/main_style.css">
</head>

<body>
    <!-- Header -->
    <header><?php require_once 'header.php' ?></header>
    <!-- Body -->
    <div class="conten-center main-body">
        <!-- Danh mục -->
        <div style="width: 20%; float:left; overflow: hidden; box-sizing: border-box;">
            <?php include_once 'menu.php'; ?>
        </div>
        <!-- Nội dung -->
        <div style="width: 80%; float:left; overflow: hidden; box-sizing: border-box; padding: 10px;">
            <h1>Thống kê báo cáo</h1>
        </div>
    </div>
    <!-- Footer -->
    <footer style="height: 50px; min-height: 50px; line-height: 50px; text-align: center">
        <div class="content-center">
            Hệ thống được bảo trợ bởi Tony| Mọi chi tiết liên hệ admin Phan Tuấn Anh, SĐT: 0399968781
        </div>
    </footer>


</body>

</html>