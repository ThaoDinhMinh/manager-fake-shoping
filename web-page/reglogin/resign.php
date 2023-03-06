<?php

function isEmail($email)
{
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    if (!preg_match($regex, $email)) {
        return false;
    } else {
        return true;
    }
}

$name_user = $email_user = $password_hs = $password_rq = '';
$nameErr = $emailErr = $passwordErr = $password_rqErr = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name_user"])) {
        $nameErr = "* Nhập tên là bắt buộc !!!";
    } elseif (strlen($_POST["name_user"]) < 3) {

        $nameErr = "* Tên phải ít nhất 3 ký tự";
    } else {
        $name_user = $_POST["name_user"];
        $$nameErr = "";
    }

    if (empty($_POST["email_user"])) {
        $emailErr = "* Nhập email là bắt buộc !!";
    } elseif (!isEmail($_POST["email_user"])) {
        $emailErr = "* Phải nhập đúng email vidu@gmail.com";
    } else {
        $email_user = $_POST["email_user"];
        $emailErr = "";
    }

    if (empty($_POST["password_hs"])) {
        $passwordErr = "* Mật khẩu là bắt buộc !!";
    } else {
        $password_hs = $_POST["password_hs"];
    }

    if (mb_strlen($_POST["password_hs"]) < 5) {
        $passwordErr = "* Mật khẩu phải ít nhất 5 ký tự !!";
    } elseif (mb_strlen($_POST["password_hs"]) > 12) {
        $passwordErr = "* Mật khẩu nhiều ít nhất 12 ký tự !!";
    } else {
        $passwordErr = "";
    }

    if (empty($_POST["password_rq"])) {
        $password_rqErr = "* Mật khẩu là bắt buộc !!";
    }

    if ($_POST["password_hs"] !== $_POST["password_rq"]) {
        $password_rqErr = "* Mật khẩu không trùng khớp !!";
    } else {
        $password_rq = $_POST["password_rq"];
    }

    if (!empty($_POST["name_user"]) && ($_POST["password_hs"] === $_POST["password_rq"]) && !empty($_POST["email_user"]) && isEmail($_POST["email_user"]) && !empty($_POST["password_hs"]) && !empty($_POST["password_rq"])) {
        $password_hash = password_hash($password_hs, PASSWORD_DEFAULT);
        $date_create = date("Y/m/d");
        $date_uplate = date("Y/m/d");
        $address = '';
        $phone = 0;

        $mysqli = require __DIR__ . "../../../db/database.php";

        $sql = "INSERT INTO users (name_user,email_user,password_user ,date_create , date_uplate , phone_user , address_user) VALUE (?,?,?,?,?,?,?)";

        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("sql error : " . $mysqli->error);
        }

        $sql_getemail = "SELECT * FROM users WHERE email_user = '$email_user'";

        $result = $mysqli->query($sql_getemail);

        if (mysqli_num_rows($result) > 0) {
            $emailErr = "* Email đã được sử dụng !!";
        } else {
            $stmt->bind_param("sssssis", $name_user, $email_user, $password_hash, $date_create, $date_uplate, $phone, $address);
            if ($stmt->execute()) {
                header("location: wellcam.html");
                exit;
            }
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
        <h3 class="mt-3">Đăng ký</h3>
        <div class="mt-3 col-md-4 col-4">
            <form method="post" action="">
                <div class=" mb-3">
                    <label for="exampleInputName" class="form-label">Nhập tên</label>
                    <input name="name_user" type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" value="<?php htmlspecialchars($_POST['name_user'] ?? '') ?>">
                    <p class="text-danger"><?php echo $nameErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email_user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php htmlspecialchars($_POST['email_user'] ?? '') ?>">
                    <p class="text-danger"><?php echo $emailErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="password_hs" type="password" class="form-control" id="exampleInputPassword1">
                    <p class="text-danger"><?php echo $passwordErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu</label>
                    <input name="password_rq" type="password" class="form-control" id="exampleInputPassword2">
                    <p class="text-danger"><?php echo $password_rqErr; ?></p>
                </div>
                <input name="button" type="submit" class="btn btn-primary" value="Đăng ký">
            </form>

            <p class="mt-3">Bạn đã có tài khoản !! <a href="login.php">Đăng nhập ngay</a> </p>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>