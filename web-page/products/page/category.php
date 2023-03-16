
<?php
$mysqli = require __DIR__ . "../../../../db/database.php";

$sql_cate = "SELECT DISTINCT category FROM products";
$getCate = $mysqli->query($sql_cate);

$page = '';
$output = '';
