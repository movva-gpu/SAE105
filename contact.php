<?php
require_once 'utils.php';
// require __DIR__.'/vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
error_reporting(0);

if ($_POST['first-name']) {
    if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $confirmHeaders = 'From: noreply@mmi12f13.sae105.ovh' . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        $validMail = mail($from, 'Message envoyé', 'Nous avons bien reçu votre message, merci de nous contacter.' . "\r\n" . 'Cordialement' . "\r\n" . 'L\'équipe de New Who', $confirmHeaders);
        if ($validMail) {
            $first_name = $_POST['first-name'];
            $name = $_POST['name'];
            $from = $_POST['email'] ? $_POST['email'] : 'anonymous@xyz';
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $to = file_get_contents('config/email');
            $headers = 'From: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            $sent = mail($to, $subject, $message, $headers);

            $post = true;
        }

        $error = 'L\'adresse e-mail n\'est pas valide';
    }


    // $mail = new PHPMailer(true);
}

?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?= headGenerator('Contact', 'Me contacter', 'Contact', 'noindex, nofollow'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <h1>Contact</h1>
            <?php if ($sent && $post)
                echo '<p class=success>Message sent</p><br>';
            if (!$sent && $post)
                echo '<p class=error>Something went wrong</p><br>' ?>
                <!-- <p class='warning'>W.I.P.</p><br> -->
                <form method='post' action='traitements/envoi_mail.php'>
                    <div id='author'>
                        <div id='label'>
                            <label for='first-name'>Prénom : <span title="Champ obligatoire" class="help">*</span></label>
                            <label for='name'>Nom : <span title="Champ obligatoire" class="help">*</span></label>
                        </div>
                        <div id='input'>
                            <input type='text' name='first-name' id='first-name' placeholder='Jess' required>
                            <input type='text' name='name' id='name' placeholder='Doe' required>
                        </div>
                    </div>
                    <label for='email'>E-mail : <span title="Champ obligatoire" class="help">*</span></label>
                    <input type='email' name='email' id='email' placeholder='E-mail'>
                    <label for='subject'>Objet :</label>
                    <input type='text' name='subject' id='subject' placeholder='Objet (facultatif)'>
                    <br>
                    <label for='message'>Message : <span title="Champ obligatoire" class="help">*</span></label>
                    <textarea name='message' id='message' placeholder='Un magnifique message' required></textarea>

                    <button type='submit' name='submit'>
                        <svg id="before" xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                        </svg>
                        Envoyer
                        <svg id="after" xmlns="http://www.w3.org/2000/svg" fill="white"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                        </svg>
                    </button>
                </form>
            </section>
        </main>
    <?php require_once 'components/footer.php'; ?>

    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <script src='js/main.js'></script>
</body>

</html>