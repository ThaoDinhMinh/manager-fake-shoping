<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

if (isset($_POST["edit"])) {
    $id_uplade_product = $_POST['id_product_ul'];


    $name = $_POST["name"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $date_uplate = date("Y/m/d");

    $target_dir    = "uploads/";
    $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
    $allowUpload   = true;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (file_exists($target_file)) {
        echo "Tên file đã tồn tại trên server, không được ghi đè";
        $allowUpload = false;
    }
    if ($allowUpload) {
        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);
    }



    $sql_uplate_product = "UPDATE products SET  url_img='$target_file',name = '$name' ,description = '$description' , category = '$category',price='$price',date_uplate='$date_uplate' WHERE id = '$id_uplade_product'";


    $product_edit = $mysqli->query($sql_uplate_product);


    header("location: ../../index.php?quanly=products");
    exit;
}
