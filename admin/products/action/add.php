<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

if (isset($_POST["addProduct"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $date_create = date("Y/m/d");
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






    // $sql_category = "INSERT INTO categorys (category ) VALUE ($category)";
    // $mysqli->query($sql_category);
    $qty = 1;

    $sql = "INSERT INTO products (name , url_img , description , category , price , date_create , date_uplate,qty ) VALUE (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("sql error : " . $mysqli->error);
    }


    $stmt->bind_param("sssssssi", $name, $target_file, $description,  $category, $price, $date_create, $date_uplate, $qty);
    if ($stmt->execute()) {
        header("location: ../../index.php?quanly=products");
        exit;
    }
}
