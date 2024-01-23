<?php

/** requireHeader - Echo the header */
function requireHeader(): void
{
    echo require_once('components/header.php');
}
/** requireFooter - Echo the footer */
function requireFooter(): void
{
    echo require_once('components/footer.php');
}
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
function headGenerator($title, $description, $additional_keywords, $robots = "index, follow"): void
{
    echo '<title>' . $title . '</title>' . "\n" .
        '<meta charset="UTF-8">' .
        '<meta http-equiv="X-UA-Compatible content="IE=edge"' . "\n" .
        '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n" .
        '<meta name="description" content="' . $description . '">' . "\n" .
        '<meta name="keywords" content="Russell T Davies,Doctor Who,BBC,Fan Page,RTD,RT Davies,R.T.D.,' . $additional_keywords . '">' . "\n" .
        '<meta name="author" content="Danyella Strikann">' . "\n" .
        '<meta name="robots" content="' . $robots . '">' . "\n" .
        '<link rel="stylesheet" type="text/css" media="screen" href="css/styles.css">' . "\n";
}
