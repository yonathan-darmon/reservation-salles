<?php
   /* session_start();
    $connect = mysqli_connect("localhost", "root", "", "reservationsalles");

    $req = mysqli_query($connect, "SELECT `titre`, `description`, `debut`, `fin` FROM `reservations`");
    $res = mysqli_fecth_all($res, MYSQLI_ASSOC);*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./planning5.css">
</head>
<body>
    <center> Semaine du 6 au 12 Décembre </center>
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

        <!--jours-->
    <tbody>
        <?php
            for($i=1; $i<10; $i++) {
                echo "<tr></tr>";
        }
            for($j=1; $j<9; $j++) {
                echo "<td></td>";
        }
        ?>
    </tbody>
    </table>
</body>
</html>