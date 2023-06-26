<?php
require_once 'connection.php';
if (isset($_GET["invoiceId"])) {
    $id = $_GET["invoiceId"];

    // Cập nhật trạng thái đơn hàng
    $sql = "UPDATE `hoa_don` SET `Trang_thai`=2 WHERE `MaHD` = " . $id;
    if (mysqli_query($bkconn, $sql)) {
        header("Location: manager_hoa_don.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($bkconn);
    }
}
