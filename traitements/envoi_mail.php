<?php

if (count($_POST) == 0) { header('location: ../contact.php?error=empty'); die; }
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) header('location:../contact.php?error=email');

$name = mb_strtolower($_POST['name']);
$firstName = mb_strtolower($_POST['first-name']);

$email = $_POST['email'];
$subject = $_POST['subject'] ? mb_strtolower($_POST['subject']) : 'Pas d\'objet';

$subject = $subject . ' : de la part de ' . $firstName . ' '. $name;

$message = $_POST['message'];

$headers = 'From:' . $email . "\r\n" . 'Reply-to:' . $email . "\r\n" .  'X-Mailer:PHP/' . phpversion();

$dest = file_get_contents('../config/email');

if (!mail($dest, $subject, $message, $headers)) { header('location: ../contact.php?error=not-sent'); die; }
header('location: ../contact.php?error=none');
