<?php

class Conexion{
    private $host,$user,$pass,$database;


    public function __construct()   
    {
        $this->host	= "localhost";	   // localhost or IP
        $this->user	= "root";		  // database username
        $this->pass	= "root";		     // database password
        $this->name	= "pps";    // database name

    }

    public function conectar(){
        $con = mysqli_connect($host, $user, $pass, $name);
        return $con;
}
}