<?php
class SolicitudesModel
{
    protected $idPPS;
    protected $id_Profe;
    protected $caractPPS;
    protected $id_user;
    protected $nombreEntidad;
    protected $direccion;
    protected $localidad;
    protected $cp;
    protected $tel;
    protected $emailE;
    protected $contactoEntidad;
    protected $PPSTerminada;

    public function __construct()
    {
        require_once '../../system/core/Conexion.php';
    }

    public function insertarSolicitudPPS($caractPPS, $nombreEntidad, $direccion, $cp, $localidad, $telefono, $email, $contacto, $id_user)
    {
        if (
            strlen($caractPPS) >= 5 and strlen($nombreEntidad) >= 5 and strlen($direccion) >= 5 and strlen($cp) >= 4 and strlen($localidad) >= 5 and strlen($telefono) >= 7 and strlen($email) >= 5 and strlen($contacto) >= 5
            and is_numeric($id_user) and is_numeric($telefono)
        ){
            $ob = new Conexion();
            $con = $ob->conectar();
            $date=date('Y-m-d');
            $query = "INSERT INTO solicitudes (caractPPS, nombreEntidad, direccion, cp, localidad, tel, emailE, contactoEntidad, id_user,date) 
                    VALUES ('$caractPPS', '$nombreEntidad', '$direccion','$cp','$localidad', '$telefono', '$email','$contacto',$id_user,'$date')";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

    public function chequearID($id_user)
    {
        if (is_numeric($id_user)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $checkID = "SELECT * FROM solicitudes WHERE id_user = '$id_user' ";
            $result = $con->query($checkID);
            return $count = mysqli_num_rows($result);
        }
    }
    public function getSolicitud($id_user)
    {
        if (is_numeric($id_user)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $checkID = "SELECT * FROM solicitudes WHERE id_user = '$id_user' and id_Profe IS NOT NULL";
            $result = $con->query($checkID);
            return $count = mysqli_num_rows($result);
        }
    }
    public function chequearHoras($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();        
            $countHoras = "SELECT s.idPPS,SUM(e.hsTrabajadas) as Horas FROM solicitudes s LEFT JOIN seguimientos e ON e.id_PPS=s.idPPS WHERE s.idPPS = '$idPPS' and s.id_Profe is not null and e.aprobadoSeg=1 GROUP BY s.idPPS";				
            $vResultado = mysqli_query($con, $countHoras);
            return $vResultado;
        }
    }
    
    public function TotaldePPSsinDocente()
    {
        $ob = new Conexion();
        $con = $ob->conectar();
        $vSql = "SELECT * FROM solicitudes where id_Profe IS NULL";
        $vResultado = $con->query($vSql);
        return $total_registros = mysqli_num_rows($vResultado);
    }

    public function getPPSPaginado($inicio, $Cant_por_Pag)
    {
        if (is_numeric($inicio) and is_numeric($Cant_por_Pag)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT * FROM solicitudes sol inner join users u on u.id=sol.id_user 
                    WHERE sol.id_Profe IS NULL" . " limit " . $inicio . "," . $Cant_por_Pag;
            $vResultado = $con->query($vSql);
            return $vResultado;
        }
    }

    public function TotaldePPSAprobadas()
    {
        $ob = new Conexion();
        $con = $ob->conectar();
        $vSql = "SELECT * FROM solicitudes sol INNER join finalreport fr on sol.idPPS=fr.idPPS_FP inner join users u on sol.id_user=u.id inner join users up on sol.id_Profe=up.id where fr.aprobadaFR is not null";
        $vResultado = $con->query($vSql);
        return $total_registros = mysqli_num_rows($vResultado);
    }

    public function getPPSAprobadasPaginado($inicio, $Cant_por_Pag)
    {
        if (is_numeric($inicio) and is_numeric($Cant_por_Pag)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT u.nombre,u.apellido,sol.*,up.nombre as nombreP,up.apellido as apellidoP, u.id as IdUser, up.id as IdProf FROM solicitudes sol INNER join finalreport fr on sol.idPPS=fr.idPPS_FP inner join users u on sol.id_user=u.id inner join users up on sol.id_Profe=up.id where fr.aprobadaFR =1 and sol.PPSTerminada is null" . " limit " . $inicio . "," . $Cant_por_Pag;
            $vResultado = $con->query($vSql);
            return $vResultado;
        }
    }

    public function getPPSAprobadasFechaPaginado($inicio, $month, $year, $Cant_por_Pag)
    {
        if (is_numeric($inicio) and is_numeric($month) and is_numeric($year) and is_numeric($Cant_por_Pag)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT u.nombre,u.apellido,sol.*,up.nombre as nombreP,up.apellido as apellidoP FROM solicitudes sol INNER join finalreport fr on sol.idPPS=fr.idPPS_FP inner join users u on sol.id_user=u.id inner join users up on sol.id_Profe=up.id where fr.aprobadaFR =1 and sol.PPSTerminada is not null and month(fr.date)='$month' and year(fr.date)" . " limit " . $inicio . "," . $Cant_por_Pag;
            $vResultado = $con->query($vSql);
            return $vResultado;
        }
    }

    public function evaluarPPS($idPPS, $valor,$comentario)
    {
        if (is_numeric($idPPS) and is_numeric($valor)){
            $ob = new Conexion();
            $con = $ob->conectar();
            if($valor==1){
                $query = "UPDATE solicitudes SET PPSTerminada='$valor' where idPPS='$idPPS'";
            }else{
                $comentario = "Comentario del Responsable: ". $comentario;
                $query = "UPDATE finalreport SET aprobadaFR=2 , comentario='$comentario' where idPPS_FP='$idPPS' and aprobadaFR=1";
            }
            
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

    public function elegirProfesor($idPPS, $idProfe)
    {
        if (is_numeric($idPPS) and is_numeric($idProfe)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $query = "UPDATE solicitudes SET id_Profe='$idProfe' where idPPS='$idPPS'";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

    public function getMailUserDocente($idPPS)
    {
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT u.email FROM  solicitudes s inner join users u on u.id=s.id_Profe where s.idPPS='$idPPS'";
            $segui = mysqli_query($con, $vSql);
            $vResultado = mysqli_fetch_array($segui);
            return $vResultado['email'];
        }
    }
    public function getMailUserAlumno($idPPS)
    {
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT u.email FROM  solicitudes s inner join users u on u.id=s.id_user where s.idPPS='$idPPS'";
            $segui = mysqli_query($con, $vSql);
            $vResultado = mysqli_fetch_array($segui);
            return $vResultado['email'];
        }
    }

    public function TotaldePPSParaDocente($idProfe)
    {
        if (is_numeric($idProfe)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT * FROM solicitudes where id_Profe ='$idProfe'";
            $vResultado = $con->query($vSql);
            return $total_registros = mysqli_num_rows($vResultado);
        }
    }

    public function getPPSPaginadoParaDocente($inicio, $Cant_por_Pag, $idProfe)
    {
        if (is_numeric($inicio) and is_numeric($Cant_por_Pag) and is_numeric($idProfe)){
            $ob = new Conexion();
            $con = $ob->conectar();
            $vSql = "SELECT * FROM solicitudes sol inner join users u on u.id=sol.id_user 
                    WHERE sol.id_Profe ='$idProfe'" . " limit " . $inicio . "," . $Cant_por_Pag;
            $vResultado = $con->query($vSql);
            return $vResultado;
        }
    }

    // public function desaprobarPPS($idPPS){
    //     $ob = new Conexion();
    //     $con=$ob->conectar();
    //     $query = "UPDATE solicitudes SET PPSTerminada=2 where idPPS='$idPPS'";
    //     $result = mysqli_query($con, $query);
    //     return $result;
    // }
    // public function aprobarPPS($idPPS){
    //     $ob = new Conexion();
    //     $con=$ob->conectar();
    //     $query = "UPDATE solicitudes SET PPSTerminada=1 where idPPS='$idPPS'";
    //     $result = mysqli_query($con, $query);
    //     return $result;
    // }


}