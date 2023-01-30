<?php

require "backend/session_check.php";
require "backend/config.php";
$auth = (object)$_SESSION['auth'];
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
            <h3><?= $auth->FirstName ?> <?= $auth->LastName ?>, <?= $auth->coName ?></h3>
            <button class="btn btn-secondary btn-sm mb-2"
                    data-bs-toggle="modal" data-bs-target="#title_modal">Edit
            </button>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (empty($auth->coImage)) {
                        ?>
                        <img class="mb-2" src="https://dummyimage.com/600x400/ffffff/000000" alt="" width="100%">
                        <?php
                    } else {
                        ?>
                        <img class="mb-2" src="<?= $auth->coImage ?>" alt="" width="100%">
                        <?php
                    }
                    ?>
                    <button class="btn btn-secondary btn-sm mt-2 mb-2" data-bs-toggle="modal"
                            data-bs-target="#image_modal">Upload
                        Image
                    </button>
                    <hr>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#description_modal">
                        Edit
                    </button>
                    <h3>Business Description</h3>
                    <h6><?= $auth->bizArea ?>, <?= $auth->servLocation ?></h6>
                    <p><?= $auth->bizDescription ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-secondary btn-sm mb-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#address_modal">Edit
                            </button>
                            <?php
                            $address = getUserAddress($auth->id);
                            ?>
                            <p class="fw-normal"><?= isset($address->addStreet) ? $address->addStreet : '' ?></p>
                            <p class="fw-normal"><?= $address->addCity ?? '' ?>
                                , <?= $address->addState ?? '' ?> <?= $address->zipCode ?? '' ?>
                            </p>
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
                            <button class="btn btn-secondary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#hours_modal">Edit
                            </button>
                            <?php
                            $user_hours = getUserHours($auth->id);
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

<div class="modal fade" id="title_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="title_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="FirstName">First Name</label>
                                <input type="text" class="form-control" name="FirstName" id="FirstName"
                                       value="<?= $auth->FirstName ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="LastName">Last Name</label>
                                <input type="text" class="form-control" name="LastName" id="LastName"
                                       value="<?= $auth->LastName ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="coName">Business Name</label>
                                <input type="text" class="form-control" name="coName" id="coName"
                                       value="<?= $auth->coName ?>" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="image_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="image_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="coImage" class="form-label">Image</label>
                                <input class="form-control" type="file" id="coImage" name="coImage">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="description_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="description_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="servLocation">Location</label>
                                <input type="text" class="form-control" name="servLocation" id="servLocation"
                                       value="<?= $auth->servLocation ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="bizArea">Area</label>
                                <input type="text" class="form-control" name="bizArea" id="bizArea"
                                       value="<?= $auth->bizArea ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="bizDescription">Description</label>
                                <textarea name="bizDescription" id="bizDescription" cols="30" rows="10"
                                          class="form-control"
                                          required><?= $auth->bizDescription ?></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="address_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="address_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="addNumber">Number</label>
                                <input type="text" class="form-control" name="addNumber" id="addNumber"
                                       value="<?= $address->addNumber ?? '' ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="addStreet">Area</label>
                                <input type="text" class="form-control" name="addStreet" id="addStreet"
                                       value="<?= $address->addStreet ?? '' ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="addCity">Area</label>
                                <input type="text" class="form-control" name="addCity" id="addCity"
                                       value="<?= $address->addCity ?? '' ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="addState">State</label>
                                <input type="text" class="form-control" name="addState" id="addState"
                                       value="<?= $address->addState ?? '' ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="zipCode">Zip Code</label>
                                <input type="text" class="form-control" name="zipCode" id="zipCode"
                                       value="<?= $address->zipCode ?? '' ?>" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="hours_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="hours_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="mon">Monday</label>
                                <input type="text" class="form-control" name="mon" id="mon"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tues">Tuesday</label>
                                <input type="text" class="form-control" name="tues" id="tues"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="wed">Wednesday</label>
                                <input type="text" class="form-control" name="wed" id="wed"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="thurs">Thursday</label>
                                <input type="text" class="form-control" name="thurs" id="thurs"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="fri">Friday</label>
                                <input type="text" class="form-control" name="fri" id="fri"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sat">Saturday</label>
                                <input type="text" class="form-control" name="sat" id="sat"
                                       required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sun">Sunday</label>
                                <input type="text" class="form-control" name="sun" id="sun"
                                       required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "js.php"; ?>
<script>
  $(document).ready(function () {
    $('#title_form').on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'post',
        url: 'ajax/edit_title.php',
        data: new FormData(this),
        contentType: false,
        data_type: 'json',
        cache: false,
        processData: false,
        beforeSend: function () {
          loader()
        },
        success: function (response) {
          var response = JSON.parse(response)
          swal.close()
          $('#title_modal').modal('toggle')
          window.location.reload()
        },
        error: function (response) {
        },
      })
    })

    $('#image_form').on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'post',
        url: 'ajax/edit_image.php',
        data: new FormData(this),
        contentType: false,
        data_type: 'json',
        cache: false,
        processData: false,
        beforeSend: function () {
          loader()
        },
        success: function (response) {
          var response = JSON.parse(response)
          swal.close()
          $('#image_modal').modal('toggle')
          window.location.reload()
        },
        error: function (response) {
        },
      })
    })

    $('#description_form').on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'post',
        url: 'ajax/edit_description.php',
        data: new FormData(this),
        contentType: false,
        data_type: 'json',
        cache: false,
        processData: false,
        beforeSend: function () {
          loader()
        },
        success: function (response) {
          var response = JSON.parse(response)
          swal.close()
          $('#description_modal').modal('toggle')
          window.location.reload()
        },
        error: function (response) {
        },
      })
    })

    $('#address_form').on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'post',
        url: 'ajax/edit_address.php',
        data: new FormData(this),
        contentType: false,
        data_type: 'json',
        cache: false,
        processData: false,
        beforeSend: function () {
          loader()
        },
        success: function (response) {
          var response = JSON.parse(response)
          swal.close()
          $('#address_modal').modal('toggle')
          window.location.reload()
        },
        error: function (response) {
        },
      })
    })

    $('#hours_form').on('submit', function (e) {
      e.preventDefault()
      $.ajax({
        type: 'post',
        url: 'ajax/edit_hours.php',
        data: new FormData(this),
        contentType: false,
        data_type: 'json',
        cache: false,
        processData: false,
        beforeSend: function () {
          loader()
        },
        success: function (response) {
          var response = JSON.parse(response)
          swal.close()
          $('#hours_modal').modal('toggle')
          window.location.reload()
        },
        error: function (response) {
        },
      })
    })
  })
</script>

</body>
</html>