<?php
$sql_product = "SELECT * FROM products";
$getProduct = $mysqli->query($sql_product);

$sql_category = "SELECT DISTINCT category FROM products";
$getCategory = $mysqli->query($sql_category);

?>

<div class="container">
    <div class="header-product">
        <h3 class="mt-3 mb-3">Tất cả sản phẩm</h3>
    </div>
    <div class="category">
        <h6 class="mt-3 mb-2">Phân loại</h6>
        <div class="d-flex flex-wrap " style="margin-left: -0.25rem;">
            <?php
            while ($category = mysqli_fetch_array($getCategory)) {
                echo "
                <div class='p-1'>
                     <p class='btn btn-sm btn-primary'>{$category['category']}</p>
                </div>
                ";
            }

            ?>
        </div>
    </div>

    <div class="row flex-wrap">
        <?php
        while ($product = mysqli_fetch_array($getProduct)) {
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
        }
        ?>
    </div>
</div>
<div id="render_data"></div>

<script>
    $(document).ready(function() {
        load_data();

        function load_data(category) {
            $.ajax({
                url: "web-page/products/category.php",
                method: "POST",
                data: {
                    pages: category
                },
                success: function(data) {
                    $('#render_data').html(data);
                }
            })
        }
        $(document).on('click', '.category_link', function() {
            var category = $(this).attr("slug");
            load_data(category);
        });

    });
</script>