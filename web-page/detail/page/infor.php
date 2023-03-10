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
                    <p class="mb-3">Số lượng :</p>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-lg del-btn-event ">-</button>
                        <div class="input-set m-0 p-0">
                            <input readonly name="qty" style="width:45px" class=" inputElement" type="text" value="1">
                        </div>
                        <button type="button" class="btn btn-lg add-btn-event ">+</button>
                        <?php if ($_SESSION["mesage"] == "Thêm vào giỏ hàng") : ?>

                            <input name="submit" type="submit" class=" add-btn mx-2" value="<?php echo $_SESSION["mesage"] ?>">
                        <?php else : ?>
                            <button type="button" id="liveToastBtn" class="add-btn mx-2 "><?php echo $_SESSION["mesage"] ?></button>

                            <a class="btn add-btn btn-primary" href="index.php?page=product">Tiếp tục mua hàng</a>
                        <?php endif ?>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Thông báo</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <p class="mb-2"> Sản phẩm đã có trong giỏ hàng !!</p>
            <a class="btn btn-sm btn-primary" href="index.php?page=cart">Xem ngay</a>

        </div>
    </div>
</div>



<script>
    const EL_divRender = document.querySelector(".input-set");

    let valueInput = 1;

    const ElementAddButton = document.querySelector(".add-btn-event");
    const ElementDelButton = document.querySelector(".del-btn-event");
    const add = () => {
        valueInput = valueInput + 1;

        EL_divRender.innerHTML = `
    <input readonly  name="qty" style="width:50px" class=" inputElement" type="text" value="${valueInput}">
    `;


    }
    const del = () => {
        valueInput = valueInput - 1;
        if (valueInput < 1) {
            valueInput = 1;
        }
        EL_divRender.innerHTML = `
    <input readonly  name="qty" style="width:50px" class="inputElement" type="text" value="${valueInput}">
    `;


    }
    ElementAddButton.addEventListener("click", add)
    ElementDelButton.addEventListener("click", del)

    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
        toastTrigger.addEventListener('click', () => {
            const toast = new bootstrap.Toast(toastLiveExample)

            toast.show()
        })
    }
</script>