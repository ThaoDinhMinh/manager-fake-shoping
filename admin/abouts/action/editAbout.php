<?php
$mysqli = require __DIR__ . "../../../../db/database.php";
$id_uplade = $_POST['id_banner_uplate'];
if (isset($_POST["uplatebanner"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $up_at = date("Y/m/d");
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

    $sql_uplate = "UPDATE banners SET title = '$title' , content='$content',img_upload = '$target_file' , uplate_at = '$up_at' WHERE id = '$id_uplade'";
    $banneruplade = $mysqli->query($sql_uplate);
    header("location: ../../index.php?quanly=banners");
    exit;
}
