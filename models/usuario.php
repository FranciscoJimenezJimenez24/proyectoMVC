<?php
include_once "model.php";

/*
CREATE TABLE `usuarios` (

  `usuario` varchar(50) NOT NULL,

  `password` varchar(200) NOT NULL,

  `id` int primary key AUTO_INCREMENT

) ;
 */
class Usuario extends Model{

    public function __construct(){
        $this->table = "usuarios";
        $this->idColumn = "id";
        parent::__construct();
    }

    public function getUsuario($id){
        $result = $this->db->dataQuery("SELECT usuario FROM usuario WHERE id = $id");
        return $result[0]->usuario;
    }

    public function getPassword($id){
        $result = $this->db->dataQuery("SELECT password FROM usuario WHERE id = $id");
        return $result[0]->password;
    }

    public function insert($usuario, $password){
        return $this->db->dataManipulation("INSERT INTO usuario (usuario, password) VALUES ('$usuario', '$password')");
    }

    public function update($id, $usuario, $password){
        return $this->db->dataManipulation("UPDATE usuario SET usuario = '$usuario', password = '$password' WHERE id = $id");
    }

    public function delete($id){
        return $this->db->dataManipulation("DELETE FROM usuario WHERE id = $id");
    }

}
?>