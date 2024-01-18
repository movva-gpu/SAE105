<!DOCTYPE html>
<html lang='zxx'>

<head>
    <title>Galerie</title>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='La gallerie des saisons de RTD'>
    <meta name='author' content='Danyella Strikann'>
    <meta name='keywords' content='Russell T Davies, Doctor Who, BBC, Fan Page, RTD, RT Davies, R.T.D., Galerie'>
    <meta name='robots' content='index, follow'>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src='js/main.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
</head>

<body>
    <?php require_once('components/header.php'); ?>
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
    <?php require_once('components/footer.php'); ?>
</body>

</html>