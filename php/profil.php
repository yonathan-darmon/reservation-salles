<?php
    //ouverture de la session
    session_start();
    require "fonction.php";
    
    //bouton déconnexion
    if (isset($_POST['deco'])) {
        header("location:../index.php");
        session_destroy();
    }

    //récuperer et pré-remplir le formulaire
    if($_SESSION != null){
        $session = $_SESSION['login'];
        $req2 = mysqli_query(connectionbdd(), "SELECT * FROM `utilisateurs` WHERE `login` = '$session'");
        $res = $req2->fetch_array();
    }
    
    if(isset($_POST['submit'])) {
        $login = $_POST['login'];
        $actuallogin = $_SESSION['login'];
        $password = $_POST['password'];

        //scripté password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if(empty($password)){
			//requête pour modifier les informations de l'utilisateur
            $req = mysqli_query(connectionbdd(), "UPDATE `utilisateurs`  SET `login`= '$login' WHERE `login`= '$actuallogin' ");
		}
        else{
            //requête pour modifer les données de l'utilisateur
            $req = mysqli_query(connectionbdd(), "UPDATE `utilisateurs`  SET `login`= '$login', `password`= '$hash' WHERE `login`= '$actuallogin' ");
        }
        //afficher la nouvelle session
        $_SESSION['login'] = $login;
        header("Location: profil.php");
    }
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
        <?php
        //si l'utilisateur n'est pas connecté affiche pas connecté sinon affiche le profil de l'utilisateur
        if(empty($_SESSION['login'])) { ?>
        
            <?php } else { ?>
                <div id="conteneur">
                    <img src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png">
                    <?php echo '<p class="text"> profil de </p>'; echo $_SESSION['login']; ?>
                </div>
            <?php } ?>
    <?php /*if(isset($res)) {
        echo '<img src="https://www.kindpng.com/picc/m/269-2697881_computer-icons-user-clip-art-transparent-png-icon.png">' echo $_SESSION['login'];
    }*/
    ?>
    <form class="profil4" action="#" method="post">
        <?php
        //si l'utilisateur n'est pas connecté affiche pas connecté sinon affiche le formulaire de connexion
        if(empty($_SESSION['login'])) { ?>
            <p class="text2">Vous n'êtes pas connecté </p> <a class="text3" href=./connexion.php> Par ici ! </a>
                <?php } else { ?>
                    <div class="boite">
                        <p>Login</p>
                        <input type="text" name="login" value= <?php echo $res['login']; ?>>
                        <p>password</p>
                        <input type="password" name="password">
                        <br>
                        <input class="bouton" type="submit" value="Enregistrer" name="submit">
                    </div>
    </form>
        <?php } ?>
</main>
     
    <footer>
        <?php
            require "footer.php";
        ?>
    </footer>
</body>
</html>