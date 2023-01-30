<?php

require "db.php";
$db = new db();
date_default_timezone_set("UTC");
const BASE_URL = "http://localhost/test/ypra/";
const APP_NAME = "YPRA-BIZ";

function updateSession()
{
    $auth = (object)$_SESSION['auth'];
    $sql = "SELECT * FROM `users` WHERE id='$auth->id'";
    global $db;
    $result = $db->fetch_row($sql);
    $_SESSION['auth'] = $result['data'];
    return $result['data'];
}

function getUserAddress($user_id)
{
    $sql = "SELECT * FROM `bizaddress` WHERE user_id='$user_id'";
    global $db;
    $result = $db->fetch_row($sql);
    return (object)$result['data'];
}

function getUserHours($user_id)
{
    $sql = "SELECT * FROM `bizhours` WHERE user_id='$user_id'";
    global $db;
    $result = $db->fetch_row($sql);
    return (object)$result['data'];
}

?>