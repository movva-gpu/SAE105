<?php
error_reporting(0)
?>
<footer>
    <p>
        Sous license <a rel='nofollow' href='LICENSE' title='La license du projet'>
            <img height="12" width="12" alt="logo de Creative Commons" src="https://cdn.simpleicons.org/creativecommons/555">
            MIT
        </a> • 
        Site créé par <a rel='me nofollow' href='https://piaille.fr/@danyella_strikann' title='Mon profil Mastodon'>
            <img height="12" width="12" alt="Logo de Mastodon" src="https://cdn.simpleicons.org/mastodon/555">
            Danyella Strikann
        </a> • 
        <?php
        if (!str_contains($_SERVER['PHP_SELF'], 'refs.php')) {
            echo '<a href="../refs.php" title="Les références et les crédits du projet">Références</a> • ';
        }
        ?>
        <a href='https://github.com/movva-gpu/SAE105' title="Source du projet sur GitHub">
            <img height="12" width="12" title="Logo de Github" src="https://cdn.simpleicons.org/github/555">
            Source
        </a>
    </p>
</footer>

<script src='https://code.jquery.com/jquery-3.7.0.min.js'></script>

<?php
if (str_contains($_SERVER['PHP_SELF'], 'episodes.php')) echo '
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>' . "\n" .
    '<script src="https://cdn.datatables.net/plug-ins/1.13.7/sorting/date-euro.js"></script>' . "\n" .
    '<script src="https://cdn.datatables.net/plug-ins/1.13.7/sorting/any-number.min.js"></script>'
?>

<script src='js/main.min.js' crossorigin="anonymous" integrity="sha256-Xe867dV9rvEufCND/ojD0Ozdfx8ZVhEzyeA0dGOrCfo= sha384-1hvqK9Iw5wRCrdONAm29Z92fPb36PyGN/tPfE2A6fuQldVPM+xn5dgepjVJim/3l sha512-nH6qlXm0kYJdfzwM6Cj+cYvl69wVcrYyOjty3fNkYmAKelvbQG90n08yWknUkXqEKOvVNppcQ9pTeg4mZKHQug=="></script>
