<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo8.php" method="POST">
        <p>Question 1 : Quelle est la capitale de la France ?</p>
        <input type="radio" name="question1" value="Paris" id="q1r1">
        <label for="q1r1">Paris</label><br>
        <input type="radio" name="question1" value="Lyon" id="q1r2">
        <label for="q1r2">Lyon</label><br>
        <input type="radio" name="question1" value="Marseille" id="q1r3">
        <label for="q1r3">Marseille</label><br>
        <input type="radio" name="question1" value="Bordeaux" id="q1r4">
        <label for="q1r4">Bordeaux</label><br>
        <p>
            <?php
            if ($_POST['question1'] != 'Paris') {
                echo "FAUX la réponse était Paris";
            }
            ?>
        </p>

        <p>Question 2 : Quel est le principal langage utilisé pour le développement web côté client ?</p>
        <input type="radio" name="question2" value="Python" id="q2r1">
        <label for="q2r1">Python</label><br>
        <input type="radio" name="question2" value="Java" id="q2r2">
        <label for="q2r2">Java</label><br>
        <input type="radio" name="question2" value="JavaScript" id="q2r3">
        <label for="q2r3">JavaScript</label><br>
        <input type="radio" name="question2" value="C++" id="q2r4">
        <label for="q2r4">C++</label><br>
        <p>
            <?php
            if ($_POST['question2'] != 'JavaScript') {
                echo "FAUX la réponse était JavaScript";
            }
            ?>
        </p>

        <p>Question 3 : Combien de continents compte la Terre ?</p>
        <input type="radio" name="question3" value="5" id="q3r1">
        <label for="q3r1">5</label><br>
        <input type="radio" name="question3" value="6" id="q3r2">
        <label for="q3r2">6</label><br>
        <input type="radio" name="question3" value="7" id="q3r3">
        <label for="q3r3">7</label><br>
        <input type="radio" name="question3" value="8" id="q3r4">
        <label for="q3r4">8</label><br>
        <p>
            <?php
            if ($_POST['question3'] != '7') {
                echo "FAUX la réponse était 7";
            }
            ?>
        </p>
        <br>
        <button type="submit">Valider</button>
    </form>
    <p>
        <?php
        if (isset($_POST['question1'])) {
            if (!empty($_POST['question1']) && !empty($_POST['question2']) && !empty($_POST['question3'])) {
                $score = 0;
            }

            if ($_POST['question1'] == 'Paris') {
                $score++;
            }

            if ($_POST['question2'] == 'JavaScript') {
                $score++;
            }

            if ($_POST['question3'] == '7') {
                $score++;
            }

            echo "votre score est de: " . $score . "/3";
            if ($score == 3) {
                echo "<br>félicitation!";
            }
        }
        ?>
    </p>
</body>

</html>