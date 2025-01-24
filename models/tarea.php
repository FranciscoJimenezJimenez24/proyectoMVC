<?php

class Tarea{
    // atributos
    private $id;
    private $titulo;
    private $descripcion;
    private $pendiente;

    // constructor
    public function __construct($id, $titulo, $descripcion){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->pendiente = true;
    }
    
    // getters y setters
    public function getId(){
        return $this->id;
    }
    
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getDescripcion(){
        return $this->descripcion;
    }
    
    public function getPendiente(){
        return $this->pendiente;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function setPendiente($pendiente){
        $this->pendiente = $pendiente;
    }
    

}
?>