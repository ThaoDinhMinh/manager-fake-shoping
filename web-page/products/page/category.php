
<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

$sql_cate = "SELECT DISTINCT category FROM products";
$getCate = $mysqli->query($sql_cate);

$page = '';
$output = "";

if (isset($_POST["pages"])) {
    $page = $_POST["pages"];
} else {
    $page = "";
}

$output .= "<span class='category_link btn btn-sm btn-info' style='cursor:pointer;margin:0 4px; color:#fff;' id='' >  Tất cả  </span>";



while ($getCateName = mysqli_fetch_array($getCate)) {
    $output .= "<span class='category_link btn btn-sm btn-info' style='cursor:pointer;margin:0 4px; color:#fff;' id='" . $getCateName["category"] . "'>" . $getCateName["category"] . "</span>";
}

if ($page == "") {
    $query = "SELECT * FROM products";
} else {
    $query = "SELECT * FROM products WHERE category = '{$page}'";
}

$results = $mysqli->query($query);

$output .= '<div class="row flex-wrap">';
while ($row = mysqli_fetch_array($results)) {
    $fomat = number_format($row['price']);
    $output .= "<div class='col-lg-3 col-md-4 col-12 mt-5'>
    <a href='index.php?id={$row['id']}'>
        <div class='product'>
            <div class='item-img'>
                <img class='w-100 d-block' src='/admin/products/action/{$row['url_img']}' alt='{$row['name']}'>
            </div>
            <div class='text-mean'>
                <div class='title mt-2'>
                    <p class='text-title'>{$row['name']}</p>
                    <p class='text-price mt-2'>{$fomat} vnd</p>
                </div>
            </div>
        </div>
    </a>
</div>
";
}
$output .= '</div>';


echo $output;
