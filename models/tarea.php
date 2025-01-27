<?php

include_once "model.php";

class Tarea extends Model{
    // Constructor. Especifica el nombre de la tabla de la base de datos
    public function __construct(){
        $this->table = "tarea";
        $this->idColumn = "id";
        parent::__construct();
    }

    // Devuelve el nombre de la tarea según el id
    public function getTitulo($id){
        $result = $this->db->dataQuery("SELECT titulo FROM tarea WHERE id = $id");
        return $result[0]->nombre;
    }

    // Devuelve la descripción de la tarea según el id
    public function getDescripcion($id){
        $result = $this->db->dataQuery("SELECT descripcion FROM tarea WHERE id = $id");
        return $result[0]->descripcion;
    }

    public function getTarea($id){
        $result = $this->db->dataQuery("SELECT * FROM tarea WHERE id = $id");
        return $result[0];
    }

    // Inserta una tarea. Devuelve 1 si tiene éxito o 0 si falla.
    public function insert($titulo, $descripcion){
        return $this->db->dataManipulation("INSERT INTO tarea (titulo, descripcion) VALUES ('$titulo', '$descripcion')");
    }

    // Actualiza una tarea. Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function update($id, $titulo, $descripcion){
        return $this->db->dataManipulation("UPDATE tarea SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id");
    }

    // Elimina una tarea. Devuelve 1 si tiene éxito y 0 en caso de fallo.
    public function delete($id){
        return $this->db->dataManipulation("DELETE FROM tarea WHERE id = $id");
    }

    public function getMaxId(){
        $result = $this->db->dataQuery("SELECT MAX(id) as id FROM tarea");
        return $result[0]->id;
    }

}
?>