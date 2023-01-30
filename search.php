<?php

require "backend/session_check.php";
require "backend/config.php";
$name = isset($_GET['name']) && trim($_GET['name']) != "" ? $_GET['name'] : null;
$city = isset($_GET['city']) && trim($_GET['city']) != "" ? $_GET['city'] : null;
$zipcode = isset($_GET['zipcode']) && trim($_GET['zipcode']) != "" ? $_GET['zipcode'] : null;
$sql = "SELECT * FROM `users`
inner join bizaddress on users.id=bizaddress.user_id";
if (!is_null($name) || !is_null($city) || !is_null($zipcode)) {
    $sql .= " WHERE";
}
if (!is_null($name)) {
    $sql .= " users.coName LIKE '%$name%'";
}
if (!is_null($city)) {
    if (!is_null($name)) {
        $sql .= ' OR';
    }
    $sql .= " addCity LIKE '%$city%'";
}
if (!is_null($zipcode)) {
    if (!is_null($city)) {
        $sql .= ' OR';
    }
    $sql .= " zipCode LIKE '%$zipcode%'";
}
$result = $db->fetch_All($sql);

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
    <h4 class="text-center">Results of Your Search for <?= $name ?> <?= $city ?> <?= $zipcode ?></h4>
    <div class="row">
        <?php
        foreach ($result['data'] as $row) {
            $row = (object)$row;
            ?>
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <?php
                    if (empty($row->coImage)) {
                        ?>
                        <img src="https://dummyimage.com/600x400/ffffff/000000" class="card-img-top" alt="...">
                        <?php
                    } else {
                        ?>
                        <img src="<?= $row->coImage ?>" class="card-img-top" alt="...">
                        <?php
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->coName ?></h5>
                        <div class="card-text">
                            <span><?= $row->addStreet ?></span>
                            <br>
                            <span><?= $row->addCity ?>, <?= $row->addState ?> , <?= $row->zipCode ?></span>
                            <br>
                            <span><?= $row->addNumber ?></span>
                            <p><a href="view_business.php?id=<?= $row->user_id ?>">Visit this Business</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
<?php
include "js.php"; ?>
<script>

</script>

</body>
</html>