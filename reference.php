<?php

error_reporting(0);

require_once 'utils.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= headGenerator('Références', 'Les références des images', 'références', 'noindex, nofollow'); ?>
</head>
<body>
    <header>
        <a href="<?= $_GET['url']; ?>">← Retour</a>
    </header>

    <main>
        <section>
            <p>
                All photos are open source :
                    <ul>
                        <li>All pictures in the index are in under public licences</li>
                        <li>Pictures in galerie.php are from Qwant, searching strictly public domain pictures.</li>
                    </ul>
            </p>
        </section>
    </main>

    <?php require_once 'components/footer.php' ?>

    <script src='js/main.js'></script>
</body>
</html>