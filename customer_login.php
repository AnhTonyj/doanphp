<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="css/main_style.css">
    <script type="text/javascript" src="js/main_script.js"></script>
</head>

<body onload="onloadFormComplete()">
    <!-- header -->

    <head><?php require_once 'public/header.php' ?></head>
    <?php
    if (isset($_POST["submit"])) {
        $uname = $_POST["Tai_khoan"];
        $pass = md5($_POST["Mat_khau"]);
        // SQL Injection: a' OR 1=1 --
        // $sql = "SELECT * FROM `admin` WHERE `username` = '".$uname."' AND `password` = '".$pass."'";
        // // echo $sql;
        // $result = mysqli_query($bkconn, $sql);
        $sql = "SELECT * FROM `quan_tri` WHERE `Tai_khoan` = ? AND `Mat_khau` = ?";
        $stmt = mysqli_prepare($bkconn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
        mysqli_stmt_execute($stmt); // Kích hoạt lệnh prepare
        $result = mysqli_stmt_get_result($stmt); // Lấy dữ liệu trả về
        if (mysqli_num_rows($result) > 0) {
            // Đăng nhập thành công
            // session_start();
            // Lưu thông tin người dùng vào session
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["Ma_kh"] = $row["Ma_kh"];
                $_SESSION["Tai_khoan"] = $row["Tai_khoan"];
                $_SESSION["Ten_kh"] = $row["Ten_kh"];
                $_SESSION["Dien_thoai"] = $row["Dien_thoai"];
                $_SESSION["Dia_chi"] = $row["Dia_chi"];
            }
            header("Location: index.php");
        } else {
            // Đăng nhập thất bại
            echo "<script>alert('Tài khoản/mật khẩu không đúng!');</script>";
        }
    }
    ?>
    <!-- Body  -->
    <div class="content-center main-body">
        <!-- Form đăng nhập  -->
        <div style="width: 400px; height: 300px; margin: 0 auto; margin-top: 100px; overflow: hidden; box-sizing: border-box; padding: 10px">
            <fieldset style="padding: 10px">
                <legend>
                    <h2>Đăng nhập</h2>
                </legend>
                <form name="form_login" action="#" method="POST" style="width: 100%">
                    <table style="width: 100%" cellspacing="6" cellpadding="6">
                        <tr>
                            <td>Tài khoản: </td>
                            <td><input type="text" name="Tai_khoan" id="Tai_khoan" required=""></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input type="password" name="Mat_khau" id="Mat_khau" required=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="checkbox" name="" id="" checked="checked">Nhớ tài khoản</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Đăng nhập" onclick="return validateLogin();" />
                                <input type="reset" value="Làm lại">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><span id="msg_error" style="color: red"></span></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
    <!-- Footer  -->
    <footer>
        <div class="content-center">
            <?php include_once 'public/footer.php'; ?>
        </div>
    </footer>

</body>

</html>