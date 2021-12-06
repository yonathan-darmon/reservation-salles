<?php
session_start();
require "fonction.php";
if (isset($_POST['deco'])) {
    header("location:../index.php");
    session_destroy();
}
if (isset($_GET['id'])) {
    $idevent = $_GET['id'];
    $req = mysqli_query(connectionbdd(), "SELECT * FROM reservations INNER JOIN utilisateurs WHERE reservations.id='$idevent'AND reservations.id_utilisateur=utilisateurs.id");
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);

}
var_dump($_GET);
var_dump($res);
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
            <input type="text" name="login" id="login" value="<?php echo $res[0]['login']; ?>">
            <label for="titre">Titre de l'evenement</label>
            <input type="text" name="titre" id="titre" value="<?php echo $res[0]['titre']; ?>">
            <label for="description">Description de l'evenement</label>
            <textarea id="description" name="description"
                      rows="5" cols="33" placeholder="Ajouter un motif à l'evenement"><?php echo $res[0]['description']; ?></textarea>
            <label for="debut">Heure de début</label>
            <input type="text" name="debut" id="debut" value="<?php $str2=strtotime($res[0]['debut']); echo date('d-m-Y H:i',$str2) ?>">
            <label for="fin">Heure de fin</label>
            <input type="text" name="fin" id="fin" value="<?php
            $str=strtotime($res[0]['fin']); echo date('d-m-Y H:i',$str ); ?>">
        </form>
        <img src="../asset/image/parc-chanot-salon-entrepreneur.jpg" alt="exterieur chanot">
    </div>
</main>
<footer>
    <?php require "footer.php"; ?>
</footer>


</body>
</html>
