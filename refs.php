<?php

error_reporting(0);

require_once 'utils.php';

require 'vendor/autoload.php';

use Michelf\Markdown;

$md_html = Markdown::defaultTransform(file_get_contents('CREDITS.md'));

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php headGenerator('Références', 'Les références des images', 'références', 'noindex, nofollow'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>

    <main>
        <section>
            <?php echo $md_html; ?>
        </section>
    </main>

    <?php require_once 'components/footer.php' ?>

</body>

</html>