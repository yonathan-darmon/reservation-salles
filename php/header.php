<nav class="header">

    <img src="../asset/image/logo_chanot.png" alt="logo chanot">
    <ul>

        <?php
        if (!isset($_SESSION['login'])) {
            echo "<li><a href='../index.php'>Accueil</a></li>";
            echo "<li><a href='inscription.php'>Inscription</a>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        }
        ?>
        <li><a href="planning.php">Le planning de la salle</a></li>
        <li><a href="https://github.com/yonathan-darmon/reservation-salles">Contact</a></li>
        <?php
        if (isset($_SESSION['login'])) {
            echo "  <li><a href='profil.php'>Mes informations</a></li>";
            if($_SESSION['login']=='admin'){
                echo "  <li><a href='admin.php'>La page Admin</a></li>";
            }

            $deco = "<form action='#' method='post' id='deco'><input type='submit' name='deco' class='deco' value='Deconnexion'></form>";


        } else {
            echo "";
        }
        ?>

    </ul>
    <?php
    if (isset($deco)) {
        echo $deco;
    }
    ?>

</nav>
