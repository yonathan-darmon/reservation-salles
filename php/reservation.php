<?php
session_start();
require "fonction.php";
if (isset($_POST['deco'])) {
    header("location:../index.php");
    session_destroy();
}
if(isset($_GET['id'])){
    $idevent=$_GET['id'];
    $req=mysqli_query(connectionbdd(),"SELECT * FROM reservation INNER JOIN utilisateurs where reservation.id='$idevent'AND reservation.id_utilisateur=utilisateurs.id");
    $res=mysqli_fetch_all($req,MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="../asset/css/reservation.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@1,100&display=swap');
    </style>
    <title>reservation</title>
</head>
<body>
<header>
    <?php require "header.php"; ?>
</header>
<main>
    <div class="container">
        <form action="#" method="post">
            <label for="login">Nom du créateur</label>
            <input type="text" name="login" id="login" value="">
            <label for="titre">Titre de l'evenement</label>
            <input type="text" name="titre" id="titre" value="">
            <label for="description">Description de l'evenement</label>
            <textarea id="description" name="description"
                      rows="5" cols="33" placeholder="Ajouter un motif à l'evenement"></textarea>
            <label for="debut">Heure de début</label>
            <input type="text" name="debut" id="debut" value="">
            <label for="fin">Heure de fin</label>
            <input type="text" name="fin" id="fin" value="">
        </form>
        <img src="../asset/image/parc-chanot-salon-entrepreneur.jpg" alt="exterieur chanot">
    </div>
</main>
<footer>
    <?php require "footer.php"; ?>
</footer>


</body>
</html>
