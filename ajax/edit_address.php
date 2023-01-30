<?php

require "../backend/config.php";
session_start();
$auth = (object)$_SESSION['auth'];
$addNumber = isset($_POST['addNumber']) && trim($_POST['addNumber']) != "" ? $_POST['addNumber'] : null;
$addStreet = isset($_POST['addStreet']) && trim($_POST['addStreet']) != "" ? $_POST['addStreet'] : null;
$addCity = isset($_POST['addCity']) && trim($_POST['addCity']) != "" ? $_POST['addCity'] : null;
$addState = isset($_POST['addState']) && trim($_POST['addState']) != "" ? $_POST['addState'] : null;
$zipCode = isset($_POST['zipCode']) && trim($_POST['zipCode']) != "" ? $_POST['zipCode'] : null;
$error = array();
if (is_null($addNumber)) {
    array_push($error, 'Number is required');
}
if (is_null($addStreet)) {
    array_push($error, 'Street is required');
}
if (is_null($addCity)) {
    array_push($error, 'City is required');
}
if (is_null($addState)) {
    array_push($error, 'State is required');
}
if (is_null($zipCode)) {
    array_push($error, 'ZipCode is required');
}
if (count($error) > 0) {
    echo json_encode(['status' => 'empty', 'error' => $error], 400);
    exit;
}
$sql = "SELECT * FROM `bizaddress` WHERE user_id='$auth->id'";
$result = $db->fetch_row($sql);
if ($result['status'] == 'ok' && empty($result['data'])) {
    $update = $db->insert(
        'bizaddress',
        [
            'user_id' => $auth->id,
            'addNumber' => $addNumber,
            'addStreet' => $addStreet,
            'addCity' => $addCity,
            'addState' => $addState,
            'zipCode' => $zipCode,
        ]
    );
} else {
    $update = $db->update(
        'bizaddress',
        [
            'addNumber' => $addNumber,
            'addStreet' => $addStreet,
            'addCity' => $addCity,
            'addState' => $addState,
            'zipCode' => $zipCode,
        ],
        [
            'user_id' => $auth->id
        ]
    );
}
echo json_encode($update);
?>