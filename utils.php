<?php

/**
 * headGenerator - Echo HTML head section for a webpage with meta tags, title, and stylesheet link.
 *
 * @param string $title - The title of the webpage.
 * @param string $description - The description of the webpage for search engines.
 * @param string $additional_keywords - Additional keywords to include in the meta keywords tag.
 * @param string $robots - The robots meta tag value (default is "index, follow").
 *
 * @return string - The generated HTML head section.
 */
function headGenerator($title, $description, $additional_keywords, $robots = "index, follow", $color = "#ffffff") {
    echo '<title>' . $title . '</title>' . "\n" .
        '<meta charset="UTF-8">' . "\n" .
        '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n" .
        '<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">' . "\n" .

        '<meta name="description" content="' . $description . '">' . "\n" .
        '<meta name="keywords" content="Russell T Davies,Doctor Who,BBC,Fan Page,RTD,RT Davies,R.T.D.,' . $additional_keywords . '">' . "\n" .
        '<meta name="author" content="Danyella Strikann">' . "\n" .
        '<meta name="robots" content="' . $robots . '">' . "\n" .

        '<meta property="og:type" content="website">' . "\n" .
        '<meta property="og:title" content="' . $title . '">' . "\n" .
        '<meta property="og:url" content="http://mmi23f13.sae105.ovh' . $_SERVER['PHP_SELF'] . '">' . "\n" .
        '<meta property="og:image" content="http://mmi23f13.sae105.ovh/assets/images/opengraph.jpg">' . "\n" .
        '<meta property="og:description" content="' . $description . '">' . "\n" .
        '<meta name="theme-color" content="' . $color . '">' . "\n" .

        '<link rel="stylesheet" type="text/css" media="screen" href="css/styles.min.css" crossorigin="anonymous">' . "\n" .

        '<script src="https://kit.fontawesome.com/97cad273f1.js" crossorigin="anonymous"></script>' . "\n";
}
