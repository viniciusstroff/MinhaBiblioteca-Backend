<?php
include_once '../base_dir.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');


try {
    switch ($_GET['op']) {
        case 'login':
            $usuario = new UsuariosVO();
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha(MD5($_POST['senha']));

            $usuariosDAO = new UsuariosDAO();
            if(!$usuarioLogado = $usuariosDAO->findByUsuario($usuario)){
                session_reset();
                $_SESSION["usuario_id"] = null;
                $_SESSION["usuario_nome"] = null;
                $_SESSION["usuario_perfil"] = null;
                return header('location:../index.php?type=error&message=Login ou senha nao cadastrado');
            }

            session_start();
            $_SESSION["usuario_id"] = $usuarioLogado->getId();
            $_SESSION["usuario_nome"] = $usuarioLogado->getNome();
            $_SESSION["usuario_login"] = $usuarioLogado->getLogin();
            $_SESSION["usuario_perfil"] = $usuarioLogado->getPerfil();
            session_commit();
                
            return header('location:../visao/GuiLivros.php?type=success&message=Logado com sucesso');

        break;
        
        case 'logout':
            session_start();  
            if(session_destroy())
                return header('location:../index.php?type=success&message=Deslogado com sucesso');

            return  header('location:../visao/GuiLivros?type=error&message=Problemas ao deslogar');
            
        break;

        case 'register':

            if(!empty($_POST['nome'] && $_POST['sobrenome'] && $_POST['login'] && $_POST['senha'])){
                $usuario = new UsuariosVO();
                $usuario->setId($_POST['id']);
                $usuario->setNome($_POST['nome']);
                $usuario->setSobrenome($_POST['sobrenome']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha(MD5($_POST['senha']));
                $usuario->setPerfil('administrador');
    
                $dao = new UsuariosDAO();
                if($dao->cadastrar($usuario))
                    return header('location:../index.php?type=success&message=Cadastrado com sucesso');
                
                return header('location:../cadastro.php?type=error&message=Problemas ao cadastar');
            }
        break;


    }
} catch (Exception $exception) {
    var_dump($exception->getMessage());exit;
}

