<?php
$sql_product = "SELECT * FROM products";

$getProduct = $mysqli->query($sql_product);

?>

<div class="container">
    <div class="header-product">
        <h3 class="mt-3 mb-3">Tất cả sản phẩm</h3>
    </div>
    <div class="row flex-wrap">
        <?php
        while ($product = mysqli_fetch_array($getProduct)) {
            $fomat = number_format($product[5]);
            echo "
            <div class='col-lg-3 col-md-4 col-12 mt-5'>
                <a href='index.php?id={$product[0]}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='{$product[2]}' alt='{$product[1]}'>
                        </div>
                        <div class='text-mean'>
                            <div class='title mt-2'>
                                <p class='text-title'>{$product[1]}</p>
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