<?php

require_once 'utils.php';

error_reporting(0);

?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?php headGenerator('Contact', 'Me contacter', 'Contact'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <?php
            if (!empty($_GET['errors'])) {
                $errors = explode(',', $_GET['errors']);
                if ($_GET['errors'] != 'none') {
                    if (count($errors) > 1) $errors = array_slice($errors, 0, count($errors) - 1);
                    $new_array = [];
                    foreach ($errors as $error) {
                        if (!in_array($error, $new_array)) {
                            $new_array[] = $error;
                        }
                    }
                    $errors = $new_array;
                    echo '<p class="error">';
                    for ($i = 0; $i < count($errors); $i++) {
                        switch ($errors[$i]) {
                            case 'empty':
                                echo 'Vous devez remplir tous les champs obligatoires';
                                break;
                            case 'email':
                                echo 'Votre adresse e-mail est invalide';
                                break;
                            case 'not-sent':
                                echo 'Votre message n\'a pas été envoyé';
                                break;
                            default:
                                echo 'Une erreur inconnue est survenue';
                                break;
                        }
                        if ($i != count($errors) - 1) {
                            echo ',<br>';
                            continue;
                        }
                        echo '.';
                    }
                    echo '</p>';
                } else {
                    echo '<p class="success">Mail envoyé avec succès !</p>';
                }
            }
            ?>
            <h1>Contact</h1>
            <form id="contact" method='post' action='scripts/send_mail.php'>
                <div id='author'>
                    <div id='label'>
                        <label for='first-name'>Prénom&#160;: <span title="Champ obligatoire" class="help">*</span></label>
                        <label for='name'>Nom&#160;: <span title="Champ obligatoire" class="help">*</span></label>
                    </div>
                    <div id='input'>
                        <input type='text' name='first-name' id='first-name' placeholder='Jess' required>
                        <input type='text' name='name' id='name' placeholder='Doe' required>
                    </div>
                </div>
                <label for='email'>E-mail&#160;: <span title="Champ obligatoire" class="help">*</span></label>
                <input type='email' name='email' id='email' placeholder='E-mail'>

                <fieldset>
                    <legend>Objet&#160;: <span title="Champ obligatoire" class="help">*</span></legend>
                    <div>
                        <input type='radio' name='subject' id='info' value="info" checked required>
                        <label for='info'>Information</label>
                    </div>
                    <div>
                        <input type='radio' name='subject' id='devis' value="devis" required>
                        <label for='devis'>Demande de devis</label>
                    </div>
                    <div>
                        <input type='radio' name='subject' id='reclam' value="reclam" required>
                        <label for='reclam'>Réclamation</label>
                    </div>
                    <div>
                        <input type='radio' name='subject' id='other' value="other" required>
                        <label for='other'>Autre</label>
                    </div>

                    <div id='other-field' hidden>
                        <label for='other-subject'>Objet&#160;: <span title="Champ obligatoire" class="help">*</span></label>
                        <input type='text' name='other-subject' id='other-subject' placeholder='Objet'>
                    </div>
                </fieldset>

                <label for='message'>Message&#160;: <span title="Champ obligatoire" class="help">*</span></label>
                <textarea name='message' id='message' placeholder='Un magnifique message' required></textarea>

                <button type='submit' name='submit'>
                    <svg id="before" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                    </svg>
                    Envoyer
                    <svg id="after" xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                    </svg>
                </button>
            </form>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>

</body>

</html>