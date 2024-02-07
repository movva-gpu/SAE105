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
    case 'gallery.php':
        $is_galerie_active = true;
        break;
    case 'episodes.php':
        $is_donnees_active = true;
        break;
    case 'partners.php':
        $is_partenaires_active = true;
        break;
    case 'contact.php':
        $is_contact_active = true;
        break;
    case 'refs.php':
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
        <h2><a href='.'>R.T.D.</a></h2>
        <ul class="large">
            <li><a class='<?= $index_class ?>' href='.' title='Accueil'>Accueil</a></li>
            <li><a class='<?= $galerie_class ?>' href='gallery.php' title='Galerie'>Galerie</a></li>
            <li><a class='<?= $donnees_class ?>' href='episodes.php' title='Episodes écrits par RTD'>Données</a></li>
            <li><a class='<?= $partenaires_class ?>' href='partners.php' title='Mes partenaires'>Partenaires</a></li>
            <li><a class='<?= $contact_class ?>' href='contact.php' title='Me contacter'>Contact</a></li>
        </ul>
        <details>
            <summary><i class="fa-solid fa-bars"></i></summary>
            <ul class="small">
                <li><a class='<?= $index_class ?>' href='.' title='Accueil'>Accueil</a></li>
                <li><a class='<?= $galerie_class ?>' href='gallery.php' title='Galerie'>Galerie</a></li>
                <li><a class='<?= $donnees_class ?>' href='episodes.php' title='Episodes écrits par RTD'>Données</a></li>
                <li><a class='<?= $partenaires_class ?>' href='partners.php' title='Mes partenaires'>Partenaires</a></li>
                <li><a class='<?= $contact_class ?>' href='contact.php' title='Me contacter'>Contact</a></li>
            </ul>
        </details>
    </nav>
</header>