<?php
session_start();
var_dump($_SESSION);
if (isset($_POST['deco'])) {
    header("location:../index.php");
    session_destroy();
}
require "fonction.php";
if (isset($_POST['submit'])) {
    if (!isset($_POST['login']) || !isset($_POST['password'])) {
        $error1 = "Veuillez remplir tout les champs";
    } else {
        foreach (result() as $key => $value) {
            if ($_POST['login'] == $value['login'] && password_verify($_POST['password'],$value['password'])) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $connect = "Vous etes bien connecté";
                header('Refresh:3 ; URL=planning.php');
            } else {
                $error2 = "verifier votre login/mot de passe";
            }
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
    <link rel="stylesheet" href="../asset/css/connexion.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@1,100&display=swap');
    </style>
    <title>connexion</title>
</head>
<body>
<header>
    <?php require "header.php" ?>
</header>
<main>
    <div class="container">
        <form action="#" method="post">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" name="login" placeholder="Votre login">
            <label for="password">Mot de passe</label>
            <input type="text" name="password" placeholder="Votre mot de passe">
            <input class="connex" type="submit" name="submit" value="connexion">
            <?php
            if (isset($error1)) {
                echo $error1;
            }
            if (isset($error2)) {
                echo $error2;
            }
            if (isset($connect)) {
                echo $connect;
            }
            ?>

        </form>
        <div class="img">
            <h1>Si vous souhaitez reserver la salle connectez vous!</h1>
            <img src="../asset/image/parc-chanot-marseille-3-1.jpg" alt="entrée de chanot">
        </div>
    </div>
</main>
<footer>
    <?php require "footer.php" ?>

</footer>

</body>
</html>
