<?php
require_once 'bkconnect.php';
if (isset($_POST["txtMaha"])) {
    $maha  = $_POST["txtMaha"];
    $tenanh  = $_POST["fileUpload"];
    $trangthai  = $_POST["chkTrangthai"];
    $masp  = $_POST["txtMasp"];
    // Xử lý upload ảnh
    $target_dir = "../images/"; // Thư mục up file
    // Lấy phần mở rộng của tập tin
    $imageFileType = strtolower(pathinfo(basename($_FILES["fileUpload"]["MaHA"]), PATHINFO_EXTENSION));
    $fileImage = str_replace(" ", "_", strtolower($name)) . "." . $imageFileType;
    // echo "Tên file ảnh upload: " . $fileImage;
    $target_file = $target_dir . $fileImage; // Đường dẫn file upload
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        //echo "Upload file ảnh thành công";
    } else {
        echo "Upload thất bại";
    }
    // Xử lý dữ liệu thêm mới 
    $sql = "INSERT INTO `hinh_anh`(`MaHA`, `Ten_file_anh`, `Trang_thai`, `MaSP`) 
    VALUES ('$maha','$tenanh','$trangthai','$masp')";
    $isOk = insertOrUpdate($sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hình ảnh </title>
</head>

<body>
    <?php include_once 'index.php'  ?>
    <?php include_once 'menu.php'  ?>
    <div class="box-container">
        <h1>Quản lý hình ảnh </h1>
        <?php
        if (isset($isOk)) {
            if ($isOk) {
                echo "Thêm dữ liệu thành công";
            } else {
                echo "Không thể thêm sản phẩm mới";
            }
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Mã hình ảnh </td>
                    <td><input type="text" name="txtMaha" id="txtMaha"></td>
                </tr>
                <tr>
                    <td>Tên file ảnh </td>
                    <td><input type="file" name="fileUpload" id="fileUpload"></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><input type="checkbox" name="chkTrangthai" id="chkTrangthai"></td>
                </tr>
                <tr>
                    <td>Mã sản phẩm </td>
                    <td><input type="text" name="txtMasp" id="txtMasp"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="reset" value="Reset">
                        <input type="submit" value="">
                    </td>
                </tr>
            </table>
        </form>
        <table border="1" class="table-content">
            <thead>
                <tr>
                    <th>Mã hình ảnh</th>
                    <th>Tên file ảnh </th>
                    <th>Trạng thái </th>
                    <th>Mã sản phẩm</th>
                    <th>Cập nhật </th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `hinh_anh` h INNER JOIN `san_pham` s ON h.MaSP=s.MaSP";
                $arrHinhanh = selectData($sql);
                foreach ($arrHinhanh as $item) {
                    echo "<tr>
                <td>" . $item["MaHA"] . "</td>
                <td>" . $item["Ten_file_anh"] . "</td>
                <td>" . $item["Trang_thai"] . "</td>
                <td>" . $item["MaSP"] . "</td>
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