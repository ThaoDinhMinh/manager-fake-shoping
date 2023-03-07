<?php

?>



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
    }
    ?>
</div>