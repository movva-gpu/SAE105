<?php require_once 'utils.php' ?>
<!DOCTYPE html>
<html lang='fr'>

<head>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css'>
    <?php echo headGenerator('Données', 'Les épisodes de R.T.D.', 'Données,Episodes,Saisons', 'noindex, nofollow'); ?>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <main>
        <section>
            <h1>Données - Episodes de R.T.D.</h1>
            <table id='datatable'>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th scope='col'>Première diffusion</th>
                        <th scope='col'>Docteur</th>
                        <th scope='col'>Compagnon·s ou Compagne·s</th>
                        <th scope='col'>Saison</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data_file = file_get_contents('data/data.json');
                    $data_json = json_decode($data_file, true);
                    foreach ($data_json as $keyY => $episode) {
                        echo '<tr>';
                        foreach ($episode as $keyX => $value) {
                            switch ($keyX) {
                                case 'series':
                                    if ($value !== '-------') {
                                        echo '<td class=' . $keyX . '>' . $value . "</td>\n";
                                        break;
                                    }
                                    echo '<td class="help ' . $keyX . '" title="Cet épisode n\'appartient à aucune série.">' . $value . "</td>\n";
                                    break;
                                case 'companion':
                                    if ($value !== '-------') {
                                        echo '<td class=' . $keyX . '>' . $value . "</td>\n";
                                        break;
                                    }
                                    echo '<td class="help ' . $keyX . '" title="Cet épisode se déroule avec le Docteur seul et/ou seulement des personnages secondaires.">' . $value . "</td>\n";
                                    break;

                                case 'title':
                                    echo '<th scope=row class=' . $keyX . '>' . $value . "</th>\n";
                                    break;

                                default:
                                    echo '<td class=' . $keyX . '>' . $value . "</td>\n";
                                    break;
                            }
                        }
                        echo "</tr>\n";
                    }
                    ?>
                </tbody>
            </table>
            <p class="help" title='Dans le cadre de la SAE, certains épisodes rédigé par Chris Chibnall ont été inclus.'>Certains
                des épisodes ne sont pas réellement écrits par Russell T Davis et certaines dates peuvent être
                légèrement décalées</p>
        </section>
    </main>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>