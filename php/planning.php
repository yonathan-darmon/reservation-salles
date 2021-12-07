<?php
    session_start();
    require "fonction.php";

    //$req = mysqli_query(connectionbdd(), "SELECT `id_utilisateur`, `titre` FROM reservations INNER JOIN utilisateurs WHERE reservations.id_utilisateur=id_utilisateur");

    //bouton déconnexion
    if (isset($_POST['deco'])) {
        header("location:../index.php");
        session_destroy();
    }

   //semaine précédente//
    if (isset($_GET['moins'])){
        $moins= $_GET['moins'];
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEARWEEK(debut)=YEARWEEK(NOW()- INTERVAL $moins WEEK)");    
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    }

    //semaine actuelle//
    elseif (isset($_GET['actuel'])) {
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEAR( debut ) = YEAR ( CURDATE() ) AND WEEK( debut ) = WEEK ( CURDATE() )");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    }

    //semaine suivante//
    elseif (isset($_GET['plus'])){
        $plus = $_GET['plus'];
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEARWEEK(debut)=YEARWEEK(NOW() + INTERVAL $plus WEEK)");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    }


    else{
        
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEAR( debut ) = YEAR ( CURDATE() ) AND WEEK( debut ) = WEEK ( CURDATE() )");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    }

     foreach($res as $key => $value) {
     $date=strtotime($value['debut']);
     $reldate=timestampToDateSQL($date);
     $req2=mysqli_query(connectionbdd(), "SELECT * DATEADD (week,1, $reldate) FROM reservation");
     //$res2=mysqli_fetch_all($req2,MYSQLI_ASSOC);
     }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/planning.css">
    <link rel="stylesheet" href="../asset/css/header.css">
</head>
<body>
    <header>
        <?php
            require "header.php";
        ?>
    </header>
     <hr>
    <form action="#" method="get">
            
            <p class="text"> Planning </p>
            <input class="moins" type="submit" value=<?php if(isset($_GET['moins'])) {
                echo $_GET['moins'] +1;
            } 
            else {
                echo "1";
            }
            ?> name="moins">

            <input class="actuel" type="submit" value="Revenir à la semaine actuelle" name="actuel">

            <input class="plus" type="submit" value=<?php if(isset($_GET['plus'])) {
                echo $_GET['plus'] +1;
            }
            else {
                echo "1";
            } 
            ?> name="plus">
    </form>
    <hr>
    <!--semaine-->
    <table>
        <thead>
            <tr>
                <th>horaire</th>
                <th>Lu</th>
                <th>Ma</th>
                <th>Me</th>
                <th>Je</th>
                <th>Ve</th>
                <th>Sa</th>
                <th>Di</th>
            </tr>
        </thead>

        
    <tbody>
        <?php
            //heures
           
                    for($i=9; $i<19; $i++) { ?>
                <tr>
                    <?php
                        //jours
                        for($j=0; $j<8; $j++) { ?>
                            <td><!--<a href=./reservation-form.php>-->
                                <?php
                                 if($j==0) {
                                    echo $i. "h00";
                                }
                                  foreach($res as $key=>$value){
        
                                    $date=strtotime($value['debut']);
                                    $sql1=timestampToDateSQL($date);    
                                    $sql1 = date("Y-m-d");
                                    $hour = date('H', $date);
                                    $day_of_week = date('N', $date);
                                  
                               

                                if($i==$hour && $j==$day_of_week) {
                                    if(empty($_SESSION['login'])) {
                                        echo $value['description'];
                                    }
                                    else{
                                        echo '<a href=reservation.php?id='.$value['id'].'>'. $value['description'].'</a>';
                                    }
                                    

                                }
                            }
                            
                                ?>
                            </a></td>
                   <?php } 
                    ?>
                </tr>
       <?php }
            
            
        ?>
    </tbody>
    </table>

    <footer>
        <?php
            require "footer.php";
        ?>
    </footer>
</body>
</html>