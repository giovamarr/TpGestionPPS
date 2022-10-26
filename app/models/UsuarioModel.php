<?php
class UsuarioModel{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $email;
    protected $password;
    protected $tipo;
     
    public function __construct() {
        require_once '../../system/core/Conexion.php';
        //parent::__construct($table);
    }  
 
    public function insertarUsuario(){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query="INSERT INTO users (nombre,apellido,email,password)
                       '".$this->nombre."',
                       '".$this->apellido."',
                       '".$this->email."',
                       '".$this->password."');";
        $vResultado = mysqli_query($con, $query);       
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

        public function getProfesores(){
            $ob = new Conexion();
            $con=$ob->conectar();
            $result = mysqli_query($con, "SELECT u.id, u.nombre, u.apellido FROM users u INNER JOIN solicitudes s ON s.id_Profe=u.id where u.tipo = 2   GROUP BY u.id HAVING COUNT(u.id)<10");
            return $result;
            }

        public function insertUsuario($name,$surname,$email,$password,$tipo){
            $ob = new Conexion();
            $con=$ob->conectar();
            $result = mysqli_query($con, "INSERT INTO users (nombre, apellido, password,email,tipo) VALUES ('$name', '$surname', '$password','$email','$tipo')");
            return $result;
            }


    }
