<?php
    session_start();
    $_SESSION = array();
    setcookie(session_name(),"",time()-3600,"/");
    setcookie('nombre',"",time()-3600,"/");
    session_destroy();
    header("Location: ../index.php?redirected=3");
    exit;
