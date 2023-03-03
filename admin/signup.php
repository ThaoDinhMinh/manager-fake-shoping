<?php

$name = $email = $password = $password_again = '';
$nameErr = $emailErr = $passwordErr = $password_againErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "* Tên là bắt buộc !!";
    } else {
        $name = $_POST["name"];
    }
    if (empty($_POST["email"])) {
        $emailErr = "* Email là bắt buộc !!";
    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "* Password là bắt buộc !!";
    } else {
        if (strlen($_POST["password"]) < 5) {
            $passwordErr = "Mật khẩu ít nhất 5 ký tự";
        } else {
            $password = $_POST["password"];
        }
    }
    if (empty($_POST["password_again"])) {
        $password_againErr = "";
    } else {
        $password_again = $_POST["password_again"];
    }
    if ($_POST["password"] !== $_POST["password_again"]) {
        $password_againErr = "* Mật khẩu không trùng khớp";
    } else  $password_againErr = "";


    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . '../../db/database.php';

    $sql = "INSERT INTO user_admins ( name , email , password_hash ) VALUES(?, ?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("sql error : " . $mysqli->error);
    }
    $sql_get = "SELECT * FROM user_admins WHERE email = '$email'";
    $result = $mysqli->query($sql_get);
    if (mysqli_num_rows($result) > 0) {
        $emailErr = "* Email đã được sử dụng !!";
    } else {
        $stmt->bind_param("sss", $name, $email, $password_hash);
        if ($stmt->execute()) {
            header("location: wellcom.html");
            exit;
        }
    }
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
            <h5 class="mt-3 mb-3">Đăng ký</h5>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Nhập tên</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" />
                    <p class="text-danger"><?= $nameErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Hòm thư</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                    <p class="text-danger"><?= $emailErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" />
                    <p class="text-danger"><?= $passwordErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="password_again" class="form-label">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" id="password_again" name="password_again" />
                    <p class="text-danger"><?= $password_againErr; ?></p>
                </div>

                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
            <p class="mt-4">
                Bạn đã có tài khoản !! <a href="login.php">đăng nhập ngay</a>
            </p>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>