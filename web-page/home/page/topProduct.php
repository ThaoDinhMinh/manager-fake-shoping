<?php
$sqlProductTop = "SELECT * FROM products LIMIT 2,4";
$getProductTop = $mysqli->query($sqlProductTop);
?>

<div class="container">
    <div class="content-product-top">
        <h4 class="text-center">Giành riêng cho phái nữ </h4>
        <p class="text-center mt-3">Không thể bỏ lỡ</p>
    </div>
    <div class="product-top">
        <div class="row">
            <?php
            while ($productTop = mysqli_fetch_array($getProductTop)) {
                $fomat = number_format($productTop['price']);
                echo "<div class='col-lg-3 col-md-6 col-12 mt-5'>
                <a href='index.php?id={$productTop['id']}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='{$productTop['url_img']}' alt='{$productTop['name']}'>
                        </div>
                        <div class='text-mean'>
                            <div class='title mt-2'>
                                <p class='text-title'>{$productTop['name']}</p>
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