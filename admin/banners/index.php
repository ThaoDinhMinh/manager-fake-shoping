<div class="container">
    <h2 class="text-center mt-3">Quản lý banner</h2>
    <h3>Thêm banner</h3>
    <?php
    include("action/addBanner.php");
    ?>
    <h3>Danh mục banner</h3>
    <table class="table table-primary table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Url</th>
                <th scope="col">Create</th>
                <th scope="col">Uplate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mysqli = require __DIR__ . "../../../db/database.php";
            $sql = "SELECT * FROM banners ORDER BY id DESC";
            $result = $mysqli->query($sql);
            while ($banner = mysqli_fetch_array($result)) {
                echo "
                <tr >
                <td>{$banner[1]}</td>
                <td>{$banner[2]}</td>
                <td><img src='/admin/banners/action/{$banner['img_upload']}' style='width:100px'></td>
                <td>{$banner[4]}</td>
                <td>{$banner[5]}</td>
                <td><form action='./banners/action/delete.php' method='post'>
                <input name='id_banner' type='hidden' value='{$banner[0]}'>
                <button type='submit' class='btn btn-secondary'>Delete</button>
                </form>
                <form class='mt-3' action='' method='post'>
                <input name='id_banner_uplate' type='hidden' value='{$banner[0]}'>
                <button type='submit' class='btn btn-primary'>Uplate</button>
                </form></td>

            </tr>
                ";
            }

            ?>

        </tbody>
    </table>

    <?php
    if (isset($_POST["id_banner_uplate"])) {

        $sql_edit = "SELECT * FROM banners WHERE id = {$_POST['id_banner_uplate']}";

        $new_result = $mysqli->query($sql_edit);
        $bannerEdit = $new_result->fetch_assoc();


        echo "
        <h3 class='mt-3'>Chỉnh sửa banner</h3>
        <table class='table table-primary table-success table-striped w-50'>
        <form action='./banners/action/editBanner.php' method='post' enctype='multipart/form-data'>
            <tr>
                <th scope='row'>Title</th>
                <td><input class='form-control' type='text' name='title' style='width: 100%;' value='{$bannerEdit["title"]}'></td>
            </tr>
            <tr class=''>
                <th scope='row'>Content</th>
                <td> <textarea class='form-control' name='content' rows='2'>{$bannerEdit["content"]}</textarea></td>
            </tr>
            <tr>
            <th>Chọn ảnh</th>
            <td><input name='fileupload'  class='form-control'  type='file'></td>
            </tr>
            <tr class=''>
                <th></th>
                <td><input  type='submit' class='btn btn-primary' name='uplatebanner' value='Uplate'></td>
            </tr>
        </form>
        </table>";
    }


    ?>
</div>