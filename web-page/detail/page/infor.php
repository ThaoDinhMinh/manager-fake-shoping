<?php
$added = false;
if (isset($_SESSION["user_id"])) {
    if (isset($_POST["submit"])) {
        $added = true;
        $date_oder = date("Y/m/d");
        $sql_cart = "INSERT INTO cards (user_id , oder_id ,date_oder,qty) VALUE (?,?,?,?)";

        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql_cart)) {
            die("sql error : " . $mysqli->error);
        }
        $stmt->bind_param("iisi", $_SESSION["user_id"], $_GET["id"], $date_oder, $_POST["qty"]);
        $stmt->execute();
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
                        <input <?php if ($added) {
                                    echo "disabled";
                                } else echo ""; ?> name="submit" type="submit" class=" add-btn mx-2" value="<?php if ($added) {
                                                                                                                                                echo "Đã thêm vào giỏ hàng";
                                                                                                                                            } else {
                                                                                                                                                echo "Thêm vào giỏ hàng";
                                                                                                                                            } ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>