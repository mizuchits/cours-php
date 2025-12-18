<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $hours = 20;
    if ($hours >= 0 && $hours < 12) {
        echo "matin";
    } else if ($hours >= 12 && $hours < 18) {
        echo "après-midi";
    } else if ($hours >= 18 && $hours < 24) {
        echo "soir";
    }
    ?>
</body>

</html>