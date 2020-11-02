<?php

class GenerosLivrosVO {
    
    private $id;
    private $livro_id;
    private $genero_id;

    private $genero_nome;


    function getId() {
        return $this->id;
    }

    function getLivroId() {
        return $this->livro_id;
    }

    function getGeneroId() {
        return $this->genero_id;
    }

    function getGeneroNome() {
        return $this->genero_nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLivroId($livroId) {
        $this->livro_id = $livroId;
    }

    function setGeneroId($generoId) {
        $this->genero_id = $generoId;
    }

    function setGeneroNome($genero_nome) {
        $this->genero_nome = $genero_nome;
    }

}
