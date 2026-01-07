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
        if (!empty($data_film['affiche'])) {
            echo '<img src="'.$data_film['affiche'].'" alt="'.$data_film['titre'].'">';

        }
        
        if ($_SESSION['id'] == $data_film['user_id']) {
        echo'<a href="edit_film.php?user_id='.$_SESSION['id'].'&id='.$data_film['id'].'">Modifier </a>';
        echo'<a href="delete_film.php?user_id='.$_SESSION['id'].'&id='.$data_film['id'].'">Suppprimer </a>';
        }
        echo '<a href="voirplus.php?id='.$data_film['id'].'">Voir plus </a>';
    }
    ?>
</body>

</html>