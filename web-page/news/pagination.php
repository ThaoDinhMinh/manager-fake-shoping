<?php
$mysqli = require __DIR__ . "../../../db/database.php";
$record_per_page = 8;
$page = '';
$output = '';
if (isset($_POST["pages"])) {
    $page = $_POST["pages"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$query = "SELECT * FROM products ORDER BY id DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($mysqli, $query);
$output .= '<div class="row flex-wrap">';
while ($row = mysqli_fetch_array($result)) {
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
$output .= '</div><div class="text-center mt-4">';
$page_query = "SELECT * FROM products ORDER BY id DESC";
$page_result = mysqli_query($mysqli, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
    $output .= "<span class='pagination_link btn btn-sm btn-info' style='cursor:pointer;margin:0 4px; color:#fff;' id='" . $i . "'>" . $i . "</span>";
}
$output .= '</div>';
echo $output;
