<?php
$ville = $_GET['ville'];
$transport = $_GET['transport'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
        La ville choisie est <?php echo $ville; ?> et le voyage se fera en <?php echo $transport; ?>
    </p>
</body>

</html>