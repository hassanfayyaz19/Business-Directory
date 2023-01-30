<?php

require "backend/session_check.php";
require "backend/config.php";
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
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


        body {
            background-color: #eee;
            font-family: "Poppins", sans-serif;
            font-weight: 300;
        }

        .height {
            height: 100vh;
        }
    </style>
</head>
<body class="">
<?php
include "include/header.php"; ?>
<div class="container">

    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="search.php" method="get">
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control form-control-lg" name="name"
                               placeholder="Search Business Name">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-lg" name="city"
                               placeholder="City">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control form-control-lg" name="zipcode"
                               placeholder="Zip Code">
                    </div>
                    <button type="submit" class="btn btn-primary col-md-2">Search</button>
                </div>
            </form>

        </div>

    </div>
</div>
<?php
include "js.php"; ?>
<script>

</script>

</body>
</html>