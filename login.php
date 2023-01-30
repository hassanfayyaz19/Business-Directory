<?php

require "backend/config.php";
session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == true) {
    header("location:" . BASE_URL . "index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) && trim($_POST['email']) != "" ? $_POST['email'] : null;
    $password = isset($_POST['password']) && trim($_POST['password']) != "" ? $_POST['password'] : null;

    $email_error = '';
    if (is_null($email)) {
        $email_error = 'Email is required';
    }
    $password_error = '';
    if (is_null($password)) {
        $password_error = 'Password is required';
    }

    if (!is_null($email) && !is_null($password)) {
        $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";

        $result = $db->fetch_row($sql);
        if ($result['status'] == 'ok' && !empty($result['data'])) {
            $_SESSION['login_status'] = true;
            $_SESSION['auth'] = $result['data'];
            header("location: index.php");
        } else {
            $error = "Invalid Login Credentials";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YPRA</title>

    <?php
    include "css.php"; ?>
    <link rel="stylesheet" href="assets/css/login_style.css"/>
</head>
<body>
<div class="container">
    <h1>Sign In</h1>
    <form method="post" action="">
        <?php
        if (!empty($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        } ?>
        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <small class="text-danger"><?= isset($email_error) ? $email_error : "" ?></small>
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"/>
            <i class="bi bi-eye-slash" id="togglePassword"></i>
            <small class="text-danger"><?= isset($password_error) ? $password_error : "" ?></small>
        </p>
        <button type="submit" class="btn btn-primary mt-1">Login</button>
    </form>
    <p class="mb-0 mt-2">
        <a href="register.php" class="text-center">Register a new account</a>
    </p>
</div>
<?php
include "js.php"; ?>
<script>
  const togglePassword = document.querySelector('#togglePassword')
  const password = document.querySelector('#password')

  togglePassword.addEventListener('click', function () {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password'
    password.setAttribute('type', type)
    // toggle the icon
    this.classList.toggle('bi-eye')
  })

</script>
</body>
</html>