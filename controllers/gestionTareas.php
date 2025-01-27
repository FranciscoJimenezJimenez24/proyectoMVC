<?php

include_once '../models/tarea.php';
include_once '../models/usuario.php';
include_once '../models/usuarioTarea.php';

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

    public function mostrarTareasUsuario(){
        $idUsuario = $_REQUEST["idUsuario"];
        $tareas = $this->usuarioTarea->getTareasUsuario($idUsuario);
        $data["tareas"] = [];
        for ($i = 0; $i < $tareas->num_rows; $i++){
            $tarea = $tareas->fetch_assoc();
            $data["tareas"][] = $this->tarea->getTarea($tarea["id"]);
        }
        View::render("tarea/all", $data);
    }

    public function insertarTarea(){
        $idUsuario = $_REQUEST["idUsuario"];
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
        $idUsuario = $_REQUEST["idUsuario"];
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
        $idUsuario = $_REQUEST["idUsuario"];
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
}


?>