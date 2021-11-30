<nav>
    <ul>
        <li>contact
            <ul>
                <li><a href="https://github.com/yonathan-darmon/reservation-salles">Git</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>planning
            <ul>
                <li><?php
                    if (isset($_SESSION['login'])) {
                        echo "<a href='reservation-form.php'>Réserver la salle </a>";
                    }
                    ?></li>
                <li><a href="planning.php">La page du planning</a></li>
            </ul>
        </li>
    </ul>
    <?php
    if (isset($_SESSION['login'])) {
        echo "<ul>
               <li> Mes informations
                    <ul>
                       <li><a href='profil.php'>Modifier mes données</a></li>
                    </ul>
                </li>
              </ul>";
    }
    ?>
</nav>
