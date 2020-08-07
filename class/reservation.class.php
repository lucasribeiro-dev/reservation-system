<?php
require 'config.php';

class Reservation{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getReservation($start_date, $end_date){
        $array = array();

        $sql = "SELECT * FROM reservation WHERE ( NOT ( start_date > :end_date OR end_date < :start_date ) )";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":start_date", $start_date);
        $sql->bindValue(":end_date", $end_date);
        $sql->execute();
        if($sql->rowCount() > 0){

            $array = $sql->fetchAll();

        }

        return $array;
    }

    public function check_Reservations($car, $start_date, $end_date){
        
		$sql = "SELECT * FROM reservation WHERE id_car = :car AND ( NOT ( start_date > :end_date OR end_date < :start_date ) )";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(":car", $car);
        $sql->bindValue(":start_date", $start_date);
        $sql->bindValue(":end_date", $end_date);
        $sql->execute();

        if($sql->rowCount() > 0 ){
            return false;
        } else{
            return true;
        }   


    }

    public function reserve($car, $start_date, $end_date, $name){
		$sql = "INSERT INTO reservation (id_car, start_date, end_date, name) VALUES (:car, :start_date, :end_date, :name)";
		$sql = $this->pdo->prepare($sql);
        $sql->bindValue(":car", $car);
        $sql->bindValue(":start_date", $start_date);
        $sql->bindValue(":end_date", $end_date);
        $sql->bindValue(":name", $name);
        $sql->execute();
    }


}


?>