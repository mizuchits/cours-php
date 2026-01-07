<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");
if (empty($_SESSION[('id')])) {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="add_film.php" method="POST" enctype="multipart/form-data">
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
        <input type="file" name="image" id="image">
        <input type="submit">
    </form>

    <?php

    if (!empty($_FILES['image']['name'])) {
        $fichier = $_FILES['image'];
        $typesAutorises = ['image/jpeg', 'image/png'];

        if (in_array($fichier['type'], $typesAutorises)) {
            $nomUnique = uniqid() . '_' . $fichier['name'];
            $destination = 'upload/' . $nomUnique;

            if (!file_exists('upload')) {
                mkdir('upload');
            }

            move_uploaded_file($fichier['tmp_name'], $destination);
            echo '<img src="' . $destination . '" width="300">';
        } else {
            echo "le fichier n'est pas compatible";
        }
    }
    if (!empty($_POST['titre']) && ($_POST['realisateur']) && ($_POST['genre']) && ($_POST['duree']) && ($_POST['synopsis'])) {

        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $synopsis = $_POST['synopsis'];

        $request_insert = $bdd->prepare('INSERT INTO film(titre, realisateur, genre, duree, synopsis, user_id, affiche) VALUES(?,?,?,?,?,?,?)');
        $data_insert = $request_insert->execute(array($titre, $realisateur, $genre, $duree, $synopsis, $_SESSION['id'], $destination));
        header('location:index.php');
    }
    ?>
</body>

</html>