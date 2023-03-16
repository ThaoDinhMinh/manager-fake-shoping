<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

$title = $_POST["title"];
$content = $_POST["content"];
$up_at = date("Y/m/d");
$time_at = date("Y/m/d");



if (isset($_POST["addbanner"])) {
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





    if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_FILES["fileupload"]["name"])) {
        $sql = "INSERT INTO banners (title , content , img_upload , create_at , uplate_at ) VALUE (?,?,?,?,?)";

        $stmt = $mysqli->stmt_init();

        if (!$stmt->prepare($sql)) {
            die("sql error : " . $mysqli->error);
        }

        if (isset($_POST["addbanner"])) {
            $stmt->bind_param("sssss", $title, $content, $target_file,  $time_at, $up_at);
            if ($stmt->execute()) {
                header("location: ../../index.php?quanly=banners");
            }
        }
    }
}
