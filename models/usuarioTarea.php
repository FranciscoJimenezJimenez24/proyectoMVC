<?php
include_once "model.php";

class UsuarioTarea extends Model{
    public function __construct(){
        $this->table = "usuarios_tarea";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function getTarea($id){
        $result = $this->db->dataQuery("SELECT tarea FROM usuarios_tarea WHERE id = $id");
        return $result[0]->tarea;
    }

    public function getUsuario($id){
        $result = $this->db->dataQuery("SELECT usuario FROM usuarios_tarea WHERE id = $id");
        return $result[0]->usuario;
    }

    public function insert($tarea, $usuario){
        return $this->db->dataManipulation("INSERT INTO usuarios_tarea (tarea, usuario) VALUES ('$tarea', '$usuario')");
    }

    public function update($id, $tarea, $usuario){
        return $this->db->dataManipulation("UPDATE usuarios_tarea SET tarea = '$tarea', usuario = '$usuario' WHERE id = $id");
    }

    public function delete($id){
        return $this->db->dataManipulation("DELETE FROM usuarios_tarea WHERE id = $id");
    }

    public function getAll(){
        $list = $this->db->dataQuery("SELECT * FROM ".$this->table);
        return $list;
    }

    public function getTareasUsuario($usuario){
        $list = $this->db->dataQuery("SELECT tarea FROM ".$this->table." WHERE usuario = $usuario");
        return $list;
    }

    public function getUsuarioTarea($usuario, $tarea){
        $list = $this->db->dataQuery("SELECT * FROM ".$this->table." WHERE usuario = $usuario AND tarea = $tarea");
        return $list;
    }

    public function deleteUsuarioTarea($usuario, $tarea){
        return $this->db->dataManipulation("DELETE FROM usuarios_tarea WHERE usuario = $usuario AND tarea = $tarea");
    }
}
?>