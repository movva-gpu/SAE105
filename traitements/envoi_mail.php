<?php

if (count($_POST) == 0) { header('location: ../contact.php?error=empty'); die; }
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { header('location:../contact.php?error=email'); die; }

if (empty($_POST['name'])) { header('location:../contact.php?error=empty-name'); die; }
if (empty($_POST['first-name'])) { header('location:../contact.php?error=empty-first-name'); die; }
if (empty($_POST['email'])) { header('location:../contact.php?error=empty-email'); die; }
if (empty($_POST['message'])) { header('location:../contact.php?error=empty-message'); die; }

$name = mb_strtolower($_POST['name']);
$firstName = mb_strtolower($_POST['first-name']);

$email = $_POST['email'];
$subject = $_POST['subject'] ? mb_strtolower($_POST['subject']) : 'Pas d\'objet';

$subject = $subject . ' : de la part de ' . $firstName . ' '. $name;

$message = $_POST['message'];

$headers = 'From:' . $email . "\r\n" . 'Reply-to:' . $email . "\r\n" .  'X-Mailer:PHP/' . phpversion();

$dest = file_get_contents('../config/email');

if (!mail($dest, $subject, $message, $headers)) { header('location: ../contact.php?error=not-sent'); die; }

$headers = 'From:' . $dest . "\r\n" . 'Reply-to:' . 'noreply@mmi-troyes.fr' . "\r\n" .  'X-Mailer:PHP/' . phpversion();

if (mail($email, 'Confirmation', $firstName . ",\r\n" . 'votre demande de contact auprès de New Who a été enregistré.', $headers)) { header('location: ../contact.php?error=none'); die; }
