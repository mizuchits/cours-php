<?php
session_start();
if (!isset($_SESSION['nombreMystere'])) {
    $_SESSION['nombreMystere'] = rand(min: 0, max: 1000);
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
    <form action="exo9.php" method="POST">
        <input type="number" name="number" id="number">
        <input type="submit">
    </form>
    <p>
        <?php
        if (!empty($_POST['number'])) {
            if ($_POST['number'] < $_SESSION['nombreMystere']) {
                echo " Le nombre que vous proposez est trop petit";
            } else if ($_POST['number'] > $_SESSION['nombreMystere']) {
                echo " Le nombre que vous proposez est trop grand";
            } else {
                echo "vous avez trouver le nombre mystere";
                unset($_SESSION['nombreMystere']);
            }
        }
        ?>
    </p>
</body>

</html>