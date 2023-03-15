<?php
$mysqli = require __DIR__ . "../../../../db/database.php";


$name = $_POST["name"];
$url_img = $_POST["url_img"];
$description = $_POST["description"];
$category = $_POST["category"];
$price = $_POST["price"];
$date_create = date("Y/m/d");
$date_uplate = date("Y/m/d");

$sql_category = "INSERT INTO categorys (category ) VALUE ($category)";
$mysqli->query($sql_category);

$sql = "INSERT INTO products (name , url_img , description , category , price , date_create , date_uplate ) VALUE (?,?,?,?,?,?,?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("sql error : " . $mysqli->error);
}

if (isset($_POST["addProduct"])) {
    $stmt->bind_param("sssssss", $name, $url_img, $description,  $category, $price, $date_create, $date_uplate);
    if ($stmt->execute()) {
        header("location: ../../index.php?quanly=products");
        exit;
    }
}
