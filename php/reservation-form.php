<?php
session_start();
require "fonction.php";
if (isset($_POST['submit'])) {
    if (!isset($_POST['titre']) || !isset($_POST['description']) || !isset($_POST['datededebut']) || !isset($_POST['datedefin'])) {
        echo "Remplissez tout les champs";
    } else {
        $date1 = $_POST['datededebut'] . '-' . $_POST['heure1'] . ':' . $_POST['heure2'];
        $date2 = $_POST['datedefin'] . '-' . $_POST['fin1'] . ':' . $_POST['fin2'];
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);
        $date = timestampToDateSQL($timestamp1);
        $date2 = timestampToDateSQL($timestamp2);
        $diffdate = $timestamp2 - $timestamp1;
        if ($diffdate != 3600) {
            echo "la  durée de reservation ne peut etre que d'une heure";

        }
        elseif (!isset($_SESSION['login'])){
            echo "il faut s'inscrire pour ajouter un evenement!";
            header('Refresh:3 ; URL=connexion.php');
        }
        else {
            $log=$_SESSION['login'];
            $mdp=$_SESSION['password'];
            $req2 =mysqli_query(connectionbdd(),"SELECT id FROM utilisateurs WHERE login=$log AND password='$mdp'");
            $res2=mysqli_fetch_all($req2, MYSQLI_ASSOC);
            $id =$res2[0]['id'];
            $id_user = $id;
            $titre=$_POST['titre'];
            $description=$_POST['description'];
            $req = mysqli_query(connectionbdd(), "INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES ($titre,$description,$date,$date2, $id_user)");




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
    <title>reservation</title>
</head>
<body>
<header>
    <?php require "header.php"?>

</header>
<main>
    <form action="#" method="post">
        <label for="titre">Nom de l'evenement</label>
        <input type="text" name="titre" placeholder="ajouter un titre à l'evenement">
        <label for="descritpion">Description de l'evenement</label>
        <input type="text" name="description" placeholder="ajouter un motif à l'evenement">
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
