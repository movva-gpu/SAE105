<?php

$error = [];

if (empty($_FILES))
    array_push($error, 'empty-image');
if (empty($_POST) || empty($_POST['alt']))
    array_push($error, 'empty');

$image_metadata['file_name'] = $_FILES['image']['name'];
$image_metadata['file_type'] = $_FILES['image']['type'];
$image_metadata['file_size'] = $_FILES['image']['size'];
$image_metadata['tmp_file'] = $_FILES['image']['tmp_name'];

$image_error = $_FILES['image']['error'];

if ($image_error != 0) {
    array_push($error, 'file_error');
    die;
}

if ($image_metadata['file_type'] !== 'image/avif' ||
    $image_metadata['file_type'] !== 'image/webp')
        array_push($error, 'file_type');

if (exif_imagetype($image_metadata['tmp_file']) != IMAGETYPE_AVIF ||
    exif_imagetype($image_metadata['tmp_file']) != IMAGETYPE_WEBP)
        array_push($error, 'file_type');

echo $image_metadata['file_size'];
foreach ($image_metadata as $key => $value) {
    echo $key . ': ' . $value;
}
foreach ($error as $key => $value) {
    echo $key . ': ' . $value;
}