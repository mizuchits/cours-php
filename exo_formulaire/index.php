<?php
$nom = $_POST['name'];
$prenom = $_POST['prenom'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>titre</h1>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptatibus consequuntur quo magni
            reprehenderit totam iusto velit placeat, minus cum sed</p>
    </section>
    <form action="index.php" method="POST">
        <label for="name">username</label>
        <input type="text" name="name" id="name">
        <label for="prenom">first_name</label>
        <input type="text" name="prenom" id="prenom">
        <input type="submit" name="" id="" value="Valider">
    </form>
    <p>
        bonjour
        <?php

        echo $nom;
        echo " ";
        echo $prenom;
        ?>
    </p>

</body>

</html>