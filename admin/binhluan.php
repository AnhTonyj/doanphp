<?php require_once 'bkconnect.php';
if (isset($_POST["txtMabl"])) {
    $mabl = $_POST["txtMabl"];
    $makh = $_POST["txtMakh"];
    $masp = $_POST["txtMasp"];
    $tieude = $_POST["txtTieude"];
    $noidung = $_POST["txtNoidung"];
    $ngaybl = $_POST["txtNgaybl"];
    $trangthai = $_POST["chkTrangthai"];

    $sql = "INSERT INTO `binh_luan`(`MaBL`, `MaKH`, `MaSP`, `Tieu_de`, `Noi_dung`, `Ngay_BL`, `Trang_thai`) 
    VALUES ('$mabl','$makh',' $masp','$tieude','$noidung','$ngaybl','$trangthai')";
    $isOk = insertOrUpdate($sql);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
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
    <?php include_once 'header.php' ?>
    <?php include_once 'menu.php' ?>
    <div class="box-container">
        <h1>Quản lý bình luận </h1>
        <?php
        if (isset($isOk)) {
            if ($isOk) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Thêm dữ liệu thất bại ";
            }
        }
        ?>
        <!-- // Form nhập thông tin bình luận  -->
        <form action="" method="post">
            <table>
                <tr>
                    <td>Mã bình luận</td>
                    <td><input type="text" name="txtMabl" id="txtMabl"></td>
                </tr>
                <tr>
                    <td>Mã khách hàng</td>
                    <td><input type="text" name="txtMakh" id="txtMakh"></td>
                </tr>
                <tr>
                    <td>Mã sản phẩm </td>
                    <td><input type="text" name="txtMasp" id="txtMasp"></td>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><input type="text" name="txtTieude" id="txtTieude"></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea name="txtNoidung" id="txtNoidung" cols="30" rows="30"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#txtNoidung'))
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td>Ngày bình luận</td>
                    <td><input type="date" name="txtNgaybl" id="txtNgaybl"></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><input type="checkbox" name="chkTrangthai" id="chkTrangthai"></td>
                </tr>
                <tr>
                    <td>
                        <input type="reset" value="Reset">
                        <input type="submit" value="Thêm mới">

                    </td>

                </tr>
            </table>
        </form>
        <table class="table-content">
            <thead>
                <tr>
                    <th>Mã bình luận</th>
                    <th>Mã khách hàng </th>
                    <th>Mã sản phẩm</th>
                    <th>Tiêu đề </th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <!-- Truy vấn csdl và lấy thông tin của bình luận  -->
                <?php
                $sql = "SELECT * FROM `binh_luan`";
                $arrbinhluan = selectData($sql);
                foreach ($arrbinhluan as $item) {
                    echo "<tr>
                <td>" . $item["MaBL"] . "</td>
                <td>" . $item["MaKH"] . "</td>
                <td>" . $item["MaSP"] . "</td>
                <td>" . $item["Tieu_de"] . "</td>
                <td>" . $item["Noi_dung"] . "</td>
                <td>" . $item["Ngay_BL"] . "</td>
                <td>" . $item["Trang_thai"] . "</td>
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