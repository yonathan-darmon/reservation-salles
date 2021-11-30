<nav>
    <ul>

        <?php
        if (!isset($_SESSION['login'])) {
            echo "<li><a href='../index.php'>Accueil</a></li>";
            echo "<li><a href='connexion.php'>Connexion</a></li>";
        }
        ?>
        <li><a href="planning.php">Le planning de la salle</a></li>
        <li><a href="https://github.com/yonathan-darmon/reservation-salles">Contact</a></li>
        <?php
        if (isset($_SESSION['login'])) {
            echo "  <li><a href='profil.php'>Mes informations</a></li>";

            $deco = "<form action='#' method='post' id='deco'><input type='submit' name='deco' value='deconnexion'></form>";


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
