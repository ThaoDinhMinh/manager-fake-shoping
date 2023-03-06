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
$emailErr = $passwordErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_user = $_POST["email_user"];
    $password_hs = $_POST["password_hs"];

    if (empty($_POST["email_user"])) {
    }

    $mysqli = require __DIR__ . "../../../db/database.php";
    if (isset($_POST["email_user"]) && isset($_POST["password_hs"]) && isEmail($_POST["email_user"])) {
        $sql = " SELECT * FROM user_admins 
        WHERE email = '$email_user'";
        $user = $mysqli->query($sql)->fetch_assoc();

        if ($user) {
            if (password_verify($password_hs, $user["password_hs"])) {
                session_start();
                $_SESSION["user_id"] = $user["id"];
                header("location: ../index.php");
                exit;
            }
        } else {
            $passwordErr = "* Mật khẩu không đúng !!";
        }
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h3 class="mt-3">Đăng nhập</h3>
        <div class="mt-3 col-md-4 col-4">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Địa chỉ email</label>
                    <input name="email_user" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php htmlspecialchars($_POST['email_user'] ?? '') ?>">
                    <p class="text-danger"><?php echo $emailErr; ?></p>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input name="password_hs" type="password" class="form-control" id="exampleInputPassword1">
                    <p class="text-danger"><?php echo $passwordErr; ?></p>
                </div>

                <input name="button" type="submit" class="btn btn-primary" value="Đăng ký">
            </form>

            <p class="mt-3">Bạn có khoản !! <a href="resign.php">Đăng ký ngay</a> </p>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>