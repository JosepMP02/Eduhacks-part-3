<?php

require_once('connecta_db_persistent.php');
require_once('funciones.php');


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["password"]) && isset($_POST["password2"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $password = $_POST["password"];
        $vpassword = $_POST["password2"];
        //Filter input 

        if($password != $vpassword){
            header("Location:../register.php?redirected=2&username=$username&mail=$email&fname=$fname&lname=$lname");
            exit;
        }else{
            
            $NumUsersExistents = verificarExistencia($username,$email);

            if($NumUsersExistents >= 1){
                header("Location:../register.php?redirected=3&username=$username&mail=$email&fname=$fname&lname=$lname");
                exit;
            }else{

                $passHash = password_hash($password,PASSWORD_DEFAULT);
                
                insertarDatos($username,$email,$fname,$lname,$passHash);
                mailActivateUser($email);
            }
        }
    }else{
        header("Location:../register.php?redirected=1");
        exit;
    }
}else{
    header("Location:../register.php?redirected=1");
    exit;
}