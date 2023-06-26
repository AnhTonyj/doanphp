<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Gọi file header.php vào trong trang -->
    <?php include_once 'header.php' ?>

    <!-- Gọi file menu.php vào trong trang -->
    <?php include_once 'menu.php' ?>

    <!-- Container -->
    <div class="box-container">
        <!-- Dashboard -->
        <h1>Quản lý sản phẩm</h1>
        <table border="1">
            <tr>
                <td>Mã sản phẩm </td>
                <td>Mã loại sản phẩm </td>
                <td>Mã nhãn hiệu</td>
                <td>Tên sản phẩm</td>
                <td>Giá nhập</td>
                <td>Giá cũ</td>
                <td>Giá mới</td>
                <td>Hình ảnh</td>
                <td>Ngày nhập</td>
                <td>Trạng thái</td>
                <td>Cập nhật</td>
                <td>Xóa</td>
            </tr>
            <!-- Truy vấn csdl lấy toàn bộ sản phẩm -->
            <?php
            $sql = "SELECT * FROM `san_pham` s INNER JOIN `hinh_anh` h ON s.MaSP = h.MaSP";
            $arrProduct = selectData($sql);
            foreach ($arrProduct as $item) {
                echo "<tr>
                    <td>" . $item["MaSP"] . "</td>
                    <td>" . $item["MaLSP"] . "</td>
                    <td>" . $item["MaNH"] . "</td>
                    <td>" . $item["Ten_sp"] . "</td>
                    <td>" . $item["Gia_nhap"] . "</td>
                    <td>" . $item["Gia_cu"] . "</td>
                    <td>" . $item["Gia_moi"] . "</td>
                    <td><img width=\"100px\" src=\"../images/" . $item["Ten_file_anh"] . "\" alt=\"" . $item["Ten_sp"] . "\"></td>
                    <td>" . $item["inputdate"] . "</td>
                    <td>" . ($item["status"] ? "Còn hàng" : "Hết") . "</td>
                    <td><a href=\"\"><img src=\"../images/ic_edit.png\" alt=\"\"></a></td>
                    <td><a href=\"\"><img src=\"../images/ic_delete.png\" alt=\"\"></a></td>
                </tr>";
            }
            ?>

        </table>
    </div>
</body>

</html>