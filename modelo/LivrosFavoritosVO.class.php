<?php

class LivrosFavoritosVO {
    
    private $id;
    private $livro_id;
    private $usuario_id;
    private $livro_titulo;

    function getId() {
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getLivroId() {
        return $this->livro_id;
    }

    function setLivroId($livroId){
        $this->livro_id = $livroId;
    }

    function getUsuarioId() {
        return $this->usuario_id;
    }

    function setUsuarioId($usuarioId){
        $this->usuario_id = $usuarioId;
    }

    function getLivroTitulo() {
        return $this->livro_titulo;
    }

    function setLivroTitulo($titulo){
        $this->livro_titulo = $titulo;
    }



   
    



   

}
