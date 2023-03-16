<?php
if (isset($_GET["key"])) {
    $key = $_GET["key"];
    $sqlSearch = "SELECT * FROM products
    WHERE
        id LIKE '%$key%' OR
        name LIKE '%$key%' OR
        description LIKE '%$key%' OR
        category LIKE '%$key%' OR
        price LIKE '%$key%'
    ";
} else {
    $sqlSearch = "SELECT * FROM products";
}

$resuilt = $mysqli->query($sqlSearch);

?>

<div class="container">
    <div class="header-product">
        <h5 class="mt-3 mb-3"><?php if (!$_GET["key"]) echo "Tất cả sản phẩm";
                                else echo "Bạn đang tìm kiếm với từ khóa: " . $_GET["key"]; ?></h5>
    </div>

    <div class="row flex-wrap">
        <?php
        $coout = 0;
        while ($product = mysqli_fetch_array($resuilt)) {
            $fomat = number_format($product['price']);
            echo "
            <div class='col-lg-3 col-md-4 col-12 mt-5'>
                <a href='index.php?id={$product['id']}'>
                    <div class='product'>
                        <div class='item-img'>
                            <img class='w-100 d-block' src='/admin/products/action/{$product['url_img']}' alt='{$product['name']}'>
                        </div>
                        <div class='text-mean'>
                            <div class='title mt-2'>
                                <p class='text-title'>{$product['name']}</p>
                                <p class='text-price mt-2'>{$fomat} vnd</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        ";
            $coout++;
        }
        if ($coout == 0) {
            echo "<h6 class='text-center mt-3'>
                Không có sản phẩm nào được tìm thấy
            </h6>";
        } else echo "";
        ?>
    </div>
</div>