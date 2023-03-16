<?php
$sqlProductLeft = "SELECT * FROM products LIMIT 2";
$sqlProductRight = "SELECT * FROM products LIMIT 3,2";

$getProductLeft = $mysqli->query($sqlProductLeft);
$sqlProductRight = $mysqli->query($sqlProductRight);

?>

<div class="container py-5">
    <h4 class="mt-lg-5 mb-lg-5 mt-3 mb-3 text-center">Sản phẩm làm đẹp cho phái nữ</h4>
    <div class="row flex-wrap">

        <div class="col-lg-3 col-md-6 col-12 d-lg-block d-flex flex-md-nowrap flex-wrap justyfi-content-between">
            <?php
            while ($productLeft = mysqli_fetch_array($getProductLeft)) {
                $fomat = number_format($productLeft['price']);
                echo "<div class='mt-3 mx-md-2 mx-0 col-12'>
                <a href='index.php?id={$productLeft['id']}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='/admin/products/action/{$productLeft['url_img']}' alt='{$productLeft['name']}'>
                        </div>
                        <div class='text-mean'>
                            <div class='title mt-2'>
                                <p class='text-title'>{$productLeft['name']}</p>
                                <p class='text-price mt-2'>{$fomat} vnd</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        ";
            }

            ?>

        </div>
        <div class="col-lg-6 col-12">
            <div class="img-content mt-3">
                <img class="w-100 img-colect" src="https://cdn.shopify.com/s/files/1/0427/8226/1414/files/banner-product-v5.jpg?v=1613787503" alt="anh dep">
                <div class="text-asb">
                    <a class="text-posi" style='color:#FFFFFF' href='index.php?page=product'>Xem thêm</a>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6 col-12 d-lg-block d-flex flex-md-nowrap flex-wrap">

            <?php
            while ($productRight = mysqli_fetch_array($sqlProductRight)) {
                $fomat = number_format($productRight['price']);
                echo "<div class='col-12 mt-3 mx-md-2 mx-0'>
                <a href='index.php?id={$productRight['id']}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='/admin/products/action/{$productRight['url_img']}' alt='{$productRight['name']}'>
                        </div>
                        <div class='text-mean'>
                            <div class='title mt-2'>
                                <p class='text-title'>{$productRight['name']}</p>
                                <p class='text-price mt-2'>{$fomat} vnd</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        ";
            }

            ?>
        </div>
    </div>

</div>