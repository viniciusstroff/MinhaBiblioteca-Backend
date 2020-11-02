<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'EditorasVO.class.php';

class EditorasDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($filtros= null) {
        try{

            $where =" WHERE 1=1 ";

            if($filtros)
                $where .= " AND nome LIKE '%$filtros%' ";

            $query = ("SELECT * FROM editoras $where");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $editoras = array();

            foreach ($array as $obj) {
                $editora = new EditorasVO();
                
                $editora->setId($obj['id']);
                $editora->setNome($obj['nome']);
                $editoras[] = $editora;
            }
            $this->conexao = null;

            return $editoras;
        }catch(Exception $e){
            echo "Erro ao buscar as Editoras";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM editoras WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $editoras = array();

            foreach ($array as $obj) {
                $editora = new EditorasVO();
                
                $editora->setId($obj['id']);
                $editora->setNome($obj['nome']);
                $editoras[] = $editora;
            }
            $this->conexao = null;
            return $editoras;
        }catch(Exception $e){
            echo "Erro ao buscar as Editoras";
            return false;
        }
    }



    function cadastrar(EditorasVO $editora){
        try{

            $sql = "
                INSERT INTO editoras(
                    nome
                )VALUES(
                    '{$editora->getNome()}'
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar a Editora";
            return false;
        }
    }

     function editar(EditorasVO $editora){
        try {
            $sql = "
            UPDATE editoras
                    SET nome = '{$editora->getNome()}'
                    WHERE id = '{$editora->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração na Editora";
        }
    }

     function excluir(EditorasVO $editora){
        try{
            $sql = " DELETE FROM editoras  WHERE id = '{$editora->getId()}'";


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiEditoras.php");
            return true;


        }catch(Exception $e){
            echo  $editora->getId();
            echo "Erro ao excluir a Editora";

            return false;
        }
    }



}
