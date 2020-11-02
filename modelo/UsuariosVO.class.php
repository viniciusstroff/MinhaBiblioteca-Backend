<?php

class UsuariosVO {
    
    private $id;
    private $nome;
    private $sobrenome;
    private $login;
    private $senha;
    private $perfil;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }
    
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil(){
        return $this->perfil; 
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }
    
    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil){
        $this->perfil = $perfil;
    }

}
