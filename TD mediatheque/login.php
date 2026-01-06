<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");

if (!empty($_SESSION["id"])) {
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

    if (!empty($_POST['nom']) && ($_POST['password'])) {
        $nom = $_POST['nom'];
        $password = $_POST['password'];
        while ($data = $request->fetch()) {
            $password_check = password_verify($password, $data['password']);
            if ($data['nom'] == $nom && $password_check == $password) {
                session_start();
                $_SESSION['id'] = $data['id'];
                header('Location:index.php');
            } else {
                echo'non';
            }
        }


    }
    ?>
</body>

</html>