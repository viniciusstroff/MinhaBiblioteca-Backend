<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'GenerosVO.class.php';

class GenerosDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($id= null, $filtros = null) {
        try{
            
            $where = " WHERE 1=1 ";
            $inner = "";

            if($filtros)
                $where .= " AND generos.nome LIKE '%$filtros%' ";
                
            if(!empty($id)){
                $where .= " AND generos_livros.livro_id = '$id' ";
                $inner = " LEFT join generos_livros on generos_livros.genero_id = generos.id ";
            }
            $query = ("SELECT * FROM generos $inner $where");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generos = array();

            foreach ($array as $obj) {
                $genero = new GenerosVO();
                
                $genero->setId($obj['id']);
                $genero->setNome($obj['nome']);
                $generos[] = $genero;
            }
            $this->conexao = null;

            return $generos;
        }catch(Exception $e){
            echo "Erro ao buscar os Generos";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM generos WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $generos = array();

            foreach ($array as $obj) {
                $genero = new GenerosVO();
                
                $genero->setId($obj['id']);
                $genero->setNome($obj['nome']);
                $generos[] = $genero;
            }
            $this->conexao = null;
            return $generos;
        }catch(Exception $e){
            echo "Erro ao buscar os Generos";
            return false;
        }
    }



    function cadastrar(GenerosVO $genero){
        try{

            $sql = "
                INSERT INTO generos(
                    nome
                )VALUES(
                    '{$genero->getNome()}'
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();

            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o Genero";
            return false;
        }
    }

     function editar(GenerosVO $genero){
        try {
            $sql = "
            UPDATE generos
                    SET nome = '{$genero->getNome()}'
                    WHERE id = '{$genero->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração no Genero";
        }
    }

     function excluir(GenerosVO $genero){
        try{
            $sql = " DELETE FROM generos  WHERE id = '{$genero->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiGeneros.php");
            return true;


        }catch(Exception $e){
            echo  $genero->getId();
            echo "Erro ao excluir o Genero";
            var_dump($e->getMessage());exit;
            return false;
        }
    }



}
