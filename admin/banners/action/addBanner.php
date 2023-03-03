<table class="table table-primary table-success table-striped w-50">
    <form action="banners/action/resq.php" method="post">
        <tr>
            <th scope="row">Title</th>
            <td><input type="text" name="title" style="width: 100%;"></td>
        </tr>
        <tr class="">
            <th scope="row">Content</th>
            <td> <textarea class="form-control" name="content" rows="2"></textarea></td>
        </tr>
        <tr class="">
            <th scope="row">Image</th>
            <td><input name="img" type="text" style="width: 100%;"></td>
            <!-- <td><input name="upload" type="file"></td> -->
        </tr>
        <tr class="">
            <th></th>
            <td><input type="submit" class="btn btn-primary" name="addbanner" value="Add banner"></td>
        </tr>
    </form>
</table>