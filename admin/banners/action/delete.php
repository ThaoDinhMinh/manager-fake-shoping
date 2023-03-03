<?php

$mysqli = require __DIR__ . "../../../../db/database.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id_banner"];
    $sql = "DELETE FROM banners WHERE id = '$id'";
    $resut = $mysqli->query($sql);
    header("location: ../../index.php?quanly=banners");
    exit;
}
