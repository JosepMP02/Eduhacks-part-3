<?php
    require_once('connecta_db_persistent.php');
    require_once('funciones.php');

    if(($_SERVER["REQUEST_METHOD"] == "GET") && (isset($_GET['code'])) && (isset($_GET['mail']))){
        $code = $_GET['code'];
        $userMail = $_GET['mail'];
        $existe = verificarExistencia('',$userMail);
        if($existe!=0){
            $userMailUpper = strtoupper($userMail);
            $datosUsuario = datosUsuario($userMailUpper); 

            if($datosUsuario['active'] == 0){
                activarUsuario($code,$userMail);
                eliminarUserCode(1,$userMail,$code);
                header("Location:../index.php?redirected=6");
                exit;
            }else{
                header("Location:../index.php");
                exit;
            }
        }else{
            header("Location:../index.php?redirected=5");
            exit;
        }
    }else{
        header("Location:../index.php?redirected=5");
        exit;
    }
