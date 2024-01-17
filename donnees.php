<!DOCTYPE html>
<html lang='zxx'>
<head>
    <title>Données</title>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.7/sorting/date-euro.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.7/sorting/any-number.js"></script>
    <script src='js/main.js'></script>

    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>
</head>
<body>
    <?php require_once('components/header.php'); ?>
    <main>
        <article>
            <h1>Données - Episodes de R.T.D.</h1>
            <table id='datatable'>
                <thead>
                    <tr scope='col'>
                        <th>Titre</th>
                        <th>Première diffusion</th>
                        <th>Docteur</th>
                        <th>Compagnon·s ou Compagne·s</th>
                        <th>Saison</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $data_file = file_get_contents('datas/data.json');
                    $data_json = json_decode($data_file, true);
                    foreach ($data_json as $keyY => $episode) {
                        echo '<tr>';
                        foreach ($episode as $keyX => $value) {
                            switch ($keyX) {
                                case 'series':
                                    if ($value !== '-------') { echo '<td class='.$keyX.'>'.$value."</td>\n"; break; }
                                    echo '<td class="help '.$keyX.'" title="Cet épisode n\'appartient à aucune série.">'.$value."</th>\n";
                                    break;
                                case 'companion':
                                    if ($value !== '-------') { echo '<td class='.$keyX.'>'.$value."</td>\n"; break; }
                                    echo '<td class="help '.$keyX.'" title="Cet épisode se déroule avec le Docteur seul et/ou seulement des personnages secondaires.">'.$value."</th>\n";
                                    break;
                                
                                case 'title':
                                    echo '<th scope=row class='.$keyX.'>'.$value."</th>\n";
                                    break;

                                default:
                                    echo '<td class='.$keyX.'>'.$value."</td>\n";
                                    break;
                                    
                            }
                        }
                        echo "</tr>\n";
                    }
                ?>
                </tbody>
            </table>
            <p class="help" title='Dans le cadre de la SAE, certains épisodes rédigé par Chris Chibnall ont été inclus.'>Certains des épisodes ne sont pas réellement écrits par Russell T Davis et certaines dates peuvent être légèrement décalées</p>
        </article>
    </main>
    <?php require_once('components/footer.php');?>
</body>
</html>