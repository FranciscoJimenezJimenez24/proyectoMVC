<?php

class UsuarioTarea{
    // atributos
    private $id;
    private $idUsuario;
    private $idTarea;

    // constructor
    public function __construct($id, $idUsuario, $idTarea){
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->idTarea = $idTarea;
    }

    // getters y setters
    public function getId(){
        return $this->id;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function getIdTarea(){
        return $this->idTarea;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    public function setIdTarea($idTarea){
        $this->idTarea = $idTarea;
    }
    

}
?>