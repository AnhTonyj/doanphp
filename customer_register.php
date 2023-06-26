<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="css/main_style.css">
    <script type="text/javascript" src="js/main_script.js"></script>
</head>

<body>
    <header> <?php require_once 'public/header.php' ?></header>
    <?php
    if (isset($_POST["submit"])) {
        $uname = $_POST["Tai_khoan"];
        $pass = md5($_POST["Mat_khau"]);
        $fullname = $_POST["Ho_ten"];
        $email = $_POST["Email"];
        $phone = $_POST["Dien_thoai"];
        $address = $_POST["Dia_chi"];
        $facebook = $_POST["facebook"];
    }
    ?>

</body>

</html>