<?php
if (count($_SESSION["cart"]) > 0) {
    $sqlOder = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";

    $oderProductsShow = $mysqli->query($sqlOder);
}


?>

<div class="container">
    <?php if (count($_SESSION["cart"]) == 0) : ?>

        <h4 class='mt-5 text-center mb-5'>Không có sản phẩm nào trong giỏ hàng</h4>

    <?php else : ?>

        <form action="post">

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
                            <td><img width='100px' height='100px' src={$oder['url_img']} alt={$oder['name']}></td>
                            <td>{$fomat} vnd</td>
                            <td>{$_SESSION['qty_arry'][$index]}</td>
                            <td>{$fomatTotal} vnd</td>
                            <td><a href='web-page/cart/action/delete.php?id={$oder["id"]}&index={$index}' class='btn btn-danger btn-sm'>Detele</a></td>
                        </tr>";
                        $index++;
                    }


                    ?>


                </tbody>
            </table>

            <div class="text-end mb-5">
                <a class="btn btn-danger" href="web-page/cart/action/clearCart.php">Xóa toàn bộ</a>
            </div>
            <p class="total text-end mb-5">
                <?php
                if (count($_SESSION["cart"]) > 0) {
                    echo "Tổng tiền toàn bộ sản phẩm : ";
                    echo  "<strong>" . number_format($total) . " </strong>" . " vnd";
                } else "";
                ?>
            </p>

            <div class="text-end mb-5">
                <button class="btn btn-primary btn-lg" type="submit">Thanh toán</button>
            </div>
        </form>
    <?php endif; ?>

</div>