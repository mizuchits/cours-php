<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $number = 10;
    for ($i = 0; $i < $number; $i++) {
        if ($i % 2 === 0) {
            echo "<p>pair</p>";
        } else {
            echo "<p>" . $number . "</p>";
        }
    }
    ?>
</body>

</html>