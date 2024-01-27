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
            <h1>Références</h1>
                <h2>Photos de la page Accueil</h2>
            <ul>
                <li><a href="https://www.theguardian.com/media/2013/nov/19/russell-t-davies-gay-life-channel-4">La photo de RTD</a></li>
                <li><a href="https://commons.wikimedia.org/wiki/File:Doctor_Who_Logo_2023.svg">Le logo de Doctor Who 2023</a>, sous license <a href="https://creativecommons.org/">Creative Commons</a></li>
                <li><a href="https://en.wikipedia.org/wiki/Logo_of_the_BBC">Le logo de la BBC, sous license Creative Commons</a></li>
            </ul>
                <h2>Photos de la page Galerie</h2>
            <ul>
                <li><a href="https://en.wikipedia.org/wiki/File:Ninth_Doctor_(Doctor_Who).jpg">Photo du neuvième Docteur</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Tenth_Doctor_(Doctor_Who).jpg">Photo du dixième</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Fourteenth_Doctor_(Doctor_Who).jpg">Photo du quatorzième</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Fifteenth_Doctor_(Doctor_Who).jpg">Photo du quinzième</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Donna_Noble.jpg">Photo de Donna Noble, acolyte du 10ème et du 14ème Docteur</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Rose_Tyler.jpg">Photo de Rose Tyler, acolyte du 9ème et du 10ème</a></li>
                <li><a href="https://en.wikipedia.org/wiki/File:Ruby_Sunday.jpg">Photo de Ruby Sunday, acolyte du 15ème</a></li>
                <li><a href="https://commons.wikimedia.org/wiki/File:TARDIS1.jpg">Photo du TARDIS de 2008</a>, sous license <a href="https://www.gnu.org/licenses/gpl-3.0.en.html">GPL</a></li>
            </ul>
        </section>
    </main>

    <?php require_once 'components/footer.php' ?>

    <script src='js/main.js'></script>
</body>

</html>