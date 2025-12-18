<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 5 === 0 && $i % 3 === 0) {
            echo "<p>foobar</p>";
        } else if ($i % 5 === 0) {
            echo "<p>bar</p>";
        } else if ($i % 3 === 0) {
            echo "<p>foo</p>";
        } else {
            echo "<p>" . $i . "</p>";
        }
    }
    ?>
</body>

</html>