<?php
$mysqli = require __DIR__ . "../../../../db/database.php";
$id_uplade = $_POST['id_banner_uplate'];
if (isset($_POST["uplatebanner"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $img = $_POST["img"];
    $up_at = date("Y/m/d");
    $sql_uplate = "UPDATE banners SET title = '$title' , content='$content',img_upload = '$img' , uplate_at = '$up_at' WHERE id = '$id_uplade'";
    $banneruplade = $mysqli->query($sql_uplate);
    header("location: ../../index.php?quanly=banners");
    exit;
}
