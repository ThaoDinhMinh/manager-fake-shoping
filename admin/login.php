<?php
$is_invalid = false;
$password_err = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "../../db/database.php";

    $sql = sprintf(
        " SELECT * FROM user_admins 
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );
    $result = $mysqli->query($sql);
    $admin = $result->fetch_assoc();

    if ($admin) {
        if (password_verify($_POST["password"], $admin["password_hash"])) {
            session_start();
            $_SESSION["admin_id"] = $admin["id"];
            header("location: index.php");
            exit;
        } else {
            $password_err = "* Sai mật khẩu !!!";
        }
    }
    $is_invalid = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="col-lg-4 col-12">
            <h5 class="mt-3 mb-3">Đăng nhập admin</h5>
            <?php if ($is_invalid) : ?>
                <em>Không hợp lệ</em>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Hòm thư</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" />
                    <p class="text-danger"><?= $password_err; ?></p>
                </div>

                <button class="btn btn-primary">Đăng nhập</button>
            </form>
            <p class="mt-4">Bạn chưa có tài khoản !! <a href="signup.php">đăng ký ngay</a></p>

        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>