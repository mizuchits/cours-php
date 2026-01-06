<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="username" id="username">
        <input type="text" name="password" id="password">
        <input type="submit">
    </form>

    <?php
    $user = [
        "admin" => password_hash("admin", PASSWORD_DEFAULT),
    ];
    if (isset($_POST['username']) && ($_POST['password'])) {
        if ($_POST['username'] == "admin" && $_POST['password'] == password_verify($_POST['password'], $user['admin'])) {
            header('Location: login_success.php');
            exit();
        } else {
            echo "<p>l'identifiant ou le mot de passe n'est pas correct</p>";
        }
    }
    ?>
</body>
</html>
