<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="exo10.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <input type="submit">
    </form>
    <p>
        <?php
        if (!empty($_FILES['image']['name'])) {
            $fichier = $_FILES['image'];
            $typesAutorises = ['image/jpeg', 'image/png', 'image/gif'];

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

        ?>
    </p>
</body>

</html>