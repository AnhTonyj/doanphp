<?php
// Khai báo biến kết nối csdl
$hosting = "localhost";
$username = "root";
$password = "";
$database = "doanphp";

function connect()
{
    global $hosting, $username, $password, $database;
    // Mở kết nối tới CSDL
    $cnn = new mysqli($hosting, $username, $password, $database);
    // Kiểm tra kết nối có được không
    if ($cnn->connect_error) {
        // echo "Lỗi kết nối tới CSDL";
        die("Lỗi kết nối tới CSDL: " + $cnn->connect_error); // Dừng và hiển thị mã lỗi
    }
    return $cnn;
}

// Hàm truy vấn và lấy về dữ liệu: SELECT
function selectData($sql)
{
    // Mở kết nối
    $ketnoi = connect();

    // Thực hiện truy vấn dữ liệu
    $result = $ketnoi->query($sql);
    $ketnoi->close();
    return $result;
}

// Hàm truy vấn thực hiện: INSERT, UPDATE, DELETE
function insertOrUpdate($sql)
{
    // Mở kết nối
    $ketnoi = connect();

    // Thực hiện lệnh
    $isOk = $ketnoi->query($sql);
    $ketnoi->close();

    if ($isOk) {
        return true;
    } else {
        return false;
    }
}
