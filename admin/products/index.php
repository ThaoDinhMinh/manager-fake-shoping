<div class="container">
    <h2 class="text-center mt-3">Quản lý sản phẩm</h2>
    <h3>Thêm sản phẩm</h3>
    <?php
    include("action/addProduct.php");
    ?>
    <h3>Danh mục sản phẩm</h3>
    <table class="table table-primary table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Link img</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Date create</th>
                <th scope="col">Date Uplate</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mysqli = require __DIR__ . "../../../db/database.php";
            $sql = "SELECT * FROM products ORDER BY id DESC";
            $result = $mysqli->query($sql);
            while ($produt_render = mysqli_fetch_array($result)) {
                echo "
                <tr >
                <td>{$produt_render['name']}</td>
                <td><img src='/admin/products/action/{$produt_render['url_img']}' style='width:100px'></td>
                <td>{$produt_render['description']}</td>
                <td>{$produt_render['category']}</td>
                <td>{$produt_render['price']}</td>
                <td>{$produt_render['date_create']}</td>
                <td>{$produt_render['date_uplate']}</td>
                <td><form action='./products/action/delete.php' method='post'>
                <input name='id_product' type='hidden' value='{$produt_render['id']}'>
                <button type='submit' class='btn btn-secondary'>Delete</button>
                </form>
                <form class='mt-3' action='' method='post'>
                <input name='id_product_uplate' type='hidden' value='{$produt_render['id']}'>
                <button type='submit' class='btn btn-primary'>Uplate</button>
                </form></td>
            </tr>
                ";
            }
            ?>

        </tbody>
    </table>
    <?php
    if (isset($_POST["id_product_uplate"])) {

        $sql_edit = "SELECT * FROM products WHERE id = {$_POST['id_product_uplate']}";

        $new_result = $mysqli->query($sql_edit);
        $product_edit = $new_result->fetch_assoc();


        echo "
        <h3 class='mt-3'>Chỉnh sửa products</h3>
        <table class='table table-primary table-success table-striped w-50'>
         <form action='./products/action/edit.php' method='post' enctype='multipart/form-data'>
        <tr>
            <th scope='row'>Name</th>
            <td><input class='form-control' type='text' name='name' style='width: 100%;' value={$product_edit["name"]}></td>
        </tr>
        <tr>
            <th>Chọn ảnh</th>
            <td><input name='fileupload' class='form-control' type='file'></td>
        </tr>
        <tr class=''>
            <th scope='row'>Description</th>
            <td> <textarea class='form-control' name='description' rows='2'>{$product_edit["description"]}</textarea></td>
        </tr>
        <tr class=''>
            <th scope='row'>Category</th>
            <td> <input type='text' class='form-control' name='category' value={$product_edit["category"]}>
            </td>
        </tr>
        <tr class=''>
            <th scope='row'>Price</th>
            <td> <input type='text' class='form-control' name='price' value={$product_edit["price"]}>
            </td>
            <input name='id_product_ul' type='hidden' value='{$_POST['id_product_uplate']}'>
        </tr>
        <tr class=''>
            <th></th>
            <td><input type='submit' class='btn btn-primary' name='edit' value='Uplate Product'></td>
        </tr>
        </form>
        </table>
        ";
    }

    ?>

</div>