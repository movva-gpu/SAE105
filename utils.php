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
function headGenerator($title, $description, $additional_keywords, $robots = "index, follow"): string
{
    return '<title>' . $title . '</title>' . "\n" .
        '<meta charset="UTF-8">' . "\n" .
        '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\n" .
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n" .
        '<meta name="description" content="' . $description . '">' . "\n" .
        '<meta name="keywords" content="Russell T Davies,Doctor Who,BBC,Fan Page,RTD,RT Davies,R.T.D.,' . $additional_keywords . '">' . "\n" .
        '<meta name="author" content="Danyella Strikann">' . "\n" .
        '<meta name="robots" content="' . $robots . '">' . "\n" .
        '<link rel="stylesheet" type="text/css" media="screen" href="css/styles.min.css" integrity="sha256-RMISnWr29QZGsFcBE/2lZnHUhtvXWpDytIdOuvxuPtA= sha384-Zgrx648aN1zsOvJ05KDMACCaExuGOshE424e3XPGPNqbwckpCLqyjWqEF/AXi9Ze sha512-req6RX+7eqjPylBJ6ffR93F0js3ao2Pf6+LI9JF+l/MtPvf76M5yLeY2jAANrr4ty6aXQnOHNCF35lljYy9YZQ==" crossorigin="anonymous">' . "\n" .
        '<script src="https://kit.fontawesome.com/97cad273f1.js" crossorigin="anonymous"></script>' . "\n";
}
