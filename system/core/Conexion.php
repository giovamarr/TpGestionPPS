<?php

class Conexion{
    

    public static function Conectar(){
     $dbhost	= "localhost";	   // localhost or IP
     $dbuser	= "root";		  // database username
     $dbpass	= "root";		     // database password
    $dbname	= "pps";    // database name
    try{
        return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }catch (Exception $e){
        die("El error de Conexión es: ". $e->getMessage());
    }
        
    }
}