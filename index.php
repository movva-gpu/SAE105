<?php require_once __DIR__ . '/utils.php';
session_start();
error_reporting(0);
if (isset($_POST['watch-again'])) $watch_again = true; ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?= headGenerator('Russell T Davies - Fan Page', 'Une fan page de Russell T Davies', 'Accueil'); ?>
</head>

<body>
    <?php if (!$_SESSION['video_watched'] || $watch_again) {
        echo '
            <button id="unmute" onclick="unmute()" title="Activer le son">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 640 640" style="enable-background:new 0 0 640 640;" xml:space="preserve">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M334.6,74.2c12.8,5.8,21,18.4,21,32.4v426.7c0,14-8.2,26.7-21,32.4s-27.8,3.4-38.2-5.9L146.4,426.7H71.1C31.9,426.7,0,394.8,0,355.6v-71.1c0-39.2,31.9-71.1,71.1-71.1h75.3L296.3,80.1C306.8,70.8,321.8,68.6,334.6,74.2z M472.2,221.1l61.1,61.1l61.1-61.1c10.4-10.4,27.3-10.4,37.7,0c10.3,10.4,10.4,27.3,0,37.7L571,319.9l61.1,61.1c10.4,10.4,10.4,27.3,0,37.7c-10.4,10.3-27.3,10.4-37.7,0l-61.1-61.1l-61.1,61.1c-10.4,10.4-27.3,10.4-37.7,0c-10.3-10.4-10.4-27.3,0-37.7l61.1-61.1l-61.1-61.1c-10.4-10.4-10.4-27.3,0-37.7C445,210.8,461.9,210.7,472.2,221.1z" />
                </svg>
            </button>
            <button id="close" onclick="videoClose()" title="Fermer la vidéo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <button id="play" onclick="videoPlay()" title="Lecture">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" />
                </svg>
            </button>
            <video id="video" preload="auto" muted>
                <source src="assets/dw_logo_intro.mkv" type="video/mkv">
                <source src="assets/dw_logo_intro.mp4" type="video/mp4">
            </video>';
        $_SESSION['video_watched'] = true;
    } ?>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <form method="post" action="index.php">
                <button type="submit" id='watch-again' name="watch-again" title='Revoir la vidéo'>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M48.5 224H40c-13.3 0-24-10.7-24-24V72c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2L98.6 96.6c87.6-86.5 228.7-86.2 315.8 1c87.5 87.5 87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3c-62.2-62.2-162.7-62.5-225.3-1L185 183c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8H48.5z" />
                        </svg>
                        Revoir la vidéo
                    </p>
                </button>
            </form>
            <h1>Russell T Davies</h1>
            <h2>Un show-runner Doctor Who</h2>
            <img src='images/rtd.avif' alt='Photo of Russel T Davies'>
            <img class='dw' src='images/dw-cropped.avif' alt='Logo de Doctor Who (2023)'>
            <img class='bbc' src='images/bbc.avif' alt='Le logo de la BBC'>
            <p>
                Russell T Davies, de son vrai nom Stephen Russell Davies, né le 27 avril 1963, est un producteur de
                télévision
                et un écrivain gallois. Il est principalement connu pour être un pionnier de l'écriture de séries telles
                que
                Queer as Folk et The Second Coming, et pour être à l'origine du renouveau d'une des plus anciennes
                séries télévisées de science-fiction, Doctor Who, dont il a notamment créé les séries dérivées
                Torchwood et The Sarah Jane Adventures.
            </p>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src='js/main.js'></script>
</body>

</html>