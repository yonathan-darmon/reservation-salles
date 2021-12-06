<?php

require("fonction.php");

session_start();

$req = mysqli_query(connectionbdd(), "SELECT * FROM reservations");
$res = mysqli_fetch_all($req, MYSQLI_ASSOC);
$array = mysqli_fetch_all($req, MYSQLI_ASSOC);
if (isset($_SESSION['login'])){
foreach($array as $key=>$value);
}
else{
    $value['titre']="";
    $value['description']="";
    $value['deb']="";
    $value['fin']="";
    Echo "<h1>Vous n'etes pas l admin</h1>";
    header('Refresh:1 ; URL=connexion.php');
}
   if(isset($_POST['submit'])) {

      $log = $_POST['login'];
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      $deb = $_POST['deb'];
      $fin = $_POST['fin'];
      $req2 = mysqli_query(connectionbdd(), "UPDATE reservations SET titre ='$titre', description ='$description', deb ='$deb', fin = '$fin' WHERE login = '$login'");
   }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <title>Admin</title>
</head>
<body>
<header>
<?php require"header.php" ?>
</header>
<main>
<table border="1px solid white">
    <thead>
        <tr>
<?php 
foreach($res as $key) {
    foreach($key as $data1 =>$data2) {
        echo '<th>' . $data1 . '</th>';
    }break;
}
?>
        </tr>
    </thead>

    <tbody>

    <?php

foreach($res as $key) {
        echo '<tr>';
    foreach ($key as $data1) {
        echo '<td>' . $data1 . '</td>';
    }
        echo '</tr>';
}
    ?>
    </tbody>
</table>

<div id="form">
   <form action="" method="post" align="center">

      <h2>Titre</h2>
         <input type="text" name="titre" id="titre" value='<?php echo $value['titre'] ?>'>

      <h2>Description</h2>
         <input type="text" name="desc" id="desc" value='<?php echo $value['description'] ?>'>

      <h2>Début</h2>
         <input type="date" name="deb" id="deb" value='<?php echo $value['deb'] ?>'>

      <h2>Fin</h2>
         <input type="date" name="fin" id="fin" value='<?php echo $value['fin'] ?>'>

         <input name="submit" id="btnsubmit" type="submit" value="Modifier une réservarion">
      </form>
   </div>
</main>

<footer>
    <?php require"footer.php" ?>
</footer>
</body>
</html>