<?php

require "../backend/config.php";
session_start();
$auth = (object)$_SESSION['auth'];
$mon = isset($_POST['mon']) && trim($_POST['mon']) != "" ? $_POST['mon'] : null;
$tues = isset($_POST['tues']) && trim($_POST['tues']) != "" ? $_POST['tues'] : null;
$wed = isset($_POST['wed']) && trim($_POST['wed']) != "" ? $_POST['wed'] : null;
$thurs = isset($_POST['thurs']) && trim($_POST['thurs']) != "" ? $_POST['thurs'] : null;
$fri = isset($_POST['fri']) && trim($_POST['fri']) != "" ? $_POST['fri'] : null;
$sat = isset($_POST['sat']) && trim($_POST['sat']) != "" ? $_POST['sat'] : null;
$sun = isset($_POST['sun']) && trim($_POST['sun']) != "" ? $_POST['sun'] : null;
$error = array();
if (is_null($mon)) {
    array_push($error, 'Monday Field is required');
}
if (is_null($tues)) {
    array_push($error, 'Tuesday is required');
}
if (is_null($wed)) {
    array_push($error, 'Wednesday is required');
}
if (is_null($thurs)) {
    array_push($error, 'Thursday is required');
}
if (is_null($fri)) {
    array_push($error, 'Friday is required');
}
if (is_null($sat)) {
    array_push($error, 'Saturday is required');
}
if (is_null($sun)) {
    array_push($error, 'Sunday is required');
}
if (count($error) > 0) {
    echo json_encode(['status' => 'empty', 'error' => $error], 400);
    exit;
}
$sql = "SELECT * FROM `bizhours` WHERE user_id='$auth->id'";
$result = $db->fetch_row($sql);
if ($result['status'] == 'ok' && empty($result['data'])) {
    $update = $db->insert(
        'bizhours',
        [
            'user_id' => $auth->id,
            'mon' => $mon,
            'tues' => $tues,
            'wed' => $wed,
            'thurs' => $thurs,
            'fri' => $fri,
            'sat' => $sat,
            'sun' => $sun,
        ]
    );
} else {
    $update = $db->update(
        'bizhours',
        [
            'mon' => $mon,
            'tues' => $tues,
            'wed' => $wed,
            'thurs' => $thurs,
            'fri' => $fri,
            'sat' => $sat,
            'sun' => $sun,
        ],
        [
            'user_id' => $auth->id
        ]
    );
}
echo json_encode($update);
?>