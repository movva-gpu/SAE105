<?php

error_reporting(0);

$is_index_active = false;
$is_galerie_active = false;
$is_donnees_active = false;
$is_partenaires_active = false;
$is_contact_active = false;

$url = explode('/', $_SERVER['PHP_SELF']);
$url = $url[count($url) - 1];

switch ($url) {
    case 'index.php':
        $is_index_active = true;
        break;
    case 'galerie.php':
        $is_galerie_active = true;
        break;
    case 'donnees.php':
        $is_donnees_active = true;
        break;
    case 'partenaires.php':
        $is_partenaires_active = true;
        break;
    case 'contact.php':
        $is_contact_active = true;
        break;

    default:
        $is_index_active = true;
        break;
}

if ($is_index_active)
    $index_class = 'active';
if ($is_galerie_active)
    $galerie_class = 'active';
if ($is_donnees_active)
    $donnees_class = 'active';
if ($is_partenaires_active)
    $partenaires_class = 'active';
if ($is_contact_active)
    $contact_class = 'active';
?>

<header>
    <a href='.' title='Accueil' class='no-decoration '>
        </a>
    <nav>
        <h2>R.T.D.</h2>
        <ul>
            <li><a class='<?= $index_class ?>' href='.' title='Accueil'>Accueil</a></li>
            <li><a class='<?= $galerie_class ?>' href='galerie.php' title='Galerie'>Galerie</a></li>
            <li><a class='<?= $donnees_class ?>' href='donnees.php' title='Episodes écrits par RTD'>Données</a></li>
            <li><a class='<?= $partenaires_class ?>' href='partenaires.php' title='Mes partenaires'>Partenaires</a></li>
            <li><a class='<?= $contact_class ?>' href='contact.php' title='Me contacter'>Contact</a></li>
        </ul>
    </nav>
</header>