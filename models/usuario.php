<?php
class Usuario{
    // atributos
    private $id;
    private $usuario;
    private $password;
    
    // constructor
    public function __construct($id, $usuario, $password){
        $this->id = $id;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    // getters y setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    // método para encriptar la contraseña
    public function encriptarPassword(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }


}

?>