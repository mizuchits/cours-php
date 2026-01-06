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
    <form action="add_film.php" method="POST">
        <label for="titre">titre</label>
        <input type="text" name="titre">
        <label for="realisateur">réalisateur</label>
        <input type="text" name="realisateur">
        <label for="genre">genre</label>
        <input type="text" name="genre">
        <label for="duree">durée</label>
        <input type="text" name="duree">
        <label for="synopsis">synopsis</label>
        <input type="text" name="synopsis">
        <input type="submit">
    </form>

    <?php 
    if (!empty($_POST['titre']) && ($_POST['realisateur']) && ($_POST['genre']) && ($_POST['duree']) && ($_POST['synopsis'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $synopsis = $_POST['synopsis'];

        $request_insert = $bdd->prepare('INSERT INTO film(titre, realisateur, genre, duree, synopsis) VALUES(?,?,?,?,?)');
        $data_insert = $request_insert->execute(array($titre, $realisateur, $genre, $duree, $synopsis));
        header('location:index.php');
    }
    ?>
</body>
</html>