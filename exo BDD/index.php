<?php
$bdd = new PDO("mysql:host=localhost;dbname=darty;charset=utf8", "root", "");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="text" name="modele">
        <input type="text" name="prix">
        <input type="submit">
    </form>

    <?php
    $request = $bdd->prepare('SELECT * FROM machine');
    $request->execute([]);

    while ($data = $request->fetch()) {
        echo '<p>' . $data['modele'] . ' ' . $data['prix'] . '</p>';
    }
    if (!empty($_POST['modele'] && $_POST['prix'])) {
        $modele = $_POST['modele'];
        $prix = $_POST['prix'];

        $request_insert = $bdd->prepare('INSERT INTO machine(modele, prix) VALUES(?,?)');
        $data_insert = $request_insert->execute(array($modele, $prix));
        header('location:index.php');
    }
    ?>


</body>

</html>