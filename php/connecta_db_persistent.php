<?php
    $cadena_connexio = 'mysql:dbname=practica1php;host=localhost:3306';
    $usuari = 'php';
    $passwd = 'LaP4ssw0rToWapaNiñu';
    try{
        $db = new PDO($cadena_connexio, $usuari, $passwd, 
                        array(PDO::ATTR_PERSISTENT => true));
    }catch(PDOException $e){
        echo 'Error amb la BDs: ' . $e->getMessage();
    }