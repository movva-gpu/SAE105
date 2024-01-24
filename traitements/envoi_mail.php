<?php

$errors = [];

if (count($_POST) == 0)
    array_push($errors, 'empty');
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    array_push($errors, 'email');

if (empty($_POST['name']))
    array_push($errors, 'empty');

$name = mb_strtolower($_POST['name']);
$firstName = mb_strtolower($_POST['first-name']);

$email = $_POST['email'];
$subject = $_POST['subject'] ? mb_strtolower($_POST['subject']) : 'Pas d\'objet';

$subject = $subject . ' : de la part de ' . ucfirst($firstName) . ' ' . ucfirst($name);

$message = $_POST['message'];

$headers = 'From:' . $email . "\r\n" . 'Reply-to:' . $email . "\r\n" . 'X-Mailer:PHP/' . phpversion();

$dest = file_get_contents('../config/email');

if (!mail($dest, $subject, $message, $headers)) {
    header('location: ../contact.php?error=not-sent');
    die;
}

$headers = 'From:' . $dest . "\r\n" . 'Reply-to:' . 'noreply@mmi-troyes.fr' . "\r\n" . 'X-Mailer:PHP/' . phpversion();

if (mail($email, 'Confirmation', ucfirst($firstName) . ",\r\n" . 'votre demande de contact auprès de New Who a été enregistré.', $headers)) {
    header('location: ../contact.php?error=none');
    die;
}
