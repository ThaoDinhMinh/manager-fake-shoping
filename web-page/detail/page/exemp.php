<div class="">
    <div class="product-top">
        <div class="content-product-top">
            <h4 class="text-center">Sản phẩm liên quan</h4>
            <p class="text-center mt-3">Không thể bỏ lỡ</p>
        </div>
        <div class="row">
            <?php
            $sqlProductTop = "SELECT * FROM products LIMIT 1,4";
            $getProductTop = $mysqli->query($sqlProductTop);
            while ($productTop = mysqli_fetch_array($getProductTop)) {
                $fomat = number_format($productTop['price']);
                echo "<div class='col-lg-3 col-md-6 col-12 mt-5'>
                <a href='index.php?id={$productTop['id']}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='/admin/products/action/{$productTop['url_img']}' alt='{$productTop['name']}'>
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