<?php
$sql_product = "SELECT * FROM products";
$getProduct = $mysqli->query($sql_product);

$sql_category = "SELECT DISTINCT category FROM products";
$getCategory = $mysqli->query($sql_category);

?>

<div class="container">
    <div class="all-product">
        <!-- <div id="overlay">
            <div><img src="/admin/products/action/uploads/loading.gif" width="100px" height="100px" /></div>
        </div> -->
        <div class="header-product">
            <h3 class="mt-3 mb-3">Tất cả sản phẩm</h3>
        </div>
        <div class="category">
            <h6 class="mt-3 mb-2">Phân loại</h6>
            <div class="d-flex flex-wrap " style="margin-left: -0.25rem;">
                <div id="render_data"></div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        load_data();

        function load_data(category) {
            $.ajax({
                url: "web-page/products/page/category.php",
                method: "POST",
                data: {
                    pages: category
                },
                beforeSend: function() {
                    $("#overlay").show();
                },
                success: function(data) {
                    $('#render_data').html(data);
                    setInterval(function() {
                        $("#overlay").hide();
                    }, 500);
                }
            })
        }
        $(document).on('click', '.category_link', function() {
            var category = $(this).attr("id");
            console.log(category);
            load_data(category);
        });

    });
</script>