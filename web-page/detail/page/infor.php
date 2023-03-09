<?php

if (in_array($_GET["id"], $_SESSION["cart"])) {
    $_SESSION["mesage"] = "Đã thêm vào giỏ hàng";
} else  $_SESSION["mesage"] = "Thêm vào giỏ hàng";
if (isset($_SESSION["user_id"])) {
    if (isset($_POST["submit"])) {
        if (!in_array($_GET['id'], $_SESSION['cart'])) {
            array_push($_SESSION["cart"], $_GET["id"]);

            array_push($_SESSION["qty_arry"], $_POST["qty"]);


            $_SESSION["mesage"] = "Đã thêm vào giỏ hàng";
            header("location: index.php?id={$_GET['id']}");
        }
    }
} else {
    header("location: web-page/reglogin/login.php");
}

?>

<div class="row">
    <div class="col-lg-6 col-12">
        <img class="w-100 d-block" src=<?php echo $productSelect["url_img"] ?> alt=<?php echo $productSelect["name"] ?>>
    </div>
    <div class="col-lg-6 col-12">
        <h4><?= $productSelect["name"] ?></h4>
        <p class="text-price pt-3 pb-3"><?= number_format($productSelect["price"])  ?> vnd</p>
        <p class="pt-3 text-descrip"><?= $productSelect["description"]  ?></p>

        <div class="categ mt-2 mb-2">
            <h6>Loại : <a href="#"><?php echo $productSelect["category"] ?></a></h6>
        </div>

        <div class="querity d-flex align-center">
            <div class="form-qty">
                <form method="post">
                    <p class="mb-3">Số lượng</p>
                    <div class="d-flex">
                        <input name="qty" style="width:50px" class="form-control" type="text" value="<?php echo $productSelect["qty"] ?>">
                        <input name="submit" type="submit" class=" add-btn mx-2" value="<?php echo $_SESSION["mesage"] ?>">
                    </div>
                </form>
            </div>
        </div>
        <p></p>
    </div>
</div>