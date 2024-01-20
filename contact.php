<?php require_once __DIR__ . '/utils.php' ?>
<!-- <?php
        // require __DIR__.'/vendor/autoload.php';

        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\SMTP;
        // use PHPMailer\PHPMailer\Exception;
        error_reporting(0);

        if ($_POST['first-name']) {
            $first_name     = $_POST['first-name'];
            $name           = $_POST['name'];
            $from           = $_POST['email'] ? $_POST['email'] : 'anonymous@xyz';
            $subject        = $_POST['subject'];
            $message        = $_POST['message'];

            $to = file_get_contents('config/email');
            $headers    = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            $sent = mail($to, $subject, $message, $headers);

            $post = true;


            // $mail = new PHPMailer(true);
        }

        ?> -->
<!DOCTYPE html>
<html lang='fr'>

<head><?= headGenerator('Contact', 'Me contacter', 'Contact', 'noindex, nofollow'); ?></head>

<body>
    <?= requireHeader(); ?>
    <main>
        <article>
            <h1>Contact</h1>
            <!-- <?php if ($sent && $post) echo '<p class=success>Message sent</p><br>';
                    if (!$sent && $post) echo '<p class=error>Something went wrong</p><br>' ?> -->
            <p class='warning'>W.I.P.</p><br>
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
                <label for='email'>E-mail</label>
                <input type='email' name='email' id='email' placeholder='E-mail (facultatif)'>
                <label for='subject'>Objet</label>
                <input type='text' name='subject' id='subject' placeholder='Objet' required>
                <br>
                <label for='message'>Message</label>
                <textarea name='message' id='message' placeholder='Un magnifique message' required></textarea>

                <button type='submit' name='submit'>Envoyer</button>
            </form>
        </article>
    </main>
    <?= requireFooter(); ?>

    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <script src='js/main.js'></script>
</body>

</html>