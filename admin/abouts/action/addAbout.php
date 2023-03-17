<table class="table table-primary table-success table-striped w-50">
    <form action="banners/action/resq.php" method="post" enctype="multipart/form-data">
        <tr>
            <th scope=" row">Chuyên</th>
            <td><input class='form-control' type="text" name="name_jop" style="width: 100%;"></td>
        </tr>
        <tr>
            <th scope=" row">Title</th>
            <td><input class='form-control' type="text" name="title" style="width: 100%;"></td>
        </tr>
        <tr class="">
            <th scope="row">Content</th>
            <td> <textarea class="form-control" name="content" rows="2"></textarea></td>
        </tr>
        <tr>
            <th>Chọn ảnh</th>
            <td><input name='fileupload' class='form-control' type='file'></td>
        </tr>
        <tr class="">
            <th></th>
            <td><input type="submit" class="btn btn-primary" name="addbanner" value="Add banner"></td>
        </tr>
    </form>
</table>