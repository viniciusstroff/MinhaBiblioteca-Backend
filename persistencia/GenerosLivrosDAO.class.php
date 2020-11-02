<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'GenerosLivrosVO.class.php';

class GenerosLivrosDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($livroId= null, $filtros = null) {

        try{
            $where = " WHERE 1=1 ";

            if($filtros)
                $where .= " AND genero_nome LIKE '%$filtros%' ";

            if(!empty($livroId)) 
                $where .= " AND livros.id = '$livroId' ";
         

            $query = ("SELECT 
                        generos_livros.id,
                        generos.id as genero_id,
                        generos.nome as genero_nome,
                        livros.id as livro_id
                        FROM generos_livros 
                        INNER JOIN livros on livros.id = generos_livros.livro_id 
                        INNER JOIN generos on generos.id = generos_livros.genero_id $where"
                    );

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generosLivros = array();

            foreach ($array as $obj) {
                $generoLivro = new GenerosLivrosVO();
                
                $generoLivro->setId($obj['id']);
                $generoLivro->setGeneroId($obj['genero_id']);
                $generoLivro->setLivroId($obj['livro_id']);
                $generoLivro->setGeneroNome($obj['genero_nome']);
                $generosLivros[] = $generoLivro;
            }

            $this->conexao = null;

            return $generosLivros;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os GenerosLivros";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM generos_livros WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generosLivros = array();

            foreach ($array as $obj) {
                $generoLivro = new GenerosLivrosVO();
                
                $generoLivro->setId($obj['id']);
                $generoLivro->setGeneroId($obj['genero_id']);
                $generoLivro->setLivroId($obj['livro_id']);
                $generosLivros[] = $generoLivro;
            }
            $this->conexao = null;

            return $generosLivros;
        }catch(Exception $e){
            echo "Erro ao buscar os GenerosLivros";
            return false;
        }
    }

    function findByLivro($livroId) {
        try{
            $query = ("SELECT * FROM generos_livros WHERE livro_id = '$livroId'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generosLivros = array();

            foreach ($array as $obj) {
                $generoLivro = new GenerosLivrosVO();
                
                $generoLivro->setId($obj['id']);
                $generoLivro->setGeneroId($obj['genero_id']);
                $generoLivro->setLivroId($obj['livro_id']);
                $generosLivros[] = $generoLivro;
            }
            $this->conexao = null;

            return $generosLivros;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os GenerosLivros";
            return false;
        }
    }

    function findByGenero($generoId) {
        try{
            $query = ("SELECT generos_livros.*, generos.nome as genero_nome FROM generos_livros inner join generos on generos.id = generos_livros.genero_id WHERE genero_id = '$generoId'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generosLivros = array();

            foreach ($array as $obj) {
                $generoLivro = new GenerosLivrosVO();
                
                $generoLivro->setId($obj['id']);
                $generoLivro->setGeneroId($obj['genero_id']);
                $generoLivro->setLivroId($obj['livro_id']);
                $generoLivro->setGeneroNome($obj['genero_nome']);
                $generosLivros[] = $generoLivro;
            }
            $this->conexao = null;

            return $generosLivros;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os GenerosLivros";
            return false;
        }
    }



    function cadastrar(GenerosLivrosVO $generoLivro){
        try{
            $sql = "
                INSERT INTO generos_livros(
                    genero_id,
                    livro_id
                )VALUES(
                    '{$generoLivro->getGeneroId()}',
                    '{$generoLivro->getLivroId()}'
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o GeneroLivro";
            return false;
        }
    }

     function editar(GenerosLivrosVO $generoLivro){
        try {
            $sql = "
            UPDATE generos_livros
                    SET genero_id = '{$generoLivro->getGeneroId()}',
                    livro_id = '{$generoLivro->getLivroId()}'
                    WHERE id = '{$generoLivro->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração no GeneroLivro";
        }
    }

     function excluir(GenerosLivrosVO $generoLivro){
        try{
            $sql = " DELETE FROM generos_livros  WHERE id = '{$generoLivro->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            // header("Location: ../visao/GuiGeneros.php");
            return true;


        }catch(Exception $e){
            echo  $generoLivro->getId();
            echo "Erro ao excluir o Genero";
            
            var_dump($e->getMessage());exit;

            return false;
        }
    }



}
