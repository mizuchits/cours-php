<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");
$request = $bdd->prepare('SELECT * FROM film WHERE id = :id');
$request->execute(['id' => $_GET['id']]);
$film = $request->fetch();
if ($film['user_id'] != $_SESSION['id']) {
    header("location: index.php");
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
    <form action="edit_film.php?user_id=<?php echo $_GET['user_id']; ?>&id=<?php echo $_GET['id']; ?>" method="POST"
        enctype="multipart/form-data">
        <label for="titre">titre</label>
        <input type="text" name="titre" value="<?php echo $film['titre'] ?>">
        <label for="realisateur">réalisateur</label>
        <input type="text" name="realisateur" value="<?php echo $film['realisateur'] ?>">
        <label for="genre">genre</label>
        <input type="text" name="genre" value="<?php echo $film['genre'] ?>">
        <label for="duree">durée</label>
        <input type="text" name="duree" value="<?php echo $film['duree'] ?>">
        <label for="synopsis">synopsis</label>
        <input type="text" name="synopsis" value="<?php echo $film['synopsis'] ?>">
        <input type="file" name="image" id="image">
        <input type="submit">
    </form>

    <?php
    if (!empty($_FILES['image']['name'])) {
        $fichier = $_FILES['image'];
        $typesAutorises = ['image/jpeg', 'image/png'];

        if (in_array($fichier['type'], $typesAutorises)) {
            $nomUnique = uniqid() . '_' . $fichier['name'];
            $destination = 'upload/' . $nomUnique;

            if (!file_exists('upload')) {
                mkdir('upload');
            }

            move_uploaded_file($fichier['tmp_name'], $destination);
            echo '<img src="' . $destination . '" width="300">';
        } else {
            echo "le fichier n'est pas compatible";
        }
    }
    if (!empty($_POST['titre']) && ($_POST['realisateur']) && ($_POST['genre']) && ($_POST['duree']) && ($_POST['synopsis'])) {

        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $synopsis = $_POST['synopsis'];

        $request_insert = $bdd->prepare('UPDATE film SET 
        titre = :titre,
        realisateur = :realisateur,
        genre = :genre,
        duree = :duree,
        synopsis = :synopsis,
        user_id = :user_id,
        affiche = :affiche
        WHERE id = :id');
        $request_insert->execute(array(
            'titre' => $titre,
            'realisateur' => $realisateur,
            'genre' => $genre,
            'duree' => $duree,
            'synopsis' => $synopsis,
            'user_id' => $_SESSION['id'],
            'affiche' => $destination,
            'id' => $film['id']
        ));
        header('location:index.php');
    }
    ?>
</body>

</html>