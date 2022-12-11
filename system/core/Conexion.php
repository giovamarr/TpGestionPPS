<?php

class Conexion{
    

    public static function Conectar(){
        $dbhost	= "containers-us-west-148.railway.app:6548";
        $dbuser	= "root";		  // database username
        $dbpass	= "JN561mjP5of8A1VkVz6J";		     // database password
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