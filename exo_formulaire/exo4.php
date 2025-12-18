<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo4.php" method="POST">
        <input type="number" name="number" id="number">
        <input type="submit">
    </form>

    <?php
    if (isset($_POST['number'])) {
        if ($_POST['number'] % 6 === 0) {
            echo rand(1, $_POST['number']);
        } else {
            header('Location: http://localhost/exo_formulaire/exo4.php?error=true');
            exit();
        }
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] === "true") {
            echo "<p>le nombre n'est pas valide</p>";
        }
    }
    ?>
</body>

</html>