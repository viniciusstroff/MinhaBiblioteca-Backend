<?php


include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';

class UsuariosDAO {

    private $conexao = null;

    function __construct() {
    }

    function listar($filtros = null) {
        try{
            $query = ("SELECT * FROM usuarios WHERE nome LIKE '%$filtros%' OR sobrenome LIKE '%$filtros%' ORDER BY nome ASC");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $usuarios = array();

            foreach ($array as $obj) {
                $usuario = new UsuariosVO();
                $usuario->setId($obj['id']);
                $usuario->setNome($obj['nome']);
                $usuario->setSobrenome($obj['sobrenome']);
                $usuario->setLogin($obj['login']);
                $usuario->setPerfil($obj['perfil']);
                $usuarios[] = $usuario;
            }
            $this->conexao = null;

            return $usuarios;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM usuarios WHERE id = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            foreach ($array as $obj) {
                $usuario = new UsuariosVO();
                $usuario->setId($obj['id']);
                $usuario->setNome($obj['nome']);
                $usuario->setSobrenome($obj['sobrenome']);
                $usuario->setLogin($obj['login']);
                $usuario->setPerfil($obj['perfil']);

            }
            $this->conexao = null;
            return $usuario;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }


    function findByUsuario(UsuariosVO $usuario) {
        try{
            $query = ("SELECT * FROM usuarios WHERE login = '{$usuario->getLogin()}' and senha = '{$usuario->getSenha()}'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            foreach ($array as $obj) {
                $usuario = new UsuariosVO();
                $usuario->setId($obj['id']);
                $usuario->setNome($obj['nome']);
                $usuario->setSobrenome($obj['sobrenome']);
                $usuario->setLogin($obj['login']);
                $usuario->setPerfil($obj['perfil']);
            }
            $this->conexao = null;

            
            if($usuario->getId())
                return $usuario;
            return false;
        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }



    function cadastrar(UsuariosVO $usuario){
        try{

            $sql = "
                INSERT INTO usuarios(
                    nome,
                    sobrenome,
                    login,
                    senha,
                    perfil
                )VALUES(
                    '{$usuario->getNome()}',
                    '{$usuario->getSobrenome()}',
                    '{$usuario->getLogin()}',
                    '{$usuario->getSenha()}',
                    '{$usuario->getPerfil()}'
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }

     function editar(UsuariosVO $usuario){
        try {
            $sql = "
            UPDATE usuarios
                    SET nome = '{$usuario->getNome()}',
                    sobrenome = '{$usuario->getSobrenome()}',
                    login = '{$usuario->getLogin()}',
                    senha = '{$usuario->getSenha()}',
                    perfil = '{$usuario->getPerfil()}'
                    WHERE id = '{$usuario->getId()}'";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());exit;
            echo "Erro ao fazer alteração no Usuario";
        }
    }

     function excluir(UsuariosVO $usuario){
        try{
            $sql = " DELETE FROM usuarios "
                . " where id = " . $usuario->getId();


            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiUsuarios.php");
            return true;


        }catch(Exception $e){
            var_dump($e->getMessage());exit;
            echo "Erro ao excluir o Usuario";

            return false;
        }
    }



}
