<?php
include_once '../base_dir.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new UsuariosDAO();
            return $dao->listar();

        case 'salvar':
            if(!empty($_POST['nome'] && $_POST['sobrenome'] && $_POST['login'] && $_POST['senha'])){
                $usuario = new UsuariosVO();
                $usuario->setId($_POST['id']);
                $usuario->setNome($_POST['nome']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha(MD5($_POST['senha']));
                $usuario->setPerfil($_POST['perfil']);

                $dao = new UsuariosDAO();
                if($dao->cadastrar($usuario))
                    return header('location:../visao/GuiUsuarios.php?type=success&message=Usuario Cadastrado com sucesso');

                return header('location:../visao/GuiCadastroUsuario.php?type=error&message=Problemas ao cadastrar um Usuario');
            }
        break;

        case 'editar':
            $usuario = new UsuariosVO();

            $usuario = new UsuariosVO();
            $usuario->setId($_POST['id']);
            $usuario->setNome($_POST['nome']);
            $usuario->setSobrenome($_POST['sobrenome']);
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha(MD5($_POST['senha']));
            $usuario->setPerfil($_POST['perfil']);

            $dao = new UsuariosDAO();
            if($dao->editar($usuario))
                return header('location:../visao/GuiUsuarios.php?type=success&message=Usuario editado com sucesso');

            return header('location:../visao/GuiEditarUsuario.php?type=error&message=Problemas ao editar um Usuario');
        break;

        case 'excluir':
            $idUsuario = $_GET['id_usuario'];
            $usuario = new UsuariosVO();
            $usuario->setId($idUsuario);

            $dao = new UsuariosDAO();
            if($dao->excluir($usuario))
                return header('location:../visao/GuiUsuarios.php?type=success&message=Usuario removido com sucesso');

            return header('location:../visao/GuiUsuarios.php?type=error&message=Problemas ao remover um Usuario');
         break;
    }
} catch (Exception $exception) {
    die('Erro');
}

