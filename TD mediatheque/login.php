<?php
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");

if (!empty($_SESSION["nom"])) {
    header('Location:index.php');
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
    <form action="login.php" method="POST">
        <input type="text" name="nom">
        <input type="text" name="password">
        <input type="submit">
    </form>

    <?php
$request = $bdd->prepare('SELECT * FROM user');
$request->execute([]);
$resultat = $request->fetch();

if (!empty($_POST['nom']) && ($_POST['password'])) {
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $password_check = password_verify($_POST['password'], 'SELECT password FROM user WHERE nom = "'.$nom.'"');
    var_dump(password_verify($_POST['password'], 'SELECT password FROM user WHERE nom = "'.$nom.'"'));

    if ($resultat && $password_check == $password) {
        session_start();
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['password'] = $_POST['password'];
        HEADER('Location:index.php');
    } else {
        
    }
}
?>
</body>

</html>