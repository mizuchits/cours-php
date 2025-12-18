<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo5.php" method="POST">
        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">
        <input type="submit">
    </form>

    <?php
    if (isset($_POST['username']) && ($_POST['password'])) {
        if ($_POST['username'] == "admin" && $_POST['password'] == "1234") {
            header('Location: login_success.php');
            exit();
        } else {
            echo "<p>l'identifiant ou le mot de passe n'est pas correct</p>";
        }
    }
    ?>
</body>

</html>