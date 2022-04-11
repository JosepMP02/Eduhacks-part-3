<?php
require('php/connecta_db_persistent.php');
include_once('php/funciones.php');

//$res = obtenerCategoriaReto(8);

//echo $res;
//print_r($res);

$rutaFile = buscarFichero(18);

if(strlen($rutaFile)>0){
    echo '<td>Si</td>';
    echo $rutaFile;
}else{
    echo '<td>No</td>';	
    echo $rutaFile;
}