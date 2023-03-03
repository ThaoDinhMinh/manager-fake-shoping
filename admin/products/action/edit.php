<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

if (isset($_POST["edit"])) {
    $id_uplade_product = $_POST['id_product_ul'];


    $name = $_POST["name"];
    $url_img = $_POST["url_img"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $date_uplate = date("Y/m/d");


    $sql_uplate_product = "UPDATE products SET  url_img='$url_img',name = '$name' ,description = '$description' , category = '$category',price='$price',date_uplate='$date_uplate' WHERE id = '$id_uplade_product'";


    $product_edit = $mysqli->query($sql_uplate_product);


    header("location: ../../index.php?quanly=products");
    exit;
}
