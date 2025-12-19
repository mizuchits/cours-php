<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo7.php" method="POST">
        <input type="number" name="montant" id="montant">
        <select name="monnais" id="monnais" value="dollar">
            <option value="dollar">dollar</option>
            <option value="yen">yen</option>
            <option value="franc">franc suisse</option>
        </select>
        <input type="submit">
    </form>

    <?php
    if (!empty($_POST['montant'])) {
        if ($_POST['monnais'] == "dollar") {
            echo $_POST['montant'] * 1.17;
        }
        if ($_POST['monnais'] == "yen") {
            echo $_POST['montant'] * 183.70;
        }
        if ($_POST['monnais'] == "franc") {
            echo $_POST['montant'] * 0.93;
        }
    }
    ?>
</body>

</html>