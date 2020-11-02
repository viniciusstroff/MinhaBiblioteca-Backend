<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'AutoresVO.class.php';

class AutoresDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($filtros= null) {
        try{
            $where = " WHERE 1=1 ";

            if($filtros) 
                $where .= "AND nome LIKE '%$filtros%' OR sobrenome LIKE '%$filtros%' OR pseudonimo LIKE '%$filtros%' OR nacionalidade LIKE '%$filtros%' OR descricao LIKE '%$filtros%' ";

            $query = ("SELECT * FROM autores $where");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $autores = array();

            foreach ($array as $obj) {
                $autor = new AutoresVO();
                
                $autor->setId($obj['id']);
                $autor->setNome($obj['nome']);
                $autor->setSobrenome($obj['sobrenome']);
                $autor->setPseudonimo($obj['pseudonimo']);
                $autor->setDataNascimento($obj['data_nascimento']);
                $autor->setNacionalidade($obj['nacionalidade']);
                $autor->setDescricao($obj['descricao']);

                $autores[] = $autor;
            }
            $this->conexao = null;

            return $autores;
        }catch(Exception $e){
            echo "Erro ao buscar as Autores";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM autores WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $autores = array();

            foreach ($array as $obj) {
                $autor = new AutoresVO();
                
                $autor->setId($obj['id']);
                $autor->setNome($obj['nome']);
                $autor->setSobrenome($obj['sobrenome']);
                $autor->setPseudonimo($obj['pseudonimo']);
                $autor->setDataNascimento($obj['data_nascimento']);
                $autor->setNacionalidade($obj['nacionalidade']);
                $autor->setDescricao($obj['descricao']);

                $autores[] = $autor;
            }
            $this->conexao = null;
            return $autores;
        }catch(Exception $e){
            echo "Erro ao buscar as Autores";
            return false;
        }
    }



    function cadastrar(AutoresVO $autor){
        try{

            $sql = "
                INSERT INTO autores(
                    nome,
                    sobrenome,
                    pseudonimo,
                    data_nascimento,
                    nacionalidade,
                    descricao
                )VALUES(
                    '{$autor->getNome()}',
                    '{$autor->getSobrenome()}',
                    '{$autor->getPseudonimo()}',
                    '{$autor->getDataNascimento()}',
                    '{$autor->getNacionalidade()}',
                    '{$autor->getDescricao()}'
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar Autor";
            return false;
        }
    }

     function editar(AutoresVO $autor){
        try {
            $sql = "
            UPDATE autores
                    SET nome = '{$autor->getNome()}',
                    sobrenome = '{$autor->getSobrenome()}',
                    pseudonimo = '{$autor->getPseudonimo()}',
                    data_nascimento = '{$autor->getDataNascimento()}',
                    nacionalidade = '{$autor->getNacionalidade()}',
                    descricao = '{$autor->getDescricao()}'
                    WHERE id = '{$autor->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração de Autor";
        }
    }

     function excluir(AutoresVO $autor){
        try{
            $sql = " DELETE FROM autores  WHERE id = '{$autor->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiAutores.php");
            return true;


        }catch(Exception $e){
            echo  $autor->getId();
            echo "Erro ao excluir Autor";

            return false;
        }
    }



}
