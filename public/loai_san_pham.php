<h3 style="text-transform: uppercase; padding: 5px">Danh mục SP</h3>
<ul class="no-list-style loai_san_pham">
    <?php
    $sql = "SELECT * FROM `loai_san_pham`";
    $result = mysqli_query($bkconn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href='index.php?idcat=" . $row["MaLSP"] . "'><li>" . $row["Ten_loai"] . "</li></a>";
        }
    } else {
        echo "-----";
    }
    ?>
</ul>