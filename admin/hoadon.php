<?php require_once 'bkconnect.php';
if (isset($_POST["txtMahd"])) {
    $mahd = $_POST["txtMahd"];
    $ngayhd = $_POST["txtNgayhd"];
    $tennn = $_POST["txtTennn"];
    $diachinn = $_POST["txtDiachinn"];
    $sdtnn = $_POST["nbSdt"];
    $emailnn = $_POST["txtEmail"];
    $ngaygh = $_POST["txtNgaygiaohang"];
    $trangthai = $_POST["chkTrangthai"];
    $makh = $_POST["txtMakh"];
    $maptvc = $_POST["txtMaptvc"];
    $mapttt = $_POST["txtMapttt"];
    $sql = "INSERT INTO `hoa_don`(`MaHD`, `Ngay_HD`, `Hoten_nguoinhan`, `Diachi_nguoinhan`, `Dienthoai_nguoinhan`, `Diachi_email`, `Ngay_giao_hang`, `Trang_thai`, `MaKH`, `MaPTVC`, `MaPTTT`) 
        VALUES ('$mahd','$ngayhd','$tennn','$diachinn','$sdtnn','$emailnn','$ngaygh','$trangthai','$makh','$maptvc','$mapttt')";
    $isOk = insertOrUpdate($sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá Đơn </title>
</head>

<body>

    <?php require_once 'header.php' ?>
    <?php include_once 'menu.php'  ?>
    <div class="box-container">
        <h1>Quản lý hoá đơn</h1>
        <?php if (isset($isOk)) {
            if ($isOk) {
                echo 'Thêm mới thành công';
            } else {
                echo 'Thêm mới thất bại';
            }
        }
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Mã hoá đơn </td>
                    <td><input type="text" name="txtMahd" id="txtMahd"></td>
                </tr>
                <tr>
                    <td>Ngày hoá đơn</td>
                    <td><input type="datetime" name="txtNgayhd" id="txtNgayhd"></td>
                </tr>
                <tr>
                    <td>Tên người nhận</td>
                    <td><input type="text" name="txtTennn" id="txtTennn"></td>
                </tr>
                <tr>
                    <td>Địa chỉ người nhận</td>
                    <td><input type="text" name="txtDiachinn" id="txtDiachinn"></td>
                </tr>
                <tr>
                    <td>SĐT người nhận</td>
                    <td><input type="number" name="nbSdt" id="nbSdt"></td>
                </tr>
                <tr>
                    <td>Email người nhận</td>
                    <td><input type="email" name="txtEmail" id="txtEmail"></td>
                </tr>
                <tr>
                    <td>Ngày giao hàng</td>
                    <td><input type="date" name="txtNgaygiaohang" id="txtNgaygiaohang"></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><input type="checkbox" name="chkTrangthai" id="chkTrangthai"></td>
                </tr>
                <tr>
                    <td>Mã khách hàng</td>
                    <td><input type="text" name="txtMakh" id="txtMakh"></td>
                </tr>
                <tr>
                    <td>Mã phương thức vận chuyển</td>
                    <td><input type="text" name="txtMaptvc" id="txtMaptvc"></td>
                </tr>
                <tr>
                    <td>Mã phương thức thanh toán</td>
                    <td><input type="text" name="txtMapttt" id="txtMapttt"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="reset" value="Reset">
                        <input type="submit" value="Thêm mới">

                    </td>
                </tr>
            </table>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Mã hoá đơn </th>
                    <th>Ngày hoá đơn </th>
                    <th>Họ tên người nhận</th>
                    <th>Địa chỉ người nhận</th>
                    <th>Điện thoại người nhận</th>
                    <th>Địa chỉ email </th>
                    <th>Ngày giao hàng</th>
                    <th>Trạng thái</th>
                    <th>Mã khách hàng </th>
                    <th>Mã phương thức vận chuyển</th>
                    <th>Mã phương thức thanh toán </th>
                    <th>Cập nhật </th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "";
                $arrHoadon = selectData($sql);
                foreach ($arrHoadon as $item) {
                    echo "
                    <tr>
                    <td>" . $item["MaHD"] . "</td>
                    <td>" . $item["Ngay_HD"] . "</td>
                    <td>" . $item["Hoten_nguoinhan"] . "</td>
                    <td>" . $item["Diachi_nguoinhan"] . "</td>
                    <td>" . $item["Dienthoai_nguoinhan"] . "</td>
                    <td>" . $item["Diachi_email"] . "</td>
                    <td>" . $item["Ngay_giao_hang"] . "</td>
                    <td>" . ($item["Trang_thai"] ? "Đã giao" : "Chưa giao") . "</td>
                    <td>" . $item["MaKH"] . "</td>
                    <td>" . $item["MaPTVC"] . "</td>
                    <td>" . $item["MaPTTT"] . "</td>
                    <td><a href=\"\"><img src=\"../images/ic_edit.png\" alt=\"\"></a></td>
                    <td><a href=\"\"><img src=\"../images/ic_delete.png\" alt=\"\"></a></td>
                </tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

</body>

</html>