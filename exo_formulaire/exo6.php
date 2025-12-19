<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo6.php" method="POST">
        <input type="number" name="number1" id="number1">
        <input type="number" name="number2" id="number2">
        <select name="operateur" id="operateur" value="addition">
            <option value="multiplier">multiplier</option>
            <option value="addition">addition</option>
            <option value="soustraction">soustraction</option>
            <option value="division">division</option>
        </select>
        <input type="submit">
    </form>

    <?php
    if (!empty($_POST['number1']) && ($_POST['number2'])) {
        if ($_POST['operateur'] == "multiplier") {
            echo $_POST['number1'] * $_POST['number2'];
        }
        if ($_POST['operateur'] == "addition") {
            echo $_POST['number1'] + $_POST['number2'];
        }
        if ($_POST['operateur'] == "soustraction") {
            echo $_POST['number1'] - $_POST['number2'];
        }
        if ($_POST['operateur'] == "division") {
            echo $_POST['number1'] / $_POST['number2'];
        }
    }
    ?>
</body>

</html>