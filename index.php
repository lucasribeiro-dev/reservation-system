<?php
require 'config.php';
require 'class/reservation.class.php';
require 'class/cars.class.php';


$reservation = new Reservation($pdo);
$cars =  new Cars($pdo);
?>

<h1> Reserve</h1>

<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <form method="GET">

            <div class="form-group">
                <select name="year" class="form-group">

                    <?php for($q=date('Y');$q>=2015;$q--): ?>
                    <option><?php echo $q;?></option>
                    <?php endfor;?>

    
                </select>
                <select name="month" class="form-group">
                    <option> 01 </option>  
                    <option> 02 </option>
                    <option> 03 </option>
                    <option> 04 </option>
                    <option> 05 </option>
                    <option> 06 </option>
                    <option> 07 </option>
                    <option> 08 </option>
                    <option> 09 </option>
                    <option> 10 </option>
                    <option> 11 </option>
                    <option> 12 </option>
                </select>
                <input class="btn btn-primary btn-sm"type="submit" value="Search"/>
                <br/>
            </div> 
        </form>
       
        <?php

        if(empty($_GET['year'])){
            exit;
        }

            $date=  $_GET['year']."-".$_GET['month'];
            $day1 = date('w', strtotime($date));
            $days = date('t', strtotime($date));
            $lines = ceil(($day1 + $days) / 7);
            $day1 = -$day1;
            $start_date = date('Y-m-d', strtotime($day1.'days', strtotime($date)));
            $end_date = date('Y-m-d', strtotime(( ($day1 + ($lines*7) - 1) ).' days', strtotime($date)));

            $list = $reservation->getReservation($start_date, $end_date);
            
        
        ?>
           

           
    <?php require 'calender.php';?>

    <hr>
    <a href="reservation.php" class="btn btn-primary">Add Reservation</a>
    </body>



</html>