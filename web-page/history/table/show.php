<?php
if (isset($_SESSION["user_id"])) {
    $sql_oder = "SELECT * FROM oders WHERE user_id = {$_SESSION['user_id']}";
    $resuts = $mysqli->query($sql_oder);
}

?>

<table class="table table-primary table-success table-striped">
    <thead>
        <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Người đặt hàng</th>
            <th scope="col">Tổng số tiền mua</th>
            <th scope="col">Giờ đặt hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        while ($oders = mysqli_fetch_array($resuts)) {

            $format_total = number_format($oders['total_price']);
            $mhid = substr(sha1($oders['id_of_oder']), 1, 6);

            echo "
                        <tr>
                            <td>{$mhid}</td>
                            <td>{$user['name_user']}</td>
                            <td>{$format_total} vnd</td>
                            <td>{$oders['time_oder']}</td>
                            <td>{$oders['day_oder']}</td>
                            <td><a class='btn btn-sm btn-primary' href='index.php?page=oderdetail&idting={$oders['id_of_oder']}'>Chi tiết</a></td>
                        </tr>";
        }


        ?>
    </tbody>
</table>