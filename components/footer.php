<?php
    error_reporting(0)
?>
<footer>
    <p>
        Sous license <a rel='nofollow' href='LICENSE' title='La license du projet'>MIT</a> • Site créé par <a rel='me nofollow' href='https://piaille.fr/@danyella_strikann' title='Mon profil Mastodon'>Danyella Strikann</a> •
        <?php
        if (!str_contains($_SERVER['PHP_SELF'], 'references.php')) {
            echo '<a href="../references.php?url=' . $_SERVER['PHP_SELF'] . '">Références</a> • '; 
        }
        ?>
        <a href='https://github.com/movva-gpu/SAE105'>Source</a>
    </p>
</footer>