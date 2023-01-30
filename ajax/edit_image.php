<?php

require "../backend/config.php";
session_start();
$auth = (object)$_SESSION['auth'];
$coImage = isset($_FILES['coImage']) && $_FILES['coImage']['error'] === UPLOAD_ERR_OK ? $_FILES['coImage'] : null;
$error = array();
if (is_null($coImage)) {
    array_push($error, 'Image is required');
}
$fileTmpPath = $coImage['tmp_name'];
$fileName = $coImage['name'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
// sanitize file-name
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
// directory in which the uploaded file will be moved
$uploadFileDir = '../assets/images/';
$dest_path = $uploadFileDir . $newFileName;

if (move_uploaded_file($fileTmpPath, $dest_path)) {
    $image = 'assets/images/' . $newFileName;
}

$update = $db->update(
    'users',
    [
        'coImage' => $image,
    ]
    ,
    [
        'id' => $auth->id
    ]
);
updateSession();
echo json_encode($update);
?>