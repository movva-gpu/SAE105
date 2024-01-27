<?php require_once __DIR__ . '/utils.php';
error_reporting(0); ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <?= headGenerator('Galerie', 'La gallerie des saisons de RTD', 'Galerie'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <h1>Galerie</h1>
            <div id='gallery'>
                <?php
                $gallery_path = 'images/galerie/';
                $gallery_files = scandir($gallery_path);
                array_multisort($gallery_files);
                while ($file = array_shift($gallery_files)) {
                    if ($file == '.' || $file == '..' || $file == 'alt')
                        continue;
                    $file_name = explode('.', $file)[0];
                    echo '<img height=260 src=' . $gallery_path . $file .
                        ' alt="' . file_get_contents($gallery_path . 'alt/' . $file_name . '.txt') .
                        '" title="' . file_get_contents($gallery_path . 'alt/' . $file_name . '.txt') . '">';
                }
                ?>
            </div>
        </section>
        <section id='upload'>
            <?php
            if (!empty($_GET['errors'])) {
                $errors = explode(',', $_GET['errors']);
                if ($_GET['errors'] != 'none') {
                    if (count($errors) > 1) $errors = array_slice($errors, 0, count($errors) - 1);
                    $new_array = [];
                    foreach ($errors as $error) {
                        if (!in_array($error, $new_array)) {
                            $new_array[] = $error;
                        }
                    }
                    $errors = $new_array;
                    echo '<p class="error">';
                    for ($i = 0; $i < count($errors); $i++) {
                        switch ($errors[$i]) {
                            case 'empty':
                                echo 'Vous devez mettre un texte alternatif';
                                break;
                            case 'empty_image':
                                echo 'Vous devez mettre une image';
                                break;
                            case 'file_move':
                            case 'file_error':
                                echo 'Une erreur est survenue lors du téléchargement de l\'image';
                                break;
                            case 'file_type':
                                echo 'Le type de l\'image n\'est pas supporté';
                                break;
                            case 'file_size':
                                echo 'La taille de l\'image est supérieure à 500 Ko';
                                break;
                            default:
                                echo 'Une erreur inconnue est survenue';
                                break;
                        }
                        if ($i != count($errors) - 1) {
                            echo ',<br>';
                            continue;
                        }
                        echo '.';
                    }
                    echo '</p>';
                } else {
                    echo '<p class="success">Image transférée avec succès !</p>';
                }
            }
            ?>
            <h1>Ajouter une image</h1>
            <form id='upload-form' action='traitements/upload_image.php' method='post' enctype='multipart/form-data'>
                <label for='alt'>Text alternatif : <span title="Champ obligatoire" class="help">*</span></label>
                <input type='text' name='alt' id='alt' placeholder='Le 13ème docteur' required>
                <label for='title'>Image en format <a href='https://github.com/AOMediaCodec/av1-avif' title='En apprendre plus sur le format AV1' target='_blank'>.avif</a>, <a href='https://developers.google.com/speed/webp?hl=fr' title='En apprendre plus sur le WebP' target='_blank'>.webp</a> ou <a href="https://jpeg.org/jpeg/" title="En apprendre plus sur le JPEG" target="_blank">.jpeg</a>/<a href="https://jpeg.org/jpeg/" title="En apprendre plus sur le JPEG" target="_blank">.jpg</a> : <span title="Champ obligatoire" class='help'>*</span></label>
                <input type='file' name='image' required accept='image/avif, image/webp, image/jpeg'>
                <button type='submit'>
                    <svg id="before" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                    </svg>
                    Ajouter
                    <svg id="after" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                    </svg>
                </button>
            </form>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src='js/main.js'></script>
</body>

</html>