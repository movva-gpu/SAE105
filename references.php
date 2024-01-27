<?php

error_reporting(0);

require_once 'utils.php';

require 'vendor/autoload.php';
use Michelf\Markdown;
$md_html = Markdown::defaultTransform(file_get_contents('CREDITS.md'));

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
            <?php echo $md_html; ?>
        </section>
    </main>

    <?php require_once 'components/footer.php' ?>

    <script src='js/main.js'></script>
</body>

</html>