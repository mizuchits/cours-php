<?php
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
    <a href="inscription.php">Inscription</a>

    <a href="add_film.php">Ajouter un film</a>

    <?php
    $request = $bdd->prepare('SELECT * FROM user');
    $request->execute([]);

    $request_film = $bdd->prepare('SELECT * FROM film ORDER BY id DESC LIMIT 3');
    $request_film->execute([]);

    while ($data_film = $request_film->fetch()) {
        echo '<p>' . $data_film['titre'] . ' ' . $data_film['realisateur'] . ' ' . $data_film['genre'] . ' ' . $data_film['duree'] . '</p>';
    }
    ?>
    <a href="list_film.php">afficher tout les film</a>
</body>
</html>