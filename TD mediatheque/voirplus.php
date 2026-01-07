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
    $request = $bdd->prepare('SELECT * FROM film WHERE id = '.$_GET['id'].'');
    $request->execute([]);

    while ($data = $request->fetch()) {
        echo '<h1>'.$data['titre'].'</h1>';
        if (!empty($data['affiche'])) {
            echo '<img src="'.$data['affiche'].'" alt="'.$data['titre'].'">';
        }
        echo '<p>'.$data['synopsis'].'</p>';
        if ($_SESSION['id'] == $data_film['id']) {
        echo'<a href="edit_film.php">Modifier</a>';
        echo'<a href="delete_film.php">Suppprimer</a>';
        }
    }
    ?>
    
</body>
</html>