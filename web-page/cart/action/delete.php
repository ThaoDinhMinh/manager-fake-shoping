<?php
session_start();

$key = array_search($_GET["id"], $_SESSION["cart"]);

unset($_SESSION["cart"][$key]);
unset($_SESSION["qty_arry"][$_GET['index']]);

$_SESSION['qty_arry'] = array_values($_SESSION['qty_arry']);
header('location: ../../../index.php?page=cart');
