<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/tarea.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/usuario.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/usuarioTarea.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/view.php";


class GestionTareas
{

    private $db;
    private $tarea;
    private $usuario;
    private $usuarioTarea;

    public function __construct()
    {
        $this->tarea = new Tarea();
        $this->usuario = new Usuario();
        $this->usuarioTarea = new UsuarioTarea();
    }

    public function mostrarTareasUsuario()
    {
        if (!isset($_COOKIE["idUsuario"])) {
            die("Error: idUsuario no está definido en las cookies.");
        }

        $idUsuario = $_COOKIE["idUsuario"];
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        foreach ($tareas as $tarea) {
            $data["tareas"][] = $this->tarea->getTarea(intval($tarea->tarea));
        }
        View::render("tarea/all", $data);
    }

    public function insertarTarea()
    {
        $idUsuario = $_COOKIE["idUsuario"];
        $titulo = $_REQUEST["titulo"];
        $descripcion = $_REQUEST["descripcion"];
        $result = $this->tarea->insert($titulo, $descripcion);
        if ($result == 1) {
            $this->usuarioTarea->insert($this->tarea->getMaxId(), $idUsuario);
        }
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        foreach ($tareas as $tarea) {
            $data["tareas"][] = $this->tarea->getTarea(intval($tarea->tarea));
        }
        View::render("tarea/all", $data);
    }

    public function modificarTarea()
    {
        $idTarea = $_REQUEST["idTarea"];
        $titulo = $_REQUEST["titulo"];
        $descripcion = $_REQUEST["descripcion"];
        $this->tarea->update($idTarea, $titulo, $descripcion);
        setcookie("idTarea", "", time() - 3600, "/");
        header("Location: index.php?action=mostrarTareasUsuario");
        exit();
    }

    public function eliminarTarea()
    {
        $idUsuario = $_COOKIE["idUsuario"];
        $idTarea = $_COOKIE["idTarea"];
        $this->usuarioTarea->deleteUsuarioTarea($idUsuario, $idTarea);
        setcookie("idTarea", "", time() - 3600, "/");
        header("Location: index.php?action=mostrarTareasUsuario");
        exit();
    }


    public function loginUsuario()
    {
        $usuario = $_REQUEST["user"];
        $password = $_REQUEST["password"];
        $idUsuario = intval($this->usuario->login($usuario, $password));
        if ($idUsuario > 0) {
            setcookie("idUsuario", $idUsuario, time() + 3600, "/");
            header("Location: index.php?action=mostrarTareasUsuario");
            exit;
        } else {
            View::render("usuario/login", ["alert" => "Usuario o contraseña incorrectos"]);
        }
    }


    public function registerUsuario()
    {
        $usuario = $_REQUEST["user"];
        $password = $_REQUEST["password"];
        $rpassword = $_REQUEST["rpassword"];
        if ($this->usuario->register($usuario, $password, $rpassword) == -1) {
            View::render("usuario/register", ["alert" => "Las contraseñas no coinciden $password != $rpassword"]);
        } else {
            View::render("usuario/login", ["alert" => "Usuario registrado correctamente"]);
        }
    }
    public function cancelarAccion()
    {
        setcookie("idTarea", "", time() - 3600, "/");
        header("Location: index.php?action=mostrarTareasUsuario");
        exit;
    }

    public function sendToLogin()
    {
        View::render("usuario/login");
    }

    public function sendToRegister()
    {
        View::render("usuario/register");
    }

    public function sendToCreateTarea()
    {
        View::render("tarea/create");
    }

    public function sendToUpdateTarea()
    {
        if (isset($_GET['idTarea'])) {
            $idTarea = intval($_GET['idTarea']);
            $tarea = $this->tarea->getTarea($idTarea);

            if ($tarea) {
                $data["tarea"] = $tarea;
                View::render("tarea/update", $data);
            } else {
                echo "Error: No se ha encontrado la tarea.";
                die();
            }
        } else {
            echo "Error: no se ha especificado el id de la tarea.";
            die();
        }
    }



    public function sendToDeleteTarea()
    {
        if (isset($_GET['idTarea'])) {
            $idTarea = intval($_GET['idTarea']);
            setcookie("idTarea", $idTarea, time() + 3600, "/");
            header("Location: index.php?action=deleteTareaForm");
            exit;
        } else {
            echo "Error: no se ha especificado el id de la tarea.";
            die();
        }
    }

    public function deleteTareaForm()
    {
        if (!isset($_COOKIE["idTarea"])) {
            die("Error: idTarea no está definido en las cookies.");
        }

        View::render("tarea/delete");
    }

    public function updateTareaForm()
    {
        if (!isset($_COOKIE["idTarea"])) {
            die("Error: idTarea no está definido en las cookies.");
        }
        View::render("tarea/update");
    }

}