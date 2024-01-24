<?php require_once __DIR__ . '/utils.php' ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?= headGenerator('Russell T Davies - Fan Page', 'Une fan page de Russell T Davies', 'Accueil'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
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