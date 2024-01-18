<!DOCTYPE html>
<html lang='zxx'>
<head>
    <title>Galerie</title>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src='js/main.js'></script>
    
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
</head>
<body>
    <?php require_once('components/header.php');?>
    <main>
        <article>
            <h1>Galerie</h1>
            <div id='gallery'>
            <?php
                $gallery_path = 'images/galerie/';
                $gallery_folder = opendir($gallery_path);
                while (($file = readdir($gallery_folder))!== false) {
                    if ($file == '.' || $file == '..' || $file == 'alt') continue;
                    echo '<img src='.$gallery_path.$file.
                    ' alt="'.file_get_contents($gallery_path.'alt/'.$file.'.txt').
                    '" title="'.file_get_contents($gallery_path.'alt/'.$file.'.txt').'">';
                }
            ?>
            </div>
        </article>
    </main>
    <?php require_once('components/footer.php');?>
</body>
</html>