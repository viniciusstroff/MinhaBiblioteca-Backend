<?php

class AutoresVO {
    
    private $id;
    private $nome;
    private $sobrenome;
    private $pseudonimo;
    private $data_nascimento;
    private $nacionalidade;
    private $descricao;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getPseudonimo() {
        return $this->pseudonimo;
    }

    function getDataNascimento($dateFormat = 'Y-m-d') {

        return $this->data_nascimento ? date($dateFormat ,strtotime($this->data_nascimento)) : null;
    }

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getDescricao() {
        return $this->descricao;
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

    function setPseudonimo($pseudonimo) {
        $this->pseudonimo = $pseudonimo;
    }

    function setDataNascimento($data_nascimento) {
        $this->data_nascimento = date('Y-m-d' ,strtotime($data_nascimento));
    }

    function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
