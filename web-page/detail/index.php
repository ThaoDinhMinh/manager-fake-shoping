<?php

if (isset($_GET["id"])) {
    $idting = $_GET["id"];

    $sqlSelectProduct = "SELECT * FROM products WHERE id = '$idting'";

    $productSelect = $mysqli->query($sqlSelectProduct)->fetch_assoc();
}


?>

<div class="container">

    <div class="header-detail d-flex align-items-center pt-5 pb-5">
        <a href="index.php?page=product">Sản phẩm</a>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right mx-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
        <p class="mx-1"><?php echo $productSelect["name"]; ?></p>
    </div>

    <div class="infor-product pb-5">
        <?php include("web-page/detail/page/infor.php"); ?>
    </div>
    <div class="infor-exemp pb-5">
        <?php include("web-page/detail/page/exemp.php"); ?>
    </div>
</div>