<?php
session_start();

if (isset($_POST['deco'])) {
    header("location:../index.php");
    session_destroy();
}

require "fonction.php";
if (isset($_POST['submit'])) {
    if (!isset($_POST['titre']) || !isset($_POST['description']) || !isset($_POST['datededebut']) || !isset($_POST['datedefin'])) {
        $error3 = "Remplissez tout les champs";
    } else {
        $date1 = $_POST['datededebut'] . '-' . $_POST['heure1'] . ':' . $_POST['heure2'];
        $date2 = $_POST['datedefin'] . '-' . $_POST['fin1'] . ':' . $_POST['fin2'];
        $timestamp1 = strtotime($date1);

        $timestamp2 = strtotime($date2);
        $date = timestampToDateSQL($timestamp1);
        $date2 = timestampToDateSQL($timestamp2);
        $diffdate = $timestamp2 - $timestamp1;
        if ($diffdate != 3600) {
            $error2 = "la  durée de reservation ne peut etre que d'une heure";

        } elseif (!isset($_SESSION['login'])) {
            $error1 = "il faut se connecter pour ajouter un evenement!";
            header('Refresh:3 ; URL=connexion.php');
        } else {
            $log = $_SESSION['login'];
            $mdp = $_SESSION['password'];
            $req2 = mysqli_query(connectionbdd(), "SELECT id FROM utilisateurs WHERE login='$log' AND password='$mdp'");
            $res2 = mysqli_fetch_all($req2, MYSQLI_ASSOC);

            $id = $res2[0]['id'];
            $id_user = $id;
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $req = mysqli_query(connectionbdd(), "INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES ('$titre','$description','$date','$date2', '$id_user')");
            $register = "Evenement bien enregister";
            header("Refresh:2; url=planning.php");
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
    <link rel="stylesheet" href="../asset/css/header.css">
    <link rel="stylesheet" href="../asset/css/reservationform.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@1,100&display=swap');
    </style>
    <title>formulaire de reservation</title>
</head>
<body>
<header>
    <?php require "header.php" ?>

</header>
<main>
    <div class="container">
        <form action="#" method="post">
            <label for="titre">Nom de l'evenement</label>
            <input type="text" name="titre" placeholder="ajouter un titre à l'evenement">
            <label for="description">Description de l'evenement</label>
            <textarea id="description" name="description"
                      rows="5" cols="33" placeholder="Ajouter un motif à l'evenement"></textarea>
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
                <option value="00">00</option>
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

            <input class="reserver" type="submit" name="submit" value="Reserver">
            <?php
            if (isset($error1)) {
                echo "<h3 class='error'>$error1</h3>";
            }
            if (isset($error2)) {
                echo "<h3 class='error'>$error2</h3>";
            }
            if (isset($error3)) {
                echo "<h3 class='error'>$error3</h3>";
            }
            if (isset($register)) {
                echo "<h3>$register</h3>";
            }
            ?>
        </form>
        <div class="img">
            <h1>Reserver la salle des goudes! </h1>
            <img class="img1" src="../asset/image/Goudes-conférences.jpg" alt="salle des goudes">
        </div>
    </div>

</main>
<footer>
    <?php require "footer.php" ?>
</footer>
</body>
</html>
