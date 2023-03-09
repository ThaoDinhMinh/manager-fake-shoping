<?php
session_start();
unset($_SESSION['cart']);
unset($_SESSION['qty_arry']);
header('location: ../../../index.php?page=cart');
