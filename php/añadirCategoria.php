<?php 
//require_once('php/connecta_db_persistent.php');
require_once('funciones.php');

session_start();
if(!isset($_SESSION['username']) && !isset($_COOKIE['nombre'])){
    header("Location: ../index.php?redirected=1");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){
        $nombre = $_POST["nombre"];
        $desc = $_POST["descripcion"];
        
        //insertar los datos en la base de datos        
        insertarCategoria($nombre,$desc);
        header("Location:../home.php?redirected=1");
    }else{
        echo "tu sabe eso del heder lokeishon pues eso ea";
    }
}