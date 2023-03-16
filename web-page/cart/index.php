<?php
$save = false;
if (count($_SESSION["cart"]) > 0) {
    $sqlOder = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
    $oderProductsShow = $mysqli->query($sqlOder);
}

if (isset($_POST["save"])) {
    foreach ($_POST['indexos'] as $key) {
        $_SESSION["qty_arry"][$key] = $_POST["qty_" . $key];
    }
    $save = true;
} else {
    $save = false;
}
if (!isset($_SESSION["total_price"])) {
    $_SESSION["total_price"] = 0;
}

?>

<div class="container">
    <p class="text-end mt-3">
        <?php if (isset($_SESSION["user_id"])) : ?>
            <a class="btn btn-sm btn-primary" href="index.php?page=history">
                Xem lịch sử đặt hàng

            </a>
        <?php else : ?>
    <p></p>
<?php endif; ?>
</p>
<?php if (count($_SESSION["cart"]) == 0) : ?>
    <h4 class='mt-5 text-center mb-5'>Không có sản phẩm nào trong giỏ hàng</h4>
<?php else : ?>

    <form action="" method="post">

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col"></th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $total = 0;
                $index = 0;
                while ($oder = mysqli_fetch_array($oderProductsShow)) {
                    $total += $oder['price'] * $_SESSION['qty_arry'][$index];
                    $fomat = number_format($oder["price"]);

                    $fomatTotal = number_format($oder['price'] * $_SESSION['qty_arry'][$index]);



                    echo "
                        <tr>
                            <td scope='row'>{$oder['name']}</td>
                            <td><img width='100px' height='100px' src=/admin/products/action/{$oder['url_img']} alt={$oder['name']}></td>
                            <td>{$fomat} vnd</td>
                            <td>
                            <div class='d-flex align-items-center'>
                                <button onclick='handleDecriment($index)' type='button' class=' btn btn-cart decrimen' >-</button>
                                <p class='show-qty'>
                                <input type='hidden' name='indexos[]' value='{$index}'>
                                <input readonly name='qty_{$index}' style='width:45px' class='inputSet inputSet{$index}' type='text' value='{$_SESSION['qty_arry'][$index]}'>
                                </p>
                                <button onclick='handleIcrement($index)' type='button'  class=' btn btn-cart icrement' >+</button>
                            </div>

                            </td>
                            <td>{$fomatTotal} vnd</td>
                            <td><a href='web-page/cart/action/delete.php?id={$oder["id"]}&index={$index}' class='btn btn-danger btn-sm'>Detele</a></td>
                        </tr>";
                    $index++;
                }


                ?>


            </tbody>
        </table>
        <div class="text-end mb-2">
            <p class="text-danger">Hãy cập nhật trước khi thanh toán</p>
        </div>
        <div class="text-end mb-5">
            <button name="save" class="btn mx-4 btn-primary btn-lg" type="submit">Cập nhật</button>
            <a class="btn btn-danger" href="web-page/cart/action/clearCart.php">Xóa toàn bộ</a>
        </div>
        <p class="total text-end mb-5">
            <?php
            if (count($_SESSION["cart"]) > 0) {
                $_SESSION["total_price"] = $total;
                echo "Tổng tiền toàn bộ sản phẩm : ";
                echo  "<strong>" . number_format($total) . " </strong>" . " vnd";
            } else "";
            ?>
        </p>

        <div class="text-end mb-5 d-flex justify-content-end">

            <a href="web-page/cart/action/checkout.php" class="btn  btn-primary btn-lg">Thanh toán</a>
        </div>
    </form>
<?php endif; ?>

</div>

<script>
    const elInputset = document.querySelector(".show-qty");
    const handleIcrement = (id) => {
        const InputValue = document.querySelector(`.inputSet${id}`);
        InputValue.value = Number(InputValue.value) + 1;
    }
    const handleDecriment = (id) => {
        const InputValue = document.querySelector(`.inputSet${id}`);
        InputValue.value = Number(InputValue.value) - 1;
        if (InputValue.value < 1) {
            InputValue.value = 1;
        }
    }
</script>