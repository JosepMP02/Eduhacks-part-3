<?php
require_once('connecta_db_persistent.php');
require_once('funciones.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_GET["id"]) && isset($_POST["flag"])){
        $id = $_GET["id"];
        $reto_dat = datosReto($id);
        $flagReal = strtoupper($reto_dat['flag']);
        $flagUser = strtoupper($_POST["flag"]);

        if($flagReal == $flagUser){ 
            //Funcion de suma de puntos del usuario (para luego, apuntao keda)
            header("Location:../reto.php?id=".$id."&checked=1");
            exit;
        }else{
            header("Location:../reto.php?id=".$id."&checked=0");
            exit;
        }
    }else{
        header("Location:../home.php");
        exit;
    }
}else{
    header("Location:../home.php");
    exit;
}
?>