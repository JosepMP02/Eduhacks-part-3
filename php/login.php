<?php
    require_once("./connecta_db_persistent.php");
    include_once('funciones.php');

    session_start();
    if(isset($_POST['username']) && isset( $_POST['password'])){

        $usuarioPost = $_POST['username'];
        $usuario = strtoupper($usuarioPost);
        $paswd = $_POST['password'];
        
        $userData = datosUsuario($usuario);

        if($userData['existe'] == 1 && password_verify($paswd,$userData['passhash'])){
            if($userData['active'] == 1){
                $_SESSION['username'] = $userData['username'];
                setcookie('nombre',$userData['userFirstName']." ".$userData['userLastName'],time()+3600,"/");
                updateSignIn($userData['iduser']);
                header("Location:../home.php");
                exit;
            }else{
                header("Location:../index.php?redirected=4");
                exit;
            }
        }else{
            header("Location:../index.php?redirected=2&username=$usuarioPost");
            exit;
        }                

    }else{
        header("Location:../index.php?redirected=1");
        exit;
    }
?>
