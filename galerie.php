<?php require_once __DIR__ . '/utils.php' ?>
<!DOCTYPE html>
<html lang='fr'>

<head><?= headGenerator('Galerie', 'La gallerie des saisons de RTD', 'Galerie'); ?></head>

<body>
    <?= requireHeader(); ?>
    <main>
        <article>
            <h1>Galerie</h1>
            <div id='gallery'>
                <?php
                $gallery_path = 'images/galerie/';
                $gallery_folder = opendir($gallery_path);
                while (($file = readdir($gallery_folder)) !== false) {
                    if ($file == '.' || $file == '..' || $file == 'alt' || $file == 'lowres') continue;
                    $file_name = explode('.', $file)[0];
                    echo '<img height=380 src=' . $gallery_path . $file .
                        ' alt="' . file_get_contents($gallery_path . 'alt/' . $file_name . '.txt') .
                        '" title="' . file_get_contents($gallery_path . 'alt/' . $file_name . '.txt') . '"' .
                        ' style="background-image: url(\'' . $gallery_path . 'lowres/' . $file . '\'); ' .
                        'background-size: cover">';
                }
                ?>
            </div>
        </article>
    </main>
    <?= requireFooter(); ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src='js/main.js'></script>
</body>

</html>