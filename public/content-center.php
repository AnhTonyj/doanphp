<div class="box-search">
    <h1>LỌC SẢN PHẨM</h1>
    <form action="#" method="GET" style="float: left;">
        Mô tả sản phẩm:
        <input id="search_infor" name="search_infor" type="text" placeholder="Tìm kiếm" value="<?php echo isset($_GET["search_infor"]) ? $_GET["search_infor"] : "" ?>">
        Giá tối thiểu:
        <input id="search_price_min" name="search_price_min" type="text" value="<?php echo isset($_GET["search_price_min"]) ? $_GET["search_price_min"] : 5000 ?>">
        Giá tối đa:
        <input id="search_price_max" name="search_price_max" type="text" value="<?php echo isset($_GET["search_price_max"]) ? $_GET["search_price_max"] : 15000 ?>">
        <input type="submit" name="submit" value="Tìm kiếm">
    </form>
</div>
<?php
$condition = "";
if (isset($_GET["MaLSP"])) {
    $condition = " WHERE MaLSP = " . $_GET["MaLSP"];
}

// Tìm kiếm cơ bản
if (isset($_GET["search"])) {
    $condition = " WHERE Ten_sp LIKE '%" . $_GET["search"] . "%' 
			OR Mo_ta LIKE '%" . $_GET["search"] . "%' 
			OR Thong_tin LIKE '%" . $_GET["search"] . "%'";
}

// Tìm kiếm nâng cao
if (isset($_GET["search_infor"]) || isset($_GET["search_price_min"]) || isset($_GET["search_price_max"])) {
    $condition = " WHERE 1=1 ";
    if (isset($_GET["search_infor"])) {
        $condition .= " AND Ten_sp LIKE '%" . $_GET["search_infor"] . "%' 
			OR Mo_ta LIKE '%" . $_GET["search_infor"] . "%' 
			OR Thong_tin LIKE '%" . $_GET["search_infor"] . "%'";
    }
    if (isset($_GET["search_price_min"])) {
        $condition .= " AND Gia_moi >= " . $_GET["search_price_min"];
    }
    if (isset($_GET["search_price_max"])) {
        $condition .= " AND Gia_moi <= " . $_GET["search_price_max"];
    }
}

// 1. Lệnh truy vấn 
$sql = "SELECT * FROM `san_pham` s INNER JOIN `hinh_anh` h ON s.MaSP=h.MaSP" . $condition;

// 2. Truy vấn
$result = mysqli_query($bkconn, $sql);

// 3. Duyệt
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Sản phẩm
        echo "<div class='product-title'>";
        echo "<a href='product_detail.php?prodId=" . $row["MaSP"] . "'><img width='290px' height='290px' src='public/images/" . $row["Ten_file_anh"] . "' alt='hp123'></a> <br>";
        echo "<h3>" . $row["Ten_sp"] . "</h3>";
        echo "<div class='box-desc'>" . $row["Mo_ta"] . "</div>";
        echo "<div class='box-price'>" . formatCurrency($row["Gia_moi"]) . "</div>";
        echo "</div>";
    }
}


?>