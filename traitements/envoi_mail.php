<?php
$errors = [];

if (count($_POST) == 0) {
    echo "Checking for empty form data...";
    $errors = array_push($errors, 'empty');
}
echo "Checking for valid email address...";
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors = array_push($errors, 'email');
}

if (empty($_POST['name'])) {
    echo "Checking for empty name...";
    $errors = array_push($errors, 'empty');
}

if (!empty($errors)) {
    echo "Error(s) found: ";
    $errors_str = '';
    foreach ($errors as $error) {
        echo $error . ', ';
    }
    for ($i = 0; $i < count($error); $i++) {
        echo $errors[$i] . ", ";
        $errors_str .= $errors[$i] . ',';
    }
    header('Location: ../contact.php?errors=' . $errors_str);
    die;
}

$name = mb_strtolower($_POST['name']);
$firstName = mb_strtolower($_POST['first-name']);

echo "Extracting name and first name...";

$email = $_POST['email'];
$subject = $_POST['subject'] ? mb_strtolower($_POST['subject']) : 'Pas d\'objet';

echo "Extracting email, subject...";
$subject = $subject . ' : de la part de ' . ucfirst($firstName) . ' ' . ucfirst($name);

echo "Extracting message...";
$message = $_POST['message'];

echo "Preparing email headers...";
$headers = 'From:' . $email . "\r\n" . 'Reply-to:' . $email . "\r\n" . 'X-Mailer:PHP/' . phpversion();

echo "Preparing destination email address...";
$dest = file_get_contents('../config/email');

echo "Sending email...";
if (!mail($dest, $subject, $message, $headers)) {
    header('location: ../contact.php?errors=not-sent');
    die;
}

echo "Preparing confirmation email headers...";
$headers = 'From:' . $dest . "\r\n" . 'Reply-to:' . 'noreply@mmi-troyes.fr' . "\r\n" . 'X-Mailer:PHP/' . phpversion();

echo "Sending confirmation email...";
if (mail($email, 'Confirmation', ucfirst($firstName) . ",\r\n" . 'votre demande de contact auprès de New Who a été enregistré.', $headers)) {
    header('location: ../contact.php?errors=none');
    die;
}
?>