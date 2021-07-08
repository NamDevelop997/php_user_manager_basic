<?php
require '../data/list_user.php';
require '../lib/user.php';
require '../lib/url.php';

if (isset($_POST["btn_login"])) {
    $error = [];
    if (empty($_POST["username"])) {
        $error['username'] = "Không được để trống Username!";
    } else {
        $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
        if (!preg_match($pattern, $_POST["username"])) {
            $error['username'] = "Username không đúng định dạng!";
        } else {
            $username = $_POST["username"];
        }
    }

    if (empty($_POST["password"])) {
        $error['password'] = "Không được để trống Password!";
    } else {
        $pattern = "/^[A-Za-z0-9_\.!@#$%^&*()-]{6,32}$/";
        if (!preg_match($pattern, $_POST["password"])) {
            $error['password'] = "Password không đúng định dạng!";
        } else {
            $password = $_POST["password"];
        }
    }
    if (empty($error)) {
        if (check_login($username, $password)) {
            $_SESSION['is_login'] = true;
            $_SESSION['account'] = $username;
            // show_array($list_users);
            redirect_to('../?page=home');
        } else {
            $error['user_login'] = "Tài khoản hoặc mật khẩu không tồn tại!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Login Form</title>
</head>

<body>
    <div class="wrapper">
        <div class="login">
            <form action="" class="login_form" method="POST">
                <h1>Login</h1>
                <input type="text" name="username" class="username" placeholder="Username">
                <?php if (!empty($error['username'])) { ?>
                    <p class="show_err"><?php echo $error['username'] ?></p>
                <?php } ?>

                <input type="password" name="password" class="password" placeholder="Password">
                <?php if (!empty($error['password'])) { ?>
                    <p class="show_err"><?php echo $error['password'] ?></p>
                <?php } ?>

                <input type="submit" name="btn_login" class="btn_login" value="Login">
                <a href="">Quên mật khẩu</a>
                <?php if (!empty($error['user_login'])) { ?>
                    <p class="show_err"><?php echo $error['user_login'] ?></p>
                <?php } ?>
            </form>
        </div>

    </div>
</body>

</html>