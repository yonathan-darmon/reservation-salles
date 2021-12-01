<?php
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./planning.css">
</head>
<body>
<center><form method="post" action="#">
    <select name="month">
        <option value="1">Jan</option>
        <option value="2">Fev</option>
        <option value="3">Mar</option>
        <option value="4">Avr</option>
        <option value="5">Mai</option>
        <option value="6">Juin</option>
        <option value="7">Juil</option>
        <option value="8">Aout</option>
        <option value="9">Sep</option>
        <option value="10">Oct</option>
        <option value="11">Nov</option>
        <option value="12">Dec</option>
    </select>
    <select name="week">
        <option value="1">Semaine 1</option>
        <option value="2">Semaine 2</option>
        <option value="3">Semaine 3</option>
        <option value="4">Semaine 4</option>
    </select>
    <select name="year">
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
    </select>
    <input type="submit" value="valider" name="valider" class="bouton">
</center></form>

<table>
    <th><table class="table table-bordered bordered table-striped table-condensed datatable table-responsive" style="font-size:0.8vw; ">
<thead>
    <th>Lu</th>
    <th>Ma</th>
    <th>Me</th>
    <th>Je</th>
    <th>Ve</th>
    <th>Sa</th>
    <th>Di</th>
</thead>
    <tbody style="text-align:center;">
<tr>
    <?php
        if(isset($_POST['valider'])) {
            $month = $_POST['month'];
            $year = $_POST['year'];
            $week = $_POST['week'];
            $day = '1';
            $endDate = date("t", mktime(0,0,0, $month,$day,$year));
                $s = date("w", mktime(0,0,0, $month,1,$year));
            for($ds=1; $ds<=$s; $ds++) {
                echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
                </td>";
            }
            for($d=1; $d<=$endDate; $d++) {
                if(date("w", mktime(0,0,0, $month,$d,$year)) == 0) {
                    echo "<tr>";
                }
                if(date("d", mktime(0,0,0, $month,$d,$year)) == 0) {
                    $fontColor="red";
                    echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
                }
                else{
                    $fontColor="green";
                    echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
                }
                if(date("w", mktime(0,0,0, $month,$d,$year)) == 6) {
                    echo "</tr>";
                }
            }
        }
    ?>
    </tr>
    </tbody>
    </table>
</body>
</html>