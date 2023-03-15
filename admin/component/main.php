<div class="main">
    <?php
    if (isset($_GET["quanly"])) {
        $page = $_GET["quanly"];
    } else {
        $page = "";
    }
    if ($page == "banners") {
        include("banners/index.php");
    } elseif ($page == "products") {
        include("products/index.php");
    } elseif ($page == "order") {
        include("oder-user/index.php");
    } elseif ($page == "users") {
        include("users/index.php");
    } elseif ($page == "detail") {
        include("detail-oder/index.php");
    } else {
        include("notfount/index.php");
    }
    ?>
</div>