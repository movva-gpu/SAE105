<?php
    // require __DIR__.'/vendor/autoload.php';

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;
    error_reporting(0);

    if ($_POST['first-name']) {
        $first_name     = $_POST['first-name'];
        $name           = $_POST['name'];
        $from           = $_POST['email'] ? $_POST['email']: 'anonymous@xyz';
        $subject        = $_POST['subject'];
        $message        = $_POST['message'];

        $to = file_get_contents('config/email');
        $headers    = 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/'. phpversion();

        $sent = mail($to, $subject, $message, $headers);

        $post = true;


        // $mail = new PHPMailer(true);
    }

?>
<!DOCTYPE html>
<html lang='zxx'>
<head>
    <title>Contact</title>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='Une page de fan page de Russell T Davies'>
    <meta name='author' content='Danyella Strikann'>
    <meta name='keywords' content='Russell T Davies, Doctor Who, BBC, Fan Page, RTD, RT Davies, R.T.D.'>
    <meta name='robots' content='index, follow'>

    <script src='js/main.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
</head>
<body>
    <?php require_once('components/header.php');?>
    <main>
        <article>
            <h1>Contact</h1>
            <?php if ($sent && $post) echo '<p class=success>Message sent</p><br>'; if(!$sent && $post) echo '<p class=error>Something went wrong</p><br>'?>
            <form method='post' action='contact.php'>
                <div id='author'>
                    <div id='label'>
                        <label for='first-name'>Prénom</label>
                        <label for='name'>Nom</label>
                    </div>
                    <div id='input'>
                        <input type='text' name='first-name' id='first-name' placeholder='Jess' required>
                        <input type='text' name='name' id='name' placeholder='Doe' required>
                    </div>
                </div>
                <input type='text' name='email' placeholder='E-mail (facultatif)'>
                <input type='text' name='subject' placeholder='Objet' required>
                <textarea type='text' name='message' placeholder='Un magnifique message' required></textarea>

                <button type='submit' name='submit'>Envoyer</button>
            </form>
        </article>
    </main>
    <?php require_once('components/footer.php');?>
</body>
</html>