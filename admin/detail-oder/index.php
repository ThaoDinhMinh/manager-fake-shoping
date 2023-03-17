<?php
$mhid = substr(sha1($_GET["idting"]), 1, 6);
?>


<div class="container">

    <h6 class="mt-1 mb-1">Mã đặt hàng : <strong><?php echo $mhid; ?></strong></h6>
    <h6 class="mt-1 mb-1">Người mua : <strong><?php echo $_GET["name"] ?></strong></h6>
    <h5 class="mt-4 mb-4">Các sản phẩm được mua</h5>
    <div class="other">
        <?php include("detail-oder/view/showoder.php") ?>
    </div>
</div>