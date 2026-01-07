<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=mediatheque;charset=utf8", "root", "");

$request = $bdd->prepare('SELECT * FROM film WHERE id = :id');
$request->execute(['id' => $_GET['id']]);
$film = $request->fetch();
if ($film['user_id'] == $_SESSION['id']) {
    $request_delete = $bdd->prepare('DELETE FROM film WHERE id = :id');
    $request_delete->execute(['id' => $_GET['id']]);
    header("location: list_film.php");
} else {
    header("location: list_film.php");
}
?>