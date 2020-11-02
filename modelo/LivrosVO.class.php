<?php

class LivrosVO {
    
    private $id;
    private $titulo;
    private $subtitulo;
    private $autor_id;
    private $editora_id;
    private $resumo;
    private $numero_de_paginas;
    private $imagem_id;


    private $autor_nome;
    private $editora_nome;

    function getId() {
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    function getSubTitulo() {
        return $this->subtitulo;
    }

    function setSubTitulo($subtitulo){
        $this->subtitulo = $subtitulo;
    }

    function getAutorId() {
        return $this->autor_id;
    }

    function getAutorNome() {
        return $this->autor_nome;
    }

    function setAutorId($autor_id){
        $this->autor_id = $autor_id;
    }

    function setAutorNome($autorNome) {
        $this->autor_nome = $autorNome;
    }

    function getEditoraId() {
        return $this->editora_id;
    }

    function getEditoraNome() {
        return $this->editora_nome;
    }

    function setEditoraId($editora_id){
        $this->editora_id = $editora_id;
    }

    function setEditoraNome($editoraNome) {
        $this->editora_nome = $editoraNome;
    }

    function getResumo() {
        return $this->resumo;
    }
    
    function setResumo($resumo){
        $this->resumo = $resumo;
    }

    function getNumeroDePaginas() {
        return $this->numero_de_paginas ? $this->numero_de_paginas : 0;
    }

    function setNumeroDePaginas($numero_de_paginas){
        $this->numero_de_paginas = $numero_de_paginas;
    }

    function getImagemId() {
        return $this->imagem_id;
    }

    function setImagemId($imagem_id) {
        $this->imagem_id = $imagem_id;
    }

}
