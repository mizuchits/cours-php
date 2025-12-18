<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo2.php" method="GET">
        <input type="text" name="animale" id="animale">
        <input type="submit">
    </form>
    <p>
        <?php
        echo $_GET['animale'];
        ?>
    </p>
</body>

</html>