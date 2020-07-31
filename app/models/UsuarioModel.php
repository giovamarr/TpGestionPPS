<?php

require '../../system/core/Conexion.php';

class UsuarioModel{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $password;
    protected $tipo;
     
    public function __construct() {
        $table="usuarios";
        //parent::__construct($table);
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
 
    public function insertarUsuario(){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query="INSERT INTO users (nombre,apellido,email,password)
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',

                       '".$this->password."');";
        $vResultado = mysqli_query($cnn, $query);       
        return $vResultado;
    }
    
       //Metodos de consulta
    public function getUsuario($email){
        $ob = new Conexion();
        $con=$ob->conectar();
        $result = mysqli_query($con, "SELECT id,email, password, nombre,tipo,apellido,idPPS FROM users left join solicitudes on id=id_user WHERE email = '$email'");
        
        // Variable $row hold the result of the query
        $row = mysqli_fetch_assoc($result);
			
        return $row;
}
    }
 
?>
