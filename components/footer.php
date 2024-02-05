<?php
error_reporting(0)
?>
<footer>
    <p>
        Sous license <a rel='nofollow' href='LICENSE' title='La license du projet'>
            <img height="12" src="https://cdn.simpleicons.org/creativecommons/555"/>
            MIT
        </a> • 
        Site créé par <a rel='me nofollow' href='https://piaille.fr/@danyella_strikann' title='Mon profil Mastodon'>
            <img height="12" src="https://cdn.simpleicons.org/mastodon/555"/>
            Danyella Strikann
        </a> • 
        <?php
        if (!str_contains($_SERVER['PHP_SELF'], 'refs.php')) {
            echo '<a href="../refs.php" title="Les références et les crédits du projet">Références</a> • ';
        }
        ?>
        <a href='https://github.com/movva-gpu/SAE105' title="Source du projet sur GitHub">
            <img height="12" src="https://cdn.simpleicons.org/github/555"/>
            Source
        </a>
    </p>
</footer>

<script src='https://code.jquery.com/jquery-3.7.0.js'></script>

<script src='https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js'></script>
<script src='https://cdn.datatables.net/plug-ins/1.13.7/sorting/date-euro.js'></script>
<script src='https://cdn.datatables.net/plug-ins/1.13.7/sorting/any-number.js'></script>

<script src='js/main.min.js' integrity="sha256-fcUbOOiPFxKgQ4b8+l62tX3ehloPgnkJbMfKnKLq6zQ= sha384-QFFdz+so7kf9tH3MhR6B3kB53597wNbGyn/ir9XCV/lXaw0d52KgGA5lvUNoTfDL sha512-T0K8J57bItY+gNDWl52aPsDxeetGN8YSbAudnS3iSQmvy3AVl09R04iBnE3qqZfqKWCfUD2O+BC2EB/aX50jGQ==" crossorigin="anonymous"></script>
