<?php
session_start();
require "fonction.php";
if (isset($_POST['submit'])){
    if(!isset($_POST['login'])|| !isset($_POST['password'])){
        echo "Veuillez remplir tout les champs";
    }
    else{
        foreach (result() as $key =>$value){
            if($_POST['login']==$value['login'] && $_POST['password']==$value["password"]){
                $_SESSION['login']=$_POST['login'];
                $_SESSION['password']=$_POST['password'];
                echo "Vous etes bien connecté";
                header('Refresh:3 ; URL=planning.php');            }
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
    <title>connexion</title>
</head>
<body>
<header>

</header>
<main>
    <form action="#" method="post">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" name="login" placeholder="Votre login">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" placeholder="Votre mot de passe">
        <input type="submit" name="submit" value="connexion">

    </form>
</main>
<footer>

</footer>

</body>
</html>
