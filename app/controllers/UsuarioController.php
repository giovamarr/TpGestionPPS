<?php
if (isset($_GET['m'])) {
    $usercontroller = new UsuarioController();
    $a = $_GET['m'];
    $usercontroller->$a();
} elseif (isset($_GET['i']) == 1) {
    $controlador = new UsuarioController();
    $controlador->verifyLogin($_POST['email'], $_POST['password']);
}

require_once '../models/UsuarioModel.php';

class UsuarioController
{


    public function __construct()
    {
        require_once '../models/UsuarioModel.php';
    }

    public function verifyLogin($email, $password)
    {
        session_start();
        $user = new UsuarioModel();
        $infoUsuario = $user->getUsuario($email);
        $hash = $infoUsuario['password'];
        if (password_verify($password, $hash)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $infoUsuario['nombre'];
            $_SESSION['ape'] = $infoUsuario['apellido'];
            $_SESSION['idPPS'] = $infoUsuario['idPPS'];
            $_SESSION['id'] = $infoUsuario['id'];
            $_SESSION['type'] = $infoUsuario['tipo'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);


            if ($infoUsuario['tipo'] == 1) {
                header('Location: ../views/AlumnoHome.php');
                exit();
            } elseif ($infoUsuario['tipo'] == 2) {
                header('Location: ../views/DocenteHome.php');
                exit();
            } elseif ($infoUsuario['tipo'] == 3) {
                header('Location: ../views/ResponsableHome.php');
                exit();
            }
        } else {
            header('Location: ../../index.php?e=1');
            exit();
        }
    }

    public function getProfesores()
    {
        $user = new UsuarioModel();
        $profesores = $user->getProfesores();
        return $profesores;
    }
    public function getInfoProfesores()
    {
        $user = new UsuarioModel();
        $profesores = $user->getInfoProfesores();
        return $profesores;
    }

    public function getById($id)
    {
        $user = new UsuarioModel();
        $user = $user->getById($id);
        return $user;
    }

    public function insertarUser()
    {
        $user = new UsuarioModel();

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $tipo = $_POST['tipo'];
        $infoUsuario = $user->getUsuario($email);
        if ($tipo == 1) {
            if ($infoUsuario) {
                header('Location: ../views/PublicRegister.php?r=1');
                exit();
            } else {
                if (strcmp($password, $password2) == 0) {
                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $insertado = $user->insertUsuario($name, $surname, $email, $passHash, $tipo);
                    if ($insertado) {
                        header('Location: ../views/PublicRegister.php?a=1');
                        exit();
                    } else {
                        echo "<div class='alert alert-success mt-4' role='alert'><h3>No se pudo Insertar el Usuario</h3>
                                        <a class='btn btn-outline-primary' href='../views/login.php' role='button'>Login</a></div>";
                    }
                } else {
                    header('Location: ../views/PublicRegister.php?e=1');
                    exit();
                }
            }
        } else {
            if ($infoUsuario) {
                header('Location: ../views/ResponsableRegistrationDocente.php?r=1');
                exit();
            } else {
                if (strcmp($password, $password2) == 0) {
                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $insertado = $user->insertUsuario($name, $surname, $email, $passHash, $tipo);
                    if ($insertado) {
                        header('Location: ../views/ResponsableRegistrationDocente.php');
                        exit();
                    } else {
                        echo "<div class='alert alert-success mt-4' role='alert'><h3>No se pudo Insertar el Usuario</h3>
                                        <a class='btn btn-outline-primary' href='../views/login.php' role='button'>Login</a></div>";
                    }
                } else {
                    header('Location: ../views/ResponsableRegistrationDocente.php?e=1');
                    exit();
                }
            }
        }
    }
}