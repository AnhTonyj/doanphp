<?php require_once 'bkconnect.php';
if (isset($_POST["txtName"])) {
    $makh = $_POST["txtMakh"];
    $hoten = $_POST["txtName"];
    $taikhoan = $_POST["txtTaikhoan"];
    $matkhau = $_POST["txtMatkhau"];
    $diachi = $_POST["txtDiachi"];
    $dienthoai = $_POST["txtDienthoai"];
    $email = $_POST["txtEmail"];
    $ngaysinh = $_POST["txtNgaysinh"];
    $ngaycapnhat = $_POST["txtNgaycapnhat"];
    $gioitinh = $_POST["chkGioitinh"];
    $tichdiem = $_POST["txtTichdiem"];
    $trangthai = $_POST["chkTrangthai"];
    //Xử lý dữ liệu vào 
    $sql = "INSERT INTO `khach_hang`(`MaKH`, `Ho_ten`, `Tai_khoan`, `Mat_khau`, `Dia_chi`, `Dien_thoai`, `Email`, `Ngay_sinh`, `Ngay_cap_nhat`, `Gioi_tinh`, `Tich_diem`, `Trang_thai`)
    VALUES ('$makh','$hoten','$taikhoan','$matkhau','$diachi','$dienthoai','$email','$ngaysinh','$ngaycapnhat','$gioitinh','$tichdiem','$trangthai')";
    $isOk = insertOrUpdate($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once 'header.php' ?>
    <?php include_once 'menu.php' ?>
    <div class="box-container">
        <h1>Quản lý khách hàng </h1>
        <?php
        if (isset($isOk)) {
            if ($isOk) {
                echo "Thêm dữ liệu thành công!";
            } else {
                echo "Thêm dữ liệu thất bại!";
            }
        }
        ?>
        <!-- Form nhập thông tin khách hàng  -->
        <form action="" method="post">
            <table>
                <tr>
                    <td>Mã Khách hàng</td>
                    <td><input type="text" name="txtMakh" id="txtMakh"></td>
                </tr>
                <tr>
                    <td>Họ và tên</td>
                    <td><input type="text" name="txtName" id="txtName"></td>
                </tr>
                <tr>
                    <td>Tài Khoản </td>
                    <td><input type="text" name="txtTaikhoan" id="txtTaikhoan"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="txtMatkhau" id="txtMatkhau"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="txtDiachi" id="txtDiachi"></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><input type="number" name="txtDienthoai" id="txtDienthoai"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="txtEmail" id="txtEmail"></td>
                </tr>
                <tr>
                    <td>Ngày sinh</td>
                    <td><input type="date" name="txtNgaysinh" id="txtNgaysinh"></td>
                </tr>
                <tr>
                    <td>Ngày cập nhật</td>
                    <td><input type="date" name="txtNgaycapnhat" id="txtNgaycapnhat"></td>
                </tr>
                <tr>
                    <td>Giới tính</td>
                    <td><input type="checkbox" name="chkGioitinh" id="chkGioitinh" checked value="1"></td>
                </tr>
                <tr>
                    <td>Tích điểm</td>
                    <td><input type="number" name="txtTichdiem" id="txtTichdiem"></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><input type="checkbox" name="chkTrangthai" id="chkTrangthai" checked value="1"></td>
                </tr>
                <tr>
                    <td><input type="reset" value="Reset">
                        <input type="submit" value="Thêm mới">
                    </td>
                </tr>

            </table>
        </form>

        <table border="1" class="table-content">
            <thead>
                <tr>
                    <th>Mã khách hàng </th>
                    <th>Họ và tên </th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu </th>
                    <th>Địa chỉ </th>
                    <th>Diện thoại </th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Ngày cập nhật</th>
                    <th>Giới tính</th>
                    <th>Tích điểm</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <!-- Truy vấn csdl và lấy thông tin khách hàng  -->
                <?php
                $sql = "SELECT * FROM `khach_hang`";
                $arrkhachhang = selectData($sql);
                foreach ($arrkhachhang as $item) {
                    echo "<tr>
                <td>" . $item["MaKH"] . "</td>
                <td>" . $item["Ho_ten"] . "</td>
                <td>" . $item["Tai_khoan"] . "</td>
                <td>" . $item["Mat_khau"] . "</td>
                <td>" . $item["Dia_chi"] . "</td>
                <td>" . $item["Dien_thoai"] . "</td>
                <td>" . $item["Email"] . "</td>
                <td>" . $item["Ngay_sinh"] . "</td>
                <td>" . $item["Ngay_cap_nhat"] . "</td>
                <td>" . $item["GIoi_tinh"] . "</td>
                <td>" . $item["Tinh_diem"] . "</td>
                <td>" . ($item["Trang_thai"] ? "Còn sống" : "die") . "</td>
                <td><a href=\"\"><img src=\"../images/ic_edit.png\" alt=\"\"></a></td>
                <td><a href=\"\"><img src=\"../images/ic_delete.png\" alt=\"\"></a></td>
            </tr>
                ";
                }
                ?>
            </tbody>

        </table>
    </div>
</body>

</html>