<?php
$number = 1;
$count = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php

        for ($i = 0; $i < 25; $i++) {
            $num = 0;
            for ($j = 0; $j <= $i; $j++) {
                $num += $j;
                echo $num;
            }
        }
        ?>
    </h1>
</body>

</html>