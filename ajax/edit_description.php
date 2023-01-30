<?php

require "../backend/config.php";
session_start();
$auth = (object)$_SESSION['auth'];
$servLocation = isset($_POST['servLocation']) && trim($_POST['servLocation']) != "" ? $_POST['servLocation'] : null;
$bizArea = isset($_POST['bizArea']) && trim($_POST['bizArea']) != "" ? $_POST['bizArea'] : null;
$bizDescription = isset($_POST['bizDescription']) && trim($_POST['bizDescription']) != "" ? $_POST['bizDescription'] : null;
$error = array();

if (is_null($servLocation)) {
    array_push($error, 'Location is required');
}
if (is_null($bizArea)) {
    array_push($error, 'Area is required');
}
if (is_null($bizDescription)) {
    array_push($error, 'Description is required');
}

$update = $db->update(
    'users',
    [
        'servLocation' => $servLocation,
        'bizArea' => $bizArea,
        'bizDescription' => $bizDescription,
    ]
    ,
    [
        'id' => $auth->id
    ]
);
updateSession();
echo json_encode($update);
?>