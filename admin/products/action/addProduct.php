<table class="table table-primary table-success table-striped w-50">
    <form action="products/action/add.php" method="post">
        <tr>
            <th scope="row">Name</th>
            <td><input class='form-control' type="text" name="name" style="width: 100%;"></td>
        </tr>
        <tr class="">
            <th scope="row">Link url</th>
            <td><input class='form-control' name="url_img" type="text" style="width: 100%;"></td>
            <!-- <td><input name="upload" type="file"></td> -->

        </tr>
        <tr class="">
            <th scope="row">Description</th>
            <td> <textarea class="form-control" name="description" rows="2"></textarea></td>
        </tr>
        <tr class="">
            <th scope="row">Category</th>
            <td> <input type="text" class="form-control" name="category">
            </td>
        </tr>
        <tr class="">
            <th scope="row">Price</th>
            <td> <input type="text" class="form-control" name="price">
            </td>
        </tr>
        <tr class="">
            <th></th>
            <td><input type="submit" class="btn btn-primary" name="addProduct" value="Add Product"></td>
        </tr>
    </form>
</table>