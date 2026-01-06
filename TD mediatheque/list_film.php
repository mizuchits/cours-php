<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $request_film = $bdd->prepare('SELECT * FROM film');
    $request_film->execute([]);

    while ($data_film = $request_film->fetch()) {
        echo '<p>' . $data_film['titre'] . ' ' . $data_film['realisateur'] . ' ' . $data_film['genre'] . ' ' . $data_film['duree'] . '</p>';
        if (!file_exists('film/' . $data_film['titre'] . '.php')) {
            touch('film/' . $data_film['titre'] . '.php');
            file_put_contents(
                'film/' . $data_film['titre'] . '.php',
                '<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");
$titre = $_GET["titre"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?></title>
</head>
<body>

<?php
echo "<h1>" . $titre . "</h1>";

$request_film = $bdd->prepare("SELECT * FROM film WHERE titre = \'".$titre."\'");
$request_film->execute();

while ($data_film = $request_film->fetch()) {
    echo "<p>" . $data_film[\'synopsis\'] . "</p>";
}
?>

</body>
</html>'
            );

        } elseif (file_exists('film/' . $data_film['titre'] . '.php')) {

        }
        echo '<a href="./film/' . $data_film['titre'] . '.php?titre=' . $data_film['titre'] . '">test</a>';
    }

    ?>

</body>

</html>