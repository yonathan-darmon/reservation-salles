<?php
    /*if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $actuallogin = $_SESSION['login'];
        $password = $_POST['password'];

        if(empty($password)){
			//requête pour modifier les informations de l'utilisateur
        $req = $db->query("UPDATE `utilisateurs`  SET `login`= '$login',`prenom`= '$prenom',`nom`= '$nom' WHERE `login`= '$actuallogin' ");
		}
		else{
			//requête pour modifier les informations de l'utilisateur
        $req = $db->query("UPDATE `utilisateurs`  SET `login`= '$login',`prenom`= '$prenom',`nom`= '$nom',`password`= '$hash' WHERE `login`= '$actuallogin' ");
		}
        //afficher la nouvelle session
        $_SESSION['login'] = $login;
    }*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/profil.css">
    <link rel="stylesheet" href="../asset/css/header.css">
</head>
<body>
    <header>
        <?php require "header.php"; ?>
    </header>
    <main>
    <div id="conteneur">
        <img src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png">
        <p class="text"> profil de </p>
    </div>
    <?php /*if(isset($login)) {
        echo '<img src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png">' echo $_SESSION['login'];
    }*/
    ?>
    <form action="#" method="post">
    <div class="boite">
        <p>Login</p>
        <input type="text" name="login">
        <p>password</p>
        <input type="password" name="password">
        <br>
        <input class="bouton" type="submit" value="Enregistrer" name="submit">
        </div>
    </form>
</main>
     
    <footer>
    <?php
        require "footer.php";
    ?>
    </footer>
</body>
</html>