<?php
if (isset($_SESSION["admin_id"])) {
    $sqluser = "SELECT * FROM users";
    $resut = $mysqli->query($sqluser);
}

?>

<div class="container">
    <h5 class="mt-4 mb-4">Tất cả người dùng đã đăng ký !!</h5>

    <table class="table table-primary table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Email người dùng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày đăng ký</th>
                <th scope="col">Ngày sửa thông tin</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while ($usered = mysqli_fetch_array($resut)) {

                echo "  <tr>
                <td valign='middle'>{$usered['name_user']}</td>
                <td valign='middle'>{$usered['email_user']}</td>
                <td valign='middle'>{$usered['address_user']}</td>
                <td valign='middle'>{$usered['phone_user']}</td>
                <td valign='middle'>{$usered['date_create']}</td>
                <td valign='middle'>{$usered['date_uplate']}</td>
                <td valign='middle'><a class='btn btn-sm btn-danger' href='users/action/delete.php?iduser={$usered['id']}'>Xóa</a></td>
                </tr>
                ";
            }
            ?>

        </tbody>

    </table>

</div>