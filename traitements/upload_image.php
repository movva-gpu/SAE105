<?php

error_reporting(0);

$error = [];

if (empty($_FILES))
    array_push($error, 'empty_image');
if (empty($_POST['alt']))
    array_push($error, 'empty');

$image['file_name'] = $_FILES['image']['name'];
$image['file_type'] = $_FILES['image']['type'];
$image['file_size'] = $_FILES['image']['size'];
$image['tmp_file'] = $_FILES['image']['tmp_name'];

$image_error = $_FILES['image']['error'];

if ($image_error != 0) {
    array_push($error, 'file_error');
    die;
}

// Test image

if ($image['file_type'] != 'image/avif' &&
    $image['file_type'] != 'image/webp')
        array_push($error, 'file_type');
        
if (exif_imagetype($image['tmp_file']) != IMAGETYPE_AVIF &&
    exif_imagetype($image['tmp_file']) != IMAGETYPE_WEBP)
        array_push($error, 'file_type');

if ($image['file_size'] > 500_000) array_push($error, 'file_size');

if (!empty($error)) {
    $errors = '';
    for ($i = 0; $i < count($error); $i++) $errors .= $error[$i] . ',';
    echo $errors;
    header('Location: ../galerie.php?errors=' . $errors . '#upload');
    die;
}

// Download image

$file_count = -2; // . and ..
$folder = opendir('../images/galerie');
while ($ile = readdir($folder)) {
    $file_count++;
}

$file_type = explode('/', $image['file_type'])[1];
$file_name = 'upload_'. ($file_count + 1);

touch('../images/galerie/alt/' . $file_name . '.txt');
file_put_contents('../images/galerie/alt/' . $file_name . '.txt', $_POST['alt']);

$file_location = '../images/galerie/'. $file_name . '.'. $file_type;

if (!move_uploaded_file($image['tmp_file'], $file_location)) array_push($error, 'file_move');

if (!empty($error)) {
    $errors = '';
    for ($i = 0; $i < count($error); $i++) $errors .= $error[$i] . ',';
    header('Location: ../galerie.php?errors=' . $errors . '#upload');
}

header('Location: ../galerie.php?errors=none#upload');
