<?php
class User{
    private $user;
    private $email;
    private $senha;

    function getUser(){
        return $this->user;
    }
    function setUser($user){
        $this->user = $user;
    }

    function getSenha(){
        return $this->senha;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }

    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email = $email;
    }
}
?>