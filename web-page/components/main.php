<div class="main-page">

    <?php
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "";
    }

    if (isset($_GET["id"])) {
        $page = "detail";
    }

    if ($page == "") {
        include("web-page/home/index.php");
    } elseif ($page == "product") {
        include("web-page/products/index.php");
    } elseif ($page == "news") {
        include("web-page/news/index.php");
    } elseif ($page == "detail") {
        include("web-page/detail/index.php");
    } elseif ($page == "cart") {
        include("web-page/cart/index.php");
    } elseif ($page == "checkout") {
        include("web-page/checkout/index.php");
    } elseif ($page == "history") {
        include("web-page/history/index.php");
    } elseif ($page == "oderdetail") {
        include("web-page/oderDetail/index.php");
    } elseif ($page == "search") {
        include("web-page/search/index.php");
    } elseif ($page == "abouts") {
        include("web-page/abouts/index.php");
    } elseif ($page == "infor") {
        include("web-page/infor/index.php");
    }
    ?>
</div>