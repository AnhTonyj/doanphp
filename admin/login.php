<?php
require_once 'bkconnect.php';
//lấy dữ liệu từ form gửi lên 
if (isset($_POST["Tai_khoan"])) {
    $uname = $_POST["Tai_khoan"];
    $upass = md5($_POST["Mat_khau"]);

    $sql = "SELECT * FROM `quan_tri` WHERE `Tai_khoan` = '" . $uname . "' AND `Mat_khau` = '" . $upass . "'";
    $result = selectData($sql);
    // die($sql);
    if ($result->num_rows == 0) {
        echo 'Sai tk ';
    } else {
        foreach ($result as $item) {
            session_start();
            $_SESSION["quan_tri"] = $item["Tai_khoan"];
            header("Location: index.php");
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống bán hàng </title>
    <link rel="stylesheet" href="css/main_style.css">
</head>

<body>
    <div class="box-header">

    </div>
    <!-- Container -->
    <div class="box-container-main">
        <!-- Dashboard -->
        <center>
            <h1>Đăng nhập hệ thống</h1>
            <form action="#" method="post">
                <table>
                    <tr>
                        <td>Tài khoản</td>
                        <td>
                            <input type="text" name="Tai_khoan" id="Tai_khoan">
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <input type="password" name="Mat_khau" id="Mat_khau">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Đăng nhập">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </div>

</body>

</html>