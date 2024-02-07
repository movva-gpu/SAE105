<?php require_once __DIR__ . '/utils.php' ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?php headGenerator('Partenaires', 'Nos partenaires', '< class="title">Partenaires'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <h1>Partenaires</h1>
            <p class="intro">
                Nous sommes Shining Head, une entreprise visant à promouvoir la culture, notamment
                au travers d'associations existantes comme New Who.
            </p>
            <div id="partners-container">
                <div id="dan" class="jojo partners">
                    <div class="background"><img alt="Photograpgie de Danyella avec un filtre dans le style de Jojo Bizarre Adventure" src="assets/images/partners/dan_color.avif"></div>
                    <div class="content">
                        <h2><span class="title">Danyella Strikann</span><span class="emoji">&#9786;</span><span class="me">(moi)</span></h2>
                        <small>Développeuse Full-Stack du projet</small>
                        <p>
                            Salut moi c'est Danyella et ce beau site là, c'est moi qui l'ai fait !
                        </p>
                    </div>
                </div>
                <div id="eug" class="jojo partners">
                    <div class="background"><img alt="Photographie d'Eugénie avec un filtre dans le style de Jojo Bizarre Adventure" src="assets/images/partners/eug_color.avif"></div>
                    <div class="content">
                        <h2><span class="title">Eugénie Podevin</span><span class="emoji">&#9786;</span></h2>
                        <small>Secrétaire et développeuse à temps partiel</small>
                        <p>
                            Salut ! Moi c'est Eugénie, j'ai 19 ans et je suis la secrétaire de l'entreprise et, en même temps, développeuse à temps partiel. J'ai choisi de travailler pour l'association qui parle des vocaloids. 
                            <br><br>
                            C'est un univers que j'ai toujours aimé depuis très jeune et j'espère leur avoir fait justice avec ce site.
                            <br><br>
                            <a rel="external nofollow" href="http://mmi23e12.sae105.ovh/">Mon site sur les Vocaloids</a>
                        </p>
                    </div>
                </div>
                <div id="noam" class="jojo partners">
                    <div class="background"><img alt="Photographie de Noam avec un filtre dans le style de Jojo Bizarre Adventure" src="assets/images/partners/noam_color.avif"></div>
                    <div class="content">
                        <h2><span class="title">Noam Brodeur</span><span class="emoji">&#9786;</span></h2>
                        <small>Responsable graphique et éditorial</small>
                        <p>
                            Je m'appelle Noam, je suis le responsable éditorial et graphique du projet. Sur mon site tu vas pouvoir découvrir CinéTalk. 
                            <br><br>
                            Qu'est ce que c'est ? C'est une émission mensuelle sur le cinéma, sur ce site tu vas pouvoir trouver les films indispensable à voir ou à revoir.
                            <br><br>
                            <a rel="external nofollow" href="http://mmi23e03.sae105.ovh/">Le site de CinéTalk</a>
                        </p>
                    </div>
                </div>
                <div class="gunter partners">
                    <img alt="Photographie de Pierre" src="assets/images/partners/gunter.avif">
                    <div class="content">
                        <h2><span class="title">Pierre Dufort</span></h2>
                        <small>Chef de projet</small>
                        <p>
                            Salut, je me présente Pierre, 18 ans, chef de projet de l'entreprise et aussi développeur. J'ai choisi de faire mon site sur le rugby car c'est mon sport préféré, j'en ai pratiqué durant 7 ans et je suis fier de pouvoir contribuer à la promotion de ce sport
                            <br><br>
                            <a rel="external nofollow" href="http://mmi23e05.sae105.ovh/">Mon site sur le Rugby</a>
                        </p>
                    </div>
                </div>
            </div>
            <div id="buttons-container">
                <a class="part-btn" id="chart-btn" href="pdf/charte-projet.pdf">Voir/Télécharger la charte de projet</a>
                <a class="part-btn" id="plan-btn" href="pdf/plan-projet.pdf">Voir/Télécharger le plan de projet</a>
            </div>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>