<?php require_once __DIR__ . '/utils.php' ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?= headGenerator('Partenaires', 'Nos partenaires', 'Partenaires', 'noindex, nofollow'); ?>
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
                    <div class="background"><img src="images/partners/dan_color.png"></div>
                    <div class="content">
                        <h2>Danyella Strikann<span class="no-bg">✨</span><span class="me">(moi)</span></h2>
                        <small>Développeuse Full-Stack du projet</small>
                        <p>
                            Salut moi c'est Danyella et ce beau site là, c'est moi qui l'ai fait !
                        </p>
                    </div>
                </div>
                <div id="eug" class="jojo partners">
                    <div class="background"><img src="images/partners/eug_color.png"></div>
                    <div class="content">
                        <h2>Eugénie Podevin<span class="no-bg">🩷</span></h2>
                        <small>Secrétaire</small>
                        <p>
                            Salut moi c'est Danyella et ce beau site là, c'est moi qui l'ai fait !
                        </p>
                    </div>
                </div>
                <div id="noam" class="jojo partners">
                    <div class="background"><img src="images/partners/noam_color.png"></div>
                    <div class="content">
                        <h2>Noam Brodeur<span class="no-bg">🐵</span></h2>
                        <small>Responsable graphique et éditorial</small>
                        <p>
                            Salut moi c'est Danyella et ce beau site là, c'est moi qui l'ai fait !
                        </p>
                    </div>
                </div>
                <div class="gunter partners">
                    <img src="images/partners/gunter.png">
                    <div class="content">
                        <h2>Pierre Dufort (a.k.a. Gunter)</h2>
                        <small>Chef de projet et Gunter de service</small>
                        <p>
                            Salut moi c'est Danyella et ce beau site là, c'est moi qui l'ai fait !
                        </p>
                    </div>
                </div>
            </div>
            <div id="buttons-container">
                <a class="part-btn" id="chart-btn" href="docs/charte-projet.pdf">Voir/Télécharger la charte de projet</a>
                <a class="part-btn" id="plan-btn" href="docs/plan-projet.pdf">Voir/Télécharger le plan de projet</a>
            </div>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>