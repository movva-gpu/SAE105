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
                <i class="fa-solid fa-volume-xmark"></i>
            </button>
            <button id="close" onclick="videoClose()" title="Fermer la vidéo">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <button id="play" onclick="videoPlay()" title="Lecture">
                <i class="fa-solid fa-play"></i>
            </button>
            <video id="video" preload="auto" muted>
                <source src="assets/videos/dw_logo_intro.webm" type="video/webm">
            </video>';
        $_SESSION['video_watched'] = true;
    } ?>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <form method="post" action=".">
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
            <img src='assets/images/rtd.avif' alt='Photo of Russel T Davies'>
            <img class='dw' src='assets/images/dw-cropped.avif' alt='Logo de Doctor Who (2023)'>
            <img class='bbc' src='assets/images/bbc.avif' alt='Le logo de la BBC'>
            <p class="p">
                Russell T Davies, de son vrai nom Stephen Russell Davies, né le 27 avril 1963, est un producteur de
                télévision et un écrivain gallois.
                Il est principalement connu pour être un pionnier de l'écriture de séries telles que
                Queer as Folk et The Second Coming, et pour être à l'origine du renouveau d'une des plus anciennes
                séries télévisées de science-fiction, Doctor Who, dont il a notamment créé les séries dérivées
                Torchwood et The Sarah Jane Adventures.
                <br><br>
                En parlant de Doctor Who, il est incontestablement considéré comme le meilleur show-runner de Doctor
                Who. De plus, il est de retour pour une nouvelle saison avec le 15e docteur&#160;:
                <a rel="external nofollow" href="https://fr.wikipedia.org/wiki/Ncuti_Gatwa">Ncuti Gatwa</a>.
                <br><br>
                Il a aussi rédigé les trois épisodes spéciaux des 60 ans de la série ainsi que l'épisode de Noël.
            </p>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>