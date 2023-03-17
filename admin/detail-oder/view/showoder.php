<?php
if (isset($_GET["idting"])) {
    $odersql =  "SELECT name , quaintly , url_img, price FROM oder_detail , products 
    WHERE oder_detail.oder_id = {$_GET['idting']} 
    AND oder_detail.product_id = products.id";

    $respon =  $mysqli->query($odersql);
}
?>



<table class="table table-primary table-success table-striped">
    <thead>
        <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Giá sản phẩm</th>
            <th scope="col">Số lượng mua</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($odered = mysqli_fetch_array($respon)) {
            $fomer = number_format($odered['price']);

            echo "  <tr>
                <td valign='middle'>{$odered['name']}</td>
                <td><img style='width:100px;' src='/admin/products/action/{$odered['url_img']}' alt='{$odered['name']}'></td>
                <td valign='middle'>{$fomer} vnd</td>
                <td valign='middle'>{$odered['quaintly']}</td>
                </tr>
                ";
        }
        ?>

    </tbody>

</table>