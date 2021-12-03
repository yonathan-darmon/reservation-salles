<?php
    session_start();
    require "fonction.php";

   
    if (isset($_GET['moins'])){
        $moins= $_GET['moins'];
    $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEARWEEK(debut)=YEARWEEK(NOW()- INTERVAL 1 WEEK)");
        
    $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
    
}
    elseif (isset($_GET['plus'])){
        
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEARWEEK(debut)=YEARWEEK(NOW() + INTERVAL 1 WEEK)");
       
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);
        $week = date("w", mktime(0,0,0, +1));
    }


    else{
        
        $req = mysqli_query(connectionbdd(), "SELECT *FROM reservations WHERE YEAR( debut ) = YEAR ( CURDATE() ) AND WEEK( debut ) = WEEK ( CURDATE() )");
        $res = mysqli_fetch_all($req, MYSQLI_ASSOC);

    }
     foreach($res as $key => $value);
     $date=strtotime($value['debut']);
     $reldate=timestampToDateSQL($date);
     $req2=mysqli_query(connectionbdd(), "SELECT * DATEADD (week,1, $reldate) FROM reservation");
     //$res2=mysqli_fetch_all($req2,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/planning5.css">
</head>
<body>
    <form action="#" method="get">
            
            <p class="text"> Planning </p>
            <input class="moins" type="submit" value="<" name="moins">
            <input class="plus" type="submit" value=">" name="plus">
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
                        for($j=1; $j<9; $j++) { ?>
                            <td>
                                <?php
                                 if($j==1) {
                                    echo $i. "h00";
                                }
                                  foreach($res as $key=>$value){
        
                                    $date=strtotime($value['debut']);
                                    $sql1=timestampToDateSQL($date);    
                                    $sql1 = date("Y-m-d");
                                    $hour = date('H', $date);
                                    $day_of_week = date('N', $date);
                                  
                               

                                if($i==$hour && $j==$day_of_week) {
                                    echo $value['description'];
                                }
                            }
                            
                                ?>
                            </td>
                   <?php }
                    ?>
                </tr>
       <?php }
            
            
        ?>
    </tbody>
    </table>
</body>
</html>