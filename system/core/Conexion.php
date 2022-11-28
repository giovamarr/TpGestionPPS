<?php

class Conexion{
    

    public static function Conectar(){
        $dbhost	= "containers-us-west-97.railway.app:7959";
        $dbuser	= "root";		  // database username
        $dbpass	= "IMEc8SeZle1Xfqxx2wip";		     // database password
        $dbname	= "railway";    // database name

        // $dbhost	= "localhost:8111";	   // localhost or IP
        // $dbuser	= "root";		  // database username
        // $dbpass	= "";		     // database password
        // $dbname	= "pps";    // database name
    try{
        return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }catch (Exception $e){
        die("El error de Conexión es: ". $e->getMessage());
    }

    }
}