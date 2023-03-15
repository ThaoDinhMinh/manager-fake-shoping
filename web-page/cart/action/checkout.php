<?php
session_start();
$mysqli = require __DIR__ . "../../../../db/database.php";

$date_oder = date('Y/m/d');
$time_oder = date('H:i:s');


$stmt = $mysqli->stmt_init();

$sqloder = "INSERT INTO oders (day_oder,user_id,total_price,time_oder)
            VALUE (?,?,?,?)";
if (!$stmt->prepare($sqloder)) {
    die("sql error : " . $mysqli->error);
}
$stmt->bind_param("siss", $date_oder, $_SESSION["user_id"], $_SESSION["total_price"], $time_oder);
if ($stmt->execute()) {
    $last_id = $stmt->insert_id;
}

$stmt_last = $mysqli->stmt_init();

$i = 0;

while ($i < count($_SESSION["cart"])) {
    $sqldetail = "INSERT INTO oder_detail (oder_id,product_id,quaintly)
            VALUE (?,?,?)";
    if (!$stmt_last->prepare($sqldetail)) {
        die("sql error : " . $mysqli->error);
    }
    $stmt_last->bind_param("iii", $last_id, $_SESSION["cart"][$i], $_SESSION["qty_arry"][$i]);
    $stmt_last->execute();
    $i++;
}



unset($_SESSION['cart']);
unset($_SESSION['qty_arry']);
unset($_SESSION["total_price"]);

header("location: ../../../index.php?page=checkout");
