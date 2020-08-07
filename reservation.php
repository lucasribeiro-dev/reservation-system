<?php
require 'config.php';
require 'class/reservation.class.php';
require 'class/cars.class.php';

$reservation = new Reservation($pdo);
$cars =  new Cars($pdo);

if(!empty($_POST['car'])){
    $car = addslashes($_POST['car']);
    $start_date = addslashes($_POST['start_date']);
    $end_date = addslashes($_POST['end_date']);
    $name = addslashes($_POST['name']);

    if($reservation->check_Reservations($car, $start_date, $end_date)){
        $reservation->reserve($car, $start_date, $end_date, $name);
        header("Location: index.php");

    }else{
        echo"<script>alert('This car has already been reserved')</script>";
    }


  
}

?>

<html>
    <head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <div class="container">
        <div class="row" style="display: flex; padding-top: 15%;">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
                <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Reservation</h5>
                <form class="form-signin" method="POST">

                <div class="form-group">
                    <select name="car" class="form-control">
                    <?php
                        $list = $cars->getCars();
                        foreach($list as $car):
                            ?>
                            <option value="<?php echo $car['id']; ?>"><?php echo $car['name']; ?></option>
                            <?php
                        endforeach;
		                    ?>
                    </select>
                    <br/>
                </div> 
            
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Start Date" name="start_date"required>
                    <br/>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="End Date" name="end_date"required>
                    <br/>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name of People" name="name"required>
                    <br/>
                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Reserve</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    </body>

</html>