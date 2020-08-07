<?php
require 'config.php';

class cars{

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    
    }

    public function getCars(){
        $array = array();

        $sql = "SELECT * FROM cars";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){

            $array = $sql->fetchAll();

        }

        return $array;
    }

   
}



?>