<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/styles.css" rel="stylesheet" type="text/css">
    <title>Application Pokémon - <?= $title_part ?></title>
</head>
<body>
    <header>
        <table>
                <tr>
                    <?php
                    if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]=== "on") $url = "https";
                    else $url = "http";
                    $url .= "://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"];
                    ?>
                    <td><a href="<?= $url ?>">Accueil</a></td>
                    <td><a href="<?= $url ?>?action=test">Test</a></td>
                    <td><a href="<?= $url ?>?action=modifyPokemon">Modifier Pokémon</a></td>
                    <td><a href="<?= $url ?>?action=historique">Historisation</a></td>
                    <td><a href="<?= $url ?>?action=printPokemon">Afficher Pokémon</a></td>
                </tr>
        </table>
    </header>
    <div id="content">
        <?= $content ?>
    </div>
    <footer>
        <table>
            <tr>
                <td>Licence 3 Informatique</td>
                <td><?php echo date("d-m-Y  H:i:s");?></td>
            </tr>
        </table>
    </footer>
</body>
</html>