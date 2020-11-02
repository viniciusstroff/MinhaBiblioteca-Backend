<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'LivrosVO.class.php';
include_once DIR_MODELO . 'LivrosFavoritosVO.class.php';

class LivrosFavoritosDAO {


    private $conexao = null;

    function __construct() {

    }

    function listar($usuarioLogado = null, $filtros = null) {
        try{
            $where = "WHERE 1=1 ";
            

            if($usuarioLogado){
                $where .= " AND usuarios.id = '{$usuarioLogado->getId()}' ";
            }
            if($filtros){
                $where = " AND livros.titulo LIKE '%$filtros%'";
            }
            
            $query = ("SELECT favoritos.*, livros.titulo as livro_titulo FROM favoritos
                        INNER JOIN livros on livros.id = favoritos.livro_id
                        INNER JOIN usuarios on usuarios.id = favoritos.usuario_id
                        $where
                        GROUP BY livro_id
                    ");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $livros = array();

            foreach ($array as $obj) {
                $livro = new LivrosFavoritosVO();
                
                $livro->setId($obj['id']);
                $livro->setLivroTitulo($obj['livro_titulo']);
                $livro->setLivroId($obj['livro_id']);
                $livro->setUsuarioId($obj['usuario_id']);
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
            $query = ("SELECT * FROM favoritos WHERE id = '$id'");
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

    function findByLivroAndUser($livroID = null, $usuario = null) {

        try{
            $and = "";
            
            if($usuario) $and .= " AND usuario_id ={$usuario} ";
            if($livroID) $and .= " AND livro_id = $livroID ";

            $query = ("SELECT id FROM favoritos WHERE 1=1  $and ");

            $this->conexao = Conexao::connect()->query($query);

            $object = $this->conexao->fetch(PDO::FETCH_OBJ);
    
            $id = isset($object->id) ? $object->id : null;

            $favorito = new LivrosFavoritosVO();
            $favorito->setId($id);
            
            
            $this->conexao = null;
            return $favorito;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            return false;
        }
    }



    function cadastrar(LivrosFavoritosVO $favorito){
        try{
            
            $sql = "
                INSERT INTO favoritos(
                    livro_id,
                    usuario_id
                )VALUES(
                    '{$favorito->getLivroId()}',
                    '{$favorito->getUsuarioId()}'
                )
            ";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao= null;

            return true;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao cadastrar o Livro";
            return false;
        }
    }

    //  function editar(LivrosVO $livro){
    //     try {
    //         $sql = "
    //         UPDATE livros
    //                 SET titulo = '{$livro->getTitulo()}',
    //                 subtitulo = '{$livro->getSubTitulo()}',
    //                 autor_id = '{$livro->getAutorId()}',
    //                 editora_id = '{$livro->getEditoraId()}',
    //                 resumo = '{$livro->getResumo()}',
    //                 numero_de_paginas = '{$livro->getNumeroDePaginas()}',
    //                 imagem_id = '{$livro->getImagemId()}'
    //                 WHERE id = '{$livro->getId()}'";

    //         $this->conexao = Conexao::connect()->prepare($sql);
    //         $this->conexao->execute();
    //         $this->conexao = null;
    //         return true;
    //     } catch (Exception $e) {
    //         echo "Erro ao fazer alteração no Livro";
    //     }
    // }

     function excluir(LivrosFavoritosVO $favorito){
        
        try{
            $sql = " DELETE FROM favoritos  WHERE id = '{$favorito->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            // header("Location: ../visao/GuiLivros.php");
            return true;


        }catch(Exception $e){
            var_dump($e->getMessage());exit;

            return false;
        }
    }



}
