<?php

require '../../system/core/Conexion.php';

class UsuarioModel{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $password;
     
    public function __construct() {
        $table="usuarios";
        parent::__construct($table);
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
 
    public function insertarUsuario(){
        $db = new Conexion();
        $query="INSERT INTO users (id,nombre,apellido,email,password)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
        $save=$this->db()->query($query);
        return $save;
    }
       //Metodos de consulta
       public function getUsuario($email){
        $conn = new Conexion();
        $result = mysqli_query($conn, "SELECT id,email, password, nombre,tipo,apellido,idPPS   
                                        FROM users left join solicitudes on id=id_user WHERE email = '$email'");
        
        // Variable $row hold the result of the query
		$row = mysqli_fetch_assoc($result);
			
		// Variable $hash hold the password hash on database
		$hash = $row['password'];
        return $this->db->query($row);
}
    }
 
?>
