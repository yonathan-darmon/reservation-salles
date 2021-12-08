<?php
session_start();
if (isset($_POST['deco'])) {
    header("location:index.php");
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="stylesheet" href="asset/css/header.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@1,100&display=swap');
    </style>

    <title>Accueil</title>
</head>
<body>
<header>
    <nav class="header">

        <img src="asset/image/logo_chanot.png" alt="logo chanot">
        <ul>

            <?php
            if (!isset($_SESSION['login'])) {
                echo "<li><a href='index.php'>Accueil</a></li>";
                echo "<li><a href='php/inscription.php'>Inscription</a>";
                echo "<li><a href='php/connexion.php'>Connexion</a></li>";
            }
            ?>
            <li><a href="php/planning.php">Le planning de la salle</a></li>
            <li><a href="https://github.com/yonathan-darmon/reservation-salles">Contact</a></li>
            <?php
            if (isset($_SESSION['login'])) {
                echo "  <li><a href='php/profil.php'>Mes informations</a></li>";

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
</header>

<main>

    <h1>La salle Goudes</h1>

    <!--Slider-->

    <div id="high">
        <div class="slideshow">
            <ul>
                <li><img src="asset/image/entréé%20du%20parc.jpg" alt><span>Bienvenue au parc Chanot</span></li>
                <li><img src="asset/image/G1.jpg" alt><span>Le parc vu du ciel</span></li>
                <li><img src="asset/image/G2.png" alt><span>Localisation de la salle</span></li>
                <li><img src="asset/image/G3.jpg" alt><span>Séminaire de jour</span></li>
                <li><img src="asset/image/G4.jpg" alt><span>Séminaire de nuit</span></li>
            </ul>
            <div class="barre_progression"></div>
        </div>

        <div class="text">
            <p>Sans aucun pilier, Les Goudes proposent un espace modulable pour tous types de configuration : <br>exposition,
                restauration, conférences… <br>Les Goudes s’ouvrent sur le Hall Accueil Expo pour plus de fluidité pour
                vos expositions, <br>ce qui porte la surface totale exploitable à 2225 m².<br>Ne perdez plus de temps
                pour réserver votre créneau.</p>
        </div>
    </div>
    <div id="goude">
        <div class="tab1">
            <table>
                <tr>
                    <th colspan="3">Dimensions</th>
                </tr>
                <tr>
                    <td style="font-size: 22px">Surface</td>
                    <td style="font-size: 22px"><span>Dimensions</span></td>
                    <td style="font-size: 22px"><span>Hauteur</span></td>
                </tr>
                <tr>
                    <td>1045m²</td>
                    <td>37 x 28 m</td>
                    <td>6,3 m</td>
                </tr>
            </table>
        </div>

        <div class="tab2">
            <table>
                <tr>
                    <th>Salle</th>
                    <th>Surface en m²</th>
                    <th>Théâtre</th>
                    <th>Ecolier</th>
                    <th>Table en U</th>
                    <th>Table ronde</th>
                    <th>Repas</th>
                    <th>Cocktail</th>
                </tr>
                <tr>
                    <td>Les Goudes 1</td>
                    <td>555</td>
                    <td>458</td>
                    <td>308</td>
                    <td>86</td>
                    <td>112</td>
                    <td>450</td>
                    <td>850</td>
                </tr>
                <tr>
                    <td>Les Goudes 2</td>
                    <td>488</td>
                    <td>388</td>
                    <td>252</td>
                    <td>84</td>
                    <td>108</td>
                    <td>380</td>
                    <td>750</td>
                </tr>
                <tr>
                    <td>Les Goudes 1 + 2</td>
                    <td>1045</td>
                    <td>1120</td>
                    <td>568</td>
                    <td>132</td>
                    <td>172</td>
                    <td>980</td>
                    <td>1600</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="btn">
        <div class="frame">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.476127147147!2d5.389251115804262!3d43.27291138495553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9b8a5835ebfa9%3A0x8345456cdbe33e53!2sMarseille%20Chanot!5e1!3m2!1sfr!2sfr!4v1638270354869!5m2!1sfr!2sfr"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>


        <div class='btn2'>
            <form action='#'>
                <button type='submit'><?php
                if (isset($_SESSION['login'])){
                    echo"<a href='php/reservation-form.php'>Réservez la salle</a></button>";
                }
                else{
                    echo "<a href='php/connexion.php'>Réservez la salle</a></button>";
                }
                ?>
            </form>
        </div>


        <div class="btn3">
            <form action="">
                <button type="submit"><a href="https://www.marseille-chanot.com/qui-sommes-nous/notre-equipe/">Nous
                        contacter</a></button>
            </form>
        </div>
    </div>

</main>
<footer>
<nav class="footer">
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
                <li><a href="/php/planning.php">La page du planning</a></li>
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

</footer>
</body>
</html>