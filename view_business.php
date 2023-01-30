<?php

require "backend/session_check.php";
require "backend/config.php";

$id = isset($_GET['id']) && trim($_GET['id']) != "" ? $_GET['id'] : null;
if (is_null($id)) {
    echo "Undefined ID";
    exit;
}
$sql = "SELECT * FROM `users` WHERE id='$id'";
$result = $db->find_data($sql);
if (!$result) {
    echo "Result Not found";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <title><?= APP_NAME ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
    include "css.php"; ?>
</head>
<body class="">
<?php
include "include/header.php"; ?>
<div class="container">
    <br>
    <a href="index.php" class="btn btn-outline-primary">Back to Search</a>
    <div class="card mt-3">
        <div class="card-body">
            <h3><?= $result->FirstName ?> <?= $result->LastName ?>, <?= $result->coName ?></h3>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (empty($result->coImage)) {
                        ?>
                        <img src="https://dummyimage.com/600x400/ffffff/000000" alt="" width="100%">
                        <?php
                    } else {
                        ?>
                        <img class="mb-2" src="<?= $result->coImage ?>" alt="" width="100%">
                        <?php
                    }
                    ?>
                    <hr>
                    <h3>Business Description</h3>
                    <h6><?= $result->bizArea ?>, <?= $result->servLocation ?></h6>
                    <p><?= $result->bizDescription ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $address = getUserAddress($result->id);
                            ?>
                            <p class="fw-normal">
                                <?= isset($address->addStreet) ? $address->addStreet : '' ?></p>
                            <p class="fw-normal"><?= $address->addCity ?? '' ?>
                                , <?= $address->addState ?? '' ?> <?= $address->zipCode ?? '' ?></p>

                            <p><?= $address->addNumber ?? '' ?></p>
                            <p class="fw-bold">Rate And Review</p>
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="ratings">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $user_hours = getUserHours($result->id);
                            ?>
                            <table class="table table-sm table-borderless">
                                <thead>
                                <tr>
                                    <th>Open</th>
                                    <th class="text-success">Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Monday</th>
                                    <td><?= $user_hours->mon ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Tuesday</th>
                                    <td><?= $user_hours->tues ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Wednesday</th>
                                    <td><?= $user_hours->wed ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Thursday</th>
                                    <td><?= $user_hours->thurs ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Friday</th>
                                    <td><?= $user_hours->fri ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Saturday</th>
                                    <td><?= $user_hours->sat ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Sunday</th>
                                    <td><?= $user_hours->sun ?? '' ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Contact the this Employer</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="full_name" class="col-md-4 col-form-label col-form-label-sm">
                                    Full Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="full_name"
                                           name="full_name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone_number" class="col-md-4 col-form-label col-form-label-sm">
                                    Your Phone</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" id="phone_number"
                                           name="phone_number">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label col-form-label-sm">
                                    Your Email</label>
                                <div class="col-md-8">
                                    <input type="email" class="form-control form-control-sm" id="email"
                                           name="email">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <textarea name="message" id="message" cols="30" rows="10"
                                              placeholder="optional message to seller"
                                              class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning form-control">Submit Request</button>
                                </div>
                            </div>
                            <small class="mt-4 ">
                                By clicking the button, you agree to YPRA’s&nbsp;&nbsp;
                                <a target="_blank"
                                   style="color: rgb(12, 108, 196); text-decoration: none; white-space: nowrap;"
                                   href="">Terms of Use</a>&nbsp;and&nbsp;
                                <a target="_blank"
                                   style="color: rgb(12, 108, 196); text-decoration: none; white-space: nowrap;"
                                   href="">Privacy
                                    Policy</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
include "js.php"; ?>
<script>

</script>

</body>
</html>