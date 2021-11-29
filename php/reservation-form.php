<?php
session_start();
require "fonction.php";
$date1 = $_POST['datededebut'] . '-' . $_POST['heure1'] . ':' . $_POST['heure2'];
$date2 = $_POST['datedefin'] .'-'. $_POST['fin1'] . ':'.$_POST['fin2'];
$timestamp1 = strtotime($date1);
$timestamp2 = strtotime($date2);
$date = timestampToDateSQL($timestamp1);
$date2 = timestampToDateSQL($timestamp2);
$diffdate = $timestamp2 - $timestamp1;
if (isset($_POST['submit'])) {
    if (!isset($_POST['titre']) || !isset($_POST['description']) || !isset($_POST['datededebut']) || !isset($_POST['datedefin'])) {
        echo "Remplissez tout les champs";
    } else {
        if ($diffdate != 3600) {
            echo "la  durée de reservation ne peut etre que d'une heure";

        } else {


        }

    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>

</header>
<main>
    <form action="#" method="post">
        <label for="titre">Nom de l'evenement</label>
        <input type="text" name="titre" placeholder="ajouter un titre à l'evenement">
        <label for="descritpion">Description de l'evenement</label>
        <input type="text" name="description" placeholder="ajouter une description à l'evenement">
        <label for="datededebut">Début de la reservation</label>
        <input type="date" name="datededebut">
        <select name="heure1" id="heure1">
            <?php
            for ($i = 9; $i <= 18; $i++) {
                echo "<option value='$i'>$i";
            }
            ?>
        </select>
        <select name="heure2" id="heure2">
            <option value="0">0</option>
            <option value="30">30</option>

        </select>
        <label for="datedefin">Fin de la reservation</label>
        <input type="date" name="datedefin">
        <select name="fin1" id="fin1">
            <?php
            for ($i = 10; $i <= 19; $i++) {
                echo "<option value='$i'>$i";
            }
            ?>
        </select>
        <select name="fin2" id="fin2">
            <option value="00">00</option>
            <option value="30">30</option>
        </select>

        <input type="submit" name="submit" value="Reserver">
    </form>

</main>
<footer>

</footer>
</body>
</html>
