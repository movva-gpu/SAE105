<?php
$errors = [];

echo "Checking for empty form data...";
if (count($_POST) == 0) array_push($errors, 'empty');

echo "Checking for valid email address...";
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) array_push($errors, 'email');
if (count(explode('.', explode('@', $_POST['email'])[1])) < 2) array_push($errors, 'email');

echo "Checking for empty name...";
if (empty($_POST['name'])) array_push($errors, 'empty');

if (!empty($_POST['subject'])) {
    if ($_POST['subject'] != 'info' && $_POST['subject'] != 'reclam' && $_POST['subject'] != 'devis' && $_POST['subject'] != 'other') {
        array_push($errors, 'empty');
    } else {
        switch ($_POST['subject']) {
            case 'info':
                $msgTitle   = 'Demande d\'information';
                $confirmMsg = 'Votre demande d\'information à bien été envoyée.';
                break;
            case 'devis':
                $msgTitle   = 'Demande de devis';
                $confirmMsg = 'Votre demande de devis à bien été envoyée.';
                break;
            case 'reclam':
                $msgTitle   = 'Réclamation';
                $confirmMsg = 'Votre réclamation à bien été envoyée.';
                break;
            case 'other':
                if (empty($_POST['other-subject'])) { array_push($errors, 'empty'); break; }
                $msgTitle = $_POST['other-subject'];
                break;
            
            default:
                array_push($errors, 'empty');
                break;
        }
    }
}

if ($errors != []) {
    echo "Error(s) found: ";
    $errors_str = '';
    for ($i = 0; $i < count($errors); $i++) {
        echo $errors[$i] . ',';
        $errors_str .= $errors[$i] . ',';
    }
    header('Location: ../contact.php?errors=' . $errors_str);
    die;
}

$name = mb_strtolower($_POST['name']);
$firstName = mb_strtolower($_POST['first-name']);

echo "Extracting name and first name...";

$email = $_POST['email'];

echo "Extracting email, subject...";
$subject = $msgTitle . '&#160;: de la part de ' . ucfirst($firstName) . ' ' . ucfirst($name);

echo "Extracting message...";
$message = $_POST['message'];

echo "Preparing email headers...";
$headers = 'From:' . $email . "\r\n" .
    'Reply-to:' . $email . "\r\n" .
    'X-Mailer:PHP/' . phpversion() . "\r\n" .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8';

echo "Preparing destination email address...";
$dest = file_get_contents('../config/email');

echo "Sending email...";
if (!mail($dest, $subject, makeMsg($msgTitle, $message, false), $headers)) {
    header('location: ../contact.php?errors=not-sent');
    die;
}

echo "Preparing confirmation email headers...";
$headers = 'From:' . $dest . "\r\n" .
    'Reply-to:' . 'noreply@mmi-troyes.fr' ."\r\n" .
    'X-Mailer:PHP/' . phpversion() .
    'MIME-Version: 1.0' . "\r\n" .
    'Content-Type: text/html; charset=utf-8';

echo "Sending confirmation email...";
if (!mail($email, $msgTitle, makeMsg($msgTitle, $confirmMsg, true) . ",\r\n" . 'votre demande de contact auprès de New Who a été enregistré.', $headers)) {
    header('location: ../contact.php?errors=something-wrong');
    die;
}
header('location: ../contact.php?errors=none');

/**
 * Creates a message with a given title, message, and link.
 * 
 * @param string $title The title of the message.
 * @param string $message The message body.
 * @param boolean $put_link Whether to add the home link to the message.
 * @return string The message with the given title, message, and link.
 */
function makeMsg($title, $message, $put_link) : string {
    $toReturn = "
    <!doctype html>\n
    <html>\n
    <head>\n
      <meta http-equiv=\"Content-Type\" content=\"text/html\; charset=UTF-8\" >\n
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" >\n
      <title>Confirmation</title>\n
    </head>\n

    <body style=\"\n
        margin: 0;\n
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica,\n
            Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',\n
            'Segoe UI Symbol';\n
        height: 100% !important;\n
        font-size: 1.1rem;\n
        padding: 0;\n
        -ms-text-size-adjust: 100%;\n
        -webkit-text-size-adjust: 100%;\n
        width: 100% !important;\n
        background-color: #000;\n
        background: url(https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/C%C3%A9vennes_France_night_sky_with_stars_02.jpg/1280px-C%C3%A9vennes_France_night_sky_with_stars_02.jpg) #000;\">\n
        
        <div style=\"\n
            width: 50%;\n
            margin: auto;\n
            background: white;\n
            padding: 3em;\n
            margin-top: 3em;\n
            border-radius: 50px;\">\n

            <h1 style=\"text-align: center; font-size: 1.5rem\">
                " . $title ."
            </h1>\n
            <p>". $message ."</p>\n
            <p style=\"text-align: right\">Cordialement,<br>L'équipe New Who</p>\n";

    $link = $put_link ?
    "<hr>\n
    <ul style=\"list-style: none; padding: 0; margin: 0; display: flex; gap: 1em\">\n
    <li>\n
        <a href=\"http://mmi23f13.sae105.ovh/\" style=\"color: #555; text-decoration: none\">\n
            Acceuil
        </a>\n
    </li>\n
    </ul>\n" : "";

    return $toReturn . $link . "</div>\n</body>\n</html>\n";

}
?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?php headGenerator('Envoi du mail...', '', '', 'noindex, nofollow'); ?>
</head>

</html>
