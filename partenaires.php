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
                        <small>Secrétaire et développeuse à temps partiel</small>
                        <p>
                        Salut ! Moi c'est Eugénie, jai 19 ans et je suis la secrétaire de l'entreprise et, en même temps, développeuse à temps partiel. J'ai choisi de travailler pour l'association qui parle des vocaloids. C'est un univers que j'ai toujours aimé depuis très jeune et j'espère leur avoir fait justice avec ce site.
                        </p>
                    </div>
                </div>
                <div id="noam" class="jojo partners">
                    <div class="background"><img src="images/partners/noam_color.png"></div>
                    <div class="content">
                        <h2>Noam Brodeur<span class="no-bg">🐵</span></h2>
                        <small>Responsable graphique et éditorial</small>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione nisi dignissimos iusto maiores recusandae id, quos debitis, temporibus tenetur aliquid explicabo mollitia illum porro veniam vero nobis numquam sapiente voluptas.
                        </p>
                    </div>
                </div>
                <div class="gunter partners">
                    <img src="images/partners/gunter.png">
                    <div class="content">
                        <h2>Pierre Dufort</h2>
                        <small>Chef de projet</small>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero atque, ratione aspernatur laborum quod quisquam repellendus dolorem quam fugit natus earum modi esse laudantium voluptatibus id beatae dolor rem quidem.
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