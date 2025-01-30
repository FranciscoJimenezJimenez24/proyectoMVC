<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/tarea.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/usuario.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/models/usuarioTarea.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/proyectoMVC/view.php";


class GestionTareas{
    
    private $db;
    private $tarea;
    private $usuario;
    private $usuarioTarea;

    public function __construct(){
        $this->tarea = new Tarea();
        $this->usuario = new Usuario();
        $this->usuarioTarea = new UsuarioTarea();
    }

    public function mostrarTareasUsuario($idUsuario){
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        for ($i = 0; $i < $tareas->num_rows; $i++){
            $tarea = $tareas->fetch_assoc();
            $data["tareas"][] = $this->tarea->getTarea($tarea["id"]);
        }
        View::render("tarea/all", $data);
    }

    public function insertarTarea(){
        $idUsuario = $_SESSION["idUsuario"];
        $titulo = $_REQUEST["titulo"];
        $descripcion = $_REQUEST["descripcion"];
        $result = $this->tarea->insert($titulo, $descripcion);
        if ($result == 1){
            $this->usuarioTarea->insert($this->tarea->getMaxId(), $idUsuario);
        }
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        for ($i = 0; $i < $tareas->num_rows; $i++){
            $tarea = $tareas->fetch_assoc();
            $data["tareas"][] = $this->tarea->getTarea($tarea["id"]);
        }
        View::render("tarea/create", $data);
    }

    public function modificarTarea(){
        $idUsuario = $_SESSION["idUsuario"];
        $idTarea = $_REQUEST["idTarea"];
        $titulo = $_REQUEST["titulo"];
        $descripcion = $_REQUEST["descripcion"];
        $this->tarea->update($idTarea, $titulo, $descripcion);
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        for ($i = 0; $i < $tareas->num_rows; $i++){
            $tarea = $tareas->fetch_assoc();
            $data["tareas"][] = $this->tarea->getTarea($tarea["id"]);
        }
        View::render("tarea/update", $data);
    }

    public function eliminarTarea(){
        $idUsuario = $_SESSION["idUsuario"];
        $idTarea = $_REQUEST["idTarea"];
        $this->usuarioTarea->delete($idTarea);
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        for ($i = 0; $i < $tareas->num_rows; $i++){
            $tarea = $tareas->fetch_assoc();
            $data["tareas"][] = $this->tarea->getTarea($tarea["id"]);
        }
        View::render("tarea/delete", $data);
    }

    public function sendToLogin(){
        View::render("usuario/login");
    }

    public function loginUsuario(){
        $usuario = $_REQUEST["usuario"];
        $password = $_REQUEST["password"];
        $idUsuario = $this->usuario->login($usuario, $password);
        $_SESSION["idUsuario"] = $idUsuario;
        if ($idUsuario > 0){
            $this->mostrarTareasUsuario($idUsuario);
        }else{
            View::render("usuario/login", ["alert" => "Usuario o contraseña incorrectos"]);
        }
    }

    public function registerUsuario(){
        $usuario = $_REQUEST["usuario"];
        $password = $_REQUEST["password"];
        $rpassword = $_REQUEST["rpassword"];
        if ($this->usuario->register($usuario, $password, $rpassword) == -1){
            View::render("usuario/register", ["alert" => "Las contraseñas no coinciden"]);
        }
        View::render("usuario/login", ["alert" => "Usuario registrado correctamente"]);
    }
}


?>