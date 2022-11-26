<?php

class Conexion{
    

    public static function Conectar(){
        // $dbhost	= "containers-us-west-66.railway.app:5672";
        // $dbuser	= "root";		  // database username
        // $dbpass	= "HM44FsFJ3z0JYlhRiwPB";		     // database password
        // $dbname	= "railway";    // database name

        $dbhost	= "localhost:8111";	   // localhost or IP
        $dbuser	= "root";		  // database username
        $dbpass	= "";		     // database password
        $dbname	= "pps";    // database name
    try{
        return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }catch (Exception $e){
        die("El error de Conexión es: ". $e->getMessage());
    }

    }
}