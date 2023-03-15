<?php
$mysqli = require __DIR__ . "../../../../db/database.php";
if (isset($_GET["iduser"])) {
    $sqldelete = "DELETE FROM users WHERE id = {$_GET['iduser']}";
    $mysqli->query($sqldelete);
    header("location: ../../index.php?quanly=users");
}
