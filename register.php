<?php

require "backend/config.php";
session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == true) {
    header("location:" . BASE_URL . "index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = isset($_POST['FirstName']) && trim($_POST['FirstName']) != "" ? $_POST['FirstName'] : null;
    $LastName = isset($_POST['LastName']) && trim($_POST['LastName']) != "" ? $_POST['LastName'] : null;
    $email = isset($_POST['email']) && trim($_POST['email']) != "" ? $_POST['email'] : null;
    $password = isset($_POST['password']) && trim($_POST['password']) != "" ? $_POST['password'] : null;
    $cellPhone = isset($_POST['cellPhone']) && trim($_POST['cellPhone']) != "" ? $_POST['cellPhone'] : null;
    $bizPhone = isset($_POST['bizPhone']) && trim($_POST['bizPhone']) != "" ? $_POST['bizPhone'] : null;
    $coName = isset($_POST['coName']) && trim($_POST['coName']) != "" ? $_POST['coName'] : null;
    $servLocation = isset($_POST['coName']) && trim($_POST['servLocation']) != "" ? $_POST['servLocation'] : null;
    $bizDescription = isset($_POST['bizDescription']) && trim(
        $_POST['bizDescription']
    ) != "" ? $_POST['bizDescription'] : null;
    $bizArea = isset($_POST['bizArea']) && trim($_POST['bizArea']) != "" ? $_POST['bizArea'] : null;
    $coImage = isset($_FILES['coImage']) && $_FILES['coImage']['error'] === UPLOAD_ERR_OK ? $_FILES['coImage'] : null;

    $FirstName_error = '';
    if (is_null($FirstName)) {
        $FirstName_error = 'First Name is required';
    }
    $LastName_error = '';
    if (is_null($LastName)) {
        $LastName_error = 'Last Name is required';
    }
    $email_error = '';
    if (is_null($email)) {
        $email_error = 'Email is required';
    }
    $password_error = '';
    if (is_null($password)) {
        $password_error = 'Password is required';
    }
    $cellPhone_error = '';
    if (is_null($cellPhone)) {
        $cellPhone_error = 'Cell Phone is required';
    }
    $bizPhone_error = '';
    if (is_null($bizPhone)) {
        $bizPhone_error = 'Business Phone is required';
    }
    $coName_error = '';
    if (is_null($coName)) {
        $coName_error = 'Co Name is required';
    }
    $servLocation_error = '';
    if (is_null($servLocation)) {
        $servLocation_error = 'Serv Location is required';
    }
    $bizDescription_error = '';
    if (is_null($bizDescription)) {
        $bizDescription_error = 'Description is required';
    }
    $bizArea_error = '';
    if (is_null($bizArea)) {
        $bizArea_error = 'Area is required';
    }
    $coImage_error = '';
    if (is_null($coImage)) {
        $coImage_error = 'Co Image is required';
    }

    if (
        !is_null($FirstName)
        && !is_null($LastName)
        && !is_null($email)
        && !is_null($password)
        && !is_null($cellPhone)
        && !is_null($bizPhone)
        && !is_null($coName)
        && !is_null($coImage)
        && !is_null($servLocation)
        && !is_null($bizDescription)
        && !is_null($bizArea)
    ) {
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $result = $db->fetch_row($sql);
        if ($result['status'] == 'ok' && empty($result['data'])) {
            $image = null;

            $fileTmpPath = $coImage['tmp_name'];
            $fileName = $coImage['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            // sanitize file-name
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            // directory in which the uploaded file will be moved
            $uploadFileDir = 'assets/images/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $image = 'assets/images/' . $newFileName;
            }

            $insert = $db->insert(
                'users',
                [
                    'FirstName' => $FirstName,
                    'LastName' => $LastName,
                    'email' => $email,
                    'password' => $password,
                    'cellPhone' => $cellPhone,
                    'bizPhone' => $bizPhone,
                    'coName' => $coName,
                    'coImage' => $image,
                    'servLocation' => $servLocation,
                    'bizDescription' => $bizDescription,
                    'bizArea' => $bizArea,
                    'dateStarted' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            );
            $lastInsertId = $insert['lastInsertId'];
            $sql = "SELECT * FROM `users` WHERE id='$lastInsertId'";
            $result = $db->fetch_row($sql);
            $_SESSION['login_status'] = true;
            $_SESSION['auth'] = $result['data'];
            header("location: index.php");
        } else {
            $error = "Duplicate Email Address";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YPRA Sign Up</title>

    <?php
    include "css.php"; ?>
    <!--    <link rel="stylesheet" href="assets/css/login_style.css"/>-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Sign Up</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <?php
                        if (!empty($error)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $error ?>
                            </div>
                            <?php
                        } ?>
                        <div class="form-group mb-2">
                            <label for="FirstName">First Name:</label>
                            <input type="text" name="FirstName" id="FirstName" class="form-control" required>
                            <small class="text-danger"><?= isset($FirstName_error) ? $FirstName_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="LastName">Last Name:</label>
                            <input type="text" name="LastName" id="LastName" class="form-control" required>
                            <small class="text-danger"><?= isset($LastName_error) ? $LastName_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <small class="text-danger"><?= isset($email_error) ? $email_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required/>
                            <small class="text-danger"><?= isset($password_error) ? $password_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="cellPhone">Cell Phone:</label>
                            <input type="text" name="cellPhone" id="cellPhone" class="form-control" required>
                            <small class="text-danger"><?= isset($cellPhone_error) ? $cellPhone_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="bizPhone">Business Phone:</label>
                            <input type="text" name="bizPhone" id="bizPhone" class="form-control" required>
                            <small class="text-danger"><?= isset($businessPhone_error) ? $businessPhone_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="coName">Co Name:</label>
                            <input type="text" name="coName" id="coName" class="form-control" required>
                            <small class="text-danger"><?= isset($coName_error) ? $coName_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="coImage">Co Image:</label>
                            <input type="file" name="coImage" id="coImage" class="form-control" required>
                            <small class="text-danger"><?= isset($coImage_error) ? $coImage_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="servLocation">Serv Location:</label>
                            <input type="text" name="servLocation" id="servLocation" class="form-control" required>
                            <small class="text-danger"><?= isset($servLocation_error) ? $servLocation_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="bizDescription">Description:</label>
                            <textarea class="form-control" name="bizDescription" id="bizDescription" cols="30" rows="10"
                                      required></textarea>

                            <small class="text-danger"><?= isset($bizDescription_error) ? $bizDescription_error : "" ?></small>
                        </div>
                        <div class="form-group mb-2">
                            <label for="bizArea">Area:</label>
                            <input type="text" name="bizArea" id="bizArea" class="form-control" required>
                            <small class="text-danger"><?= isset($bizArea_error) ? $bizArea_error : "" ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Sign Up</button>
                    </form>
                </div>
            </div>
            <p class="mb-0 mt-2 mb-5">
                <a href="login.php" class="text-center">Back to Sign In Page</a>
            </p>
        </div>
        <div class="col-md-2">
        </div>
    </div>


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