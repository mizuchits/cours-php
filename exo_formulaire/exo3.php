<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            <?php
            if (!empty($_POST['couleur'])) {
                $couleur = htmlspecialchars($_POST['couleur']);
                echo "background-color: " . $couleur . ";";
            }
            ?>
        }
    </style>
</head>

<body>
    <form action="exo3.php" method="POST">
        <label for="pseudo">Votre pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
        <br><br>
        <label for="couleur">Choisissez une couleur</label>
        <select name="couleur" id="couleur">
            <option value="red">Rouge</option>
            <option value="blue">Bleu</option>
            <option value="green">Vert</option>
            <option value="yellow">Jaune</option>
        </select>
        <br><br>
        <button type="submit">Valider</button>
    </form>

    <p>
        <?php
        if (!empty($_POST['pseudo'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            echo $pseudo;
        }
        ?>
    </p>
</body>

</html>