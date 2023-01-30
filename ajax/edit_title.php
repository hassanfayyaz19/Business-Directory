<?php

require "../backend/config.php";
session_start();
$auth = (object)$_SESSION['auth'];
$FirstName = isset($_POST['FirstName']) && trim($_POST['FirstName']) != "" ? $_POST['FirstName'] : null;
$LastName = isset($_POST['LastName']) && trim($_POST['LastName']) != "" ? $_POST['LastName'] : null;
$coName = isset($_POST['coName']) && trim($_POST['coName']) != "" ? $_POST['coName'] : null;
$error = array();
if (is_null($FirstName)) {
    array_push($error, 'First Name is required');
}
if (is_null($LastName)) {
    array_push($error, 'Last Name is required');
}
if (is_null($coName)) {
    array_push($error, 'Email is required');
}

$update = $db->update(
    'users',
    [
        'FirstName' => $FirstName,
        'LastName' => $LastName,
        'coName' => $coName,
    ]
    ,
    [
        'id' => $auth->id
    ]
);
updateSession();
echo json_encode($update);
?>