<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'LivrosVO.class.php';

class LivrosDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($filtros= null) {
        try{
            $where = "";

            if($filtros){
                $where = "WHERE titulo LIKE '%$filtros%' OR subtitulo LIKE '%$filtros%' OR autores.nome LIKE '%$filtros%' OR editoras.nome LIKE '%$filtros%'";
            }
            $query = ("SELECT livros.*, editoras.nome as editora_nome, autores.nome as autor_nome 
                        FROM livros 
                        INNER JOIN autores on autores.id = livros.autor_id
                        INNER JOIN editoras on editoras.id = livros.editora_id 
                        $where order by livros.titulo asc
                    ");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $livros = array();

            foreach ($array as $obj) {
                $livro = new LivrosVO();
                
                $livro->setId($obj['id']);
                $livro->setTitulo($obj['titulo']);
                $livro->setSubTitulo($obj['subtitulo']);
                $livro->setAutorId($obj['autor_id']);
                $livro->setEditoraId($obj['editora_id']);
                $livro->setAutorNome($obj['autor_nome']);
                $livro->setEditoraNome($obj['editora_nome']);
                $livro->setResumo($obj['resumo']);
                $livro->setNumeroDePaginas($obj['numero_de_paginas']);
                $livro->setImagemId($obj['imagem_id']);
                $livros[] = $livro;
            }
            $this->conexao = null;

            return $livros;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os Livros";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM livros WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $livros = array();

            foreach ($array as $obj) {
                $livro = new LivrosVO();
                $livro->setId($obj['id']);
                $livro->setTitulo($obj['titulo']);
                $livro->setSubTitulo($obj['subtitulo']);
                $livro->setAutorId($obj['autor_id']);
                $livro->setEditoraId($obj['editora_id']);
                $livro->setResumo($obj['resumo']);
                $livro->setNumeroDePaginas($obj['numero_de_paginas']);
                $livro->setImagemId($obj['imagem_id']);
                $livros[] = $livro;
            }
            $this->conexao = null;
            return $livros;
        }catch(Exception $e){
            echo "Erro ao buscar os Livros";
            return false;
        }
    }

    function findByAutor($autorId) {
        try{
            $query = ("SELECT * FROM livros WHERE autor_id = '$autorId'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $livros = array();

            foreach ($array as $obj) {
                $livro = new LivrosVO();
                $livro->setId($obj['id']);
                $livro->setTitulo($obj['titulo']);
                $livro->setSubTitulo($obj['subtitulo']);
                $livro->setAutorId($obj['autor_id']);
                $livro->setEditoraId($obj['editora_id']);
                $livro->setResumo($obj['resumo']);
                $livro->setNumeroDePaginas($obj['numero_de_paginas']);
                $livro->setImagemId($obj['imagem_id']);
                $livros[] = $livro;
            }
            $this->conexao = null;
            return $livros;
        }catch(Exception $e){
            echo "Erro ao buscar os Livros";
            return false;
        }
    }

    function findByEditora($editoraId) {
        try{
            $query = ("SELECT * FROM livros WHERE editora_id = '$editoraId'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $livros = array();

            foreach ($array as $obj) {
                $livro = new LivrosVO();
                $livro->setId($obj['id']);
                $livro->setTitulo($obj['titulo']);
                $livro->setSubTitulo($obj['subtitulo']);
                $livro->setAutorId($obj['autor_id']);
                $livro->setEditoraId($obj['editora_id']);
                $livro->setResumo($obj['resumo']);
                $livro->setNumeroDePaginas($obj['numero_de_paginas']);
                $livro->setImagemId($obj['imagem_id']);
                $livros[] = $livro;
            }
            $this->conexao = null;
            return $livros;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os Livros";
            return false;
        }
    }



    function cadastrar(LivrosVO $livro){
        try{
            
            $sql = "
                INSERT INTO livros(
                    titulo,
                    subtitulo,
                    autor_id,
                    editora_id,
                    resumo,
                    numero_de_paginas
                )VALUES(
                    '{$livro->getTitulo()}',
                    '{$livro->getSubTitulo()}',
                    '{$livro->getAutorId()}',
                    '{$livro->getEditoraId()}',
                    '{$livro->getResumo()}',
                    '{$livro->getNumeroDePaginas()}'
                )
            ";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = Conexao::connect()->prepare("SELECT MAX(id) FROM LIVROS");
            $this->conexao->execute();
            $lastId = $this->conexao->fetchColumn();

            return $lastId;
            

        }catch(Exception $e){
            var_dump($e->getMessage());
            echo "Erro ao cadastrar o Livro";
            return false;
        }
    }

     function editar(LivrosVO $livro){
        try {
            $sql = "
            UPDATE livros
                    SET titulo = '{$livro->getTitulo()}',
                    subtitulo = '{$livro->getSubTitulo()}',
                    autor_id = '{$livro->getAutorId()}',
                    editora_id = '{$livro->getEditoraId()}',
                    resumo = '{$livro->getResumo()}',
                    numero_de_paginas = '{$livro->getNumeroDePaginas()}',
                    imagem_id = '{$livro->getImagemId()}'
                    WHERE id = '{$livro->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração no Livro";
        }
    }

     function excluir(LivrosVO $livro){
        try{
            $sql = " DELETE FROM livros  WHERE id = '{$livro->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiLivros.php");
            return true;


        }catch(Exception $e){
            echo  $livro->getId();
            echo "Erro ao excluir o Livro";

            return false;
        }
    }



}
