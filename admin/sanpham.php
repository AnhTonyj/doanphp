<?php
require_once 'bkconnect.php';
// Chức năng thêm mới
if (isset($_POST["txtName"])) {
    $masp = $_POST["txtMasp"];
    $malsp = $_POST["slLoaiSP"];
    $manh = $_POST["slNH"];
    $name = $_POST["txtName"];
    $mota = $_POST["txtMota"];
    $thongtin = $_POST["txtThongtin"];
    $gianhap = $_POST["txtGianhap"];
    $giacu = $_POST["txtGiacu"];
    $giamoi = $_POST["txtGiamoi"];
    $luotxem = $_POST["nbluotxem"];
    $ngaycapnhat = $_POST["txtDate"];
    $status = $_POST["chkStatus"];
    $sql = "INSERT INTO `san_pham`(`MaSP`, `Ten_sp`, `Mo_ta`, `Thong_tin`, `Gia_nhap`, `Gia_cu`, `Gia_moi`, `Luot_xem`, `Ngay_cap_nhat`, `Trang_thai`, `MaLSP`, `MaNH`) 
    VALUES ('$masp','$name','$mota','$thongtin','$gianhap','$giacu','$giamoi','$luotxem','$ngaycapnhat','$status','$malsp','$manh')";
    $isOk = insertOrUpdate($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
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
        <?php
        if (isset($isOk)) {
            if ($isOK) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Thêm dữ liệu thất bại ";
            }
        }
        ?>
        <!-- FORM nhập thông tin sản phẩm  -->
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã loại sản phẩm </td>
                    <td>
                        <select name="slLoaiSP" id="slLoaiSP">
                            <?php
                            $sql = "SELECT * FROM `loai_san_pham`";
                            $arrCatalog = selectData($sql);
                            foreach ($arrLoaiSP as $item) {
                                echo "<option value=\"" . $item["MaLSP"] . "\">" . $item["Ten_loai"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td><input type="text" name="txtMasp" id="txtMasp"></td>
                </tr>
                <tr>
                    <td>Tên nhãn hiệu </td>
                    <td><select name="slNH" id="slNH">
                            <?php
                            $sql = "SELECT * FROM `nhan_hieu`";
                            $arrCatalog = selectData($sql);
                            foreach ($arrLoaiSP as $item) {
                                echo "<option value=\"" . $item["MaNH"] . "\">" . $item["Ten_nhan_hieu"] . "</option>";
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm </td>
                    <td>
                        <input type="text" name="txtName" id="txtName">
                    </td>
                </tr>
                <tr>
                    <td>Mô tả </td>
                    <td><input type="text" name="txtMota" id="txtMota"></td>
                </tr>
                <tr>
                    <td>Thông tin</td>
                    <td><textarea name="txtThongtin" id="txtThongtin" cols="30" rows="30"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#txtThongtin'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td>Giá nhập</td>
                    <td>
                        <input type="number" min="0" step="100" name="txtGianhap" id="txtGianhap">
                    </td>
                </tr>
                <tr>
                    <td>Giá cũ </td>
                    <td>
                        <input type="number" min="0" step="100" name="txtGiacu" id="txtGiacu">
                    </td>
                </tr>
                <tr>
                    <td>Giá mới </td>
                    <td>
                        <input type="number" min="0" step="100" name="txtGiamoi" id="txtGiamoi">
                    </td>
                </tr>
                <tr>
                    <td>Lượt xem</td>
                    <td><input type="number" name="nbluotxem" id="nbluotxem"></td>
                </tr>
                <tr>
                    <td>Ngày cập nhật </td>
                    <td><input type="datetime" name="txtDate" id="txtDate"></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td>
                        <input type="checkbox" name="chkStatus" id="chkStatus" checked value="1">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="reset" value="Reset">
                        <input type="submit" value="Thêm mới">
                    </td>
                </tr>
            </table>

        </form>

        <table border="1" class="table-content">
            <thead>
                <tr>
                    <th>Mã sản phẩm </th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Thông tin</th>
                    <th>Giá nhập</th>
                    <th>Giá cũ</th>
                    <th>Giá mới</th>
                    <th>Lượt xem</th>
                    <th>Ngày cập nhật</th>
                    <th>Trạng thái</th>
                    <th>Mã loại sản phẩm </th>
                    <th>Mã nhãn hiệu</th>
                    <th>Cập nhật</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <!-- Truy vấn csdl lấy toàn bộ sản phẩm -->
                <?php
                $sql = "SELECT * FROM `san_pham`";
                $arrProduct = selectData($sql);
                foreach ($arrProduct as $item) {
                    echo "<tr>
                    <td>" . $item["MaSP"] . "</td>
                    <td>" . $item["Ten_sp"] . "</td>
                    <td>" . $item["Mo_ta"] . "</td>
                    <td>" . $item["Thong_tin"] . "</td>                   
                    <td>" . $item["Gia_nhap"] . "</td>
                    <td>" . $item["Gia_cu"] . "</td>
                    <td>" . $item["Gia_moi"] . "</td>
                    <td>" . $item["Luot_xem"] . "</td>
                    <td>" . $item["Ngay_cap_nhat"] . "</td>
                    <td>" . ($item["Trang_thai"] ? "Còn hàng" : "Hết") . "</td>
                    <td>" . $item["MaLSP"] . "</td>
                    <td>" . $item["MaNH"] . "</td>                  
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