<?php
session_start();
$mysqli = require __DIR__ . "/db/database.php";
if (isset($_SESSION["user_id"])) {
    $sql_user = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";
    $user = $mysqli->query($sql_user)->fetch_assoc();
}
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
if (!isset($_SESSION["qty_arry"])) {
    $_SESSION["qty_arry"] = array();
}

unset($_SESSION["qty_array"]);

?>


<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="./web-page/css/index.css">

</head>

<body>

    <header class="header">
        <?php include("./web-page/components/header.php"); ?>
    </header>
    <div class="main">
        <?php include("./web-page/components/main.php"); ?>
    </div>
    <footer class="footer">
        <?php include("./web-page/components/footer.php"); ?>
    </footer>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>