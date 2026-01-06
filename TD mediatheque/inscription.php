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
    <form action="inscription.php" method="POST">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <input type="text" name="password">
        <input type="submit">
    </form>

    <?php
    $request = $bdd->prepare('SELECT * FROM user');
    $request->execute([]);
    $resultat = $request->fetch();

    if (!empty($_POST['nom']) && ($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

        if (!$resultat) {
            $request_insert = $bdd->prepare('INSERT INTO user(nom, prenom, password) VALUES(?,?,?)');
            $data_insert = $request_insert->execute(array($nom, $prenom, $password));
            header('location:index.php');
        } else {
            header('Location: inscription.php?get=ce nom d\'utilisateur est deja pris');
        }
    }

    ?>
    <p>
        <?php
        if (isset($_GET['ce nom d\'utilisateur est deja pris'])) {
        echo $_GET['get'];
        }
        ?>
    </p>
</body>

</html>