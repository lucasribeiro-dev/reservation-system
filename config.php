<?php

try{
    $pdo = new PDO("mysql:dbname=reservation_system; host=localhost", 'root', '');

} catch(PDOExcepetion $e){
    echo "ERRO: ".$e-getMessage();
    exit;
}


?>