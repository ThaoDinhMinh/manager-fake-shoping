<?php
$mysqli = require __DIR__ . "../../../../db/database.php";


$title = $_POST["title"];
$content = $_POST["content"];
$img = $_POST["img"];
$up_at = date("Y/m/d");
$time_at = date("Y/m/d");
if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["img"])) {
    $sql = "INSERT INTO banners (title , content , img_upload , create_at , uplate_at ) VALUE (?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("sql error : " . $mysqli->error);
    }

    if (isset($_POST["addbanner"])) {
        $stmt->bind_param("sssss", $title, $content, $img,  $time_at, $up_at);
        if ($stmt->execute()) {
            header("location: ../../index.php?quanly=banners");
        }
    }
}
