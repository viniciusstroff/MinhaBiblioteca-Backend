<?php

include_once '../base_dir.php';
include_once DIR_MODELO . 'AutoresVO.class.php';
include_once DIR_PERSISTENCIA . 'AutoresDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new AutoresDAO();
            return $dao->listar();

        case 'salvar':
            $autor = new AutoresVO();
            
            $autor->setId($_POST['id']);
            $autor->setNome($_POST['nome']);
            $autor->setSobrenome($_POST['sobrenome']);
            $autor->setPseudonimo($_POST['pseudonimo']);
            $autor->setNacionalidade($_POST['nacionalidade']);
            $autor->setDataNascimento($_POST['data_nascimento']);
            $autor->setDescricao($_POST['descricao']);

            $dao = new AutoresDAO();
            if($dao->cadastrar($autor)){}
                return header('location:../visao/GuiAutores.php?type=success&message=Autor Cadastrado com sucesso');
            
             return header('location:../visao/GuiAutores.php?type=error&message=Problemas ao Cadastrar um Autor');
     
        break;
        case 'editar':

            $autor = new AutoresVO();
            
            $autor->setId($_POST['id']);
            $autor->setNome($_POST['nome']);
            $autor->setSobrenome($_POST['sobrenome']);
            $autor->setPseudonimo($_POST['pseudonimo']);
            $autor->setNacionalidade($_POST['nacionalidade']);
            $autor->setDataNascimento($_POST['data_nascimento']);
            $autor->setDescricao($_POST['descricao']);

            $dao = new AutoresDAO();
            if($dao->editar($autor))
                return header('location:../visao/GuiAutores.php?type=success&message=Autor Editado com sucesso');
            return header('location:../visao/GuiAutores.php?type=error&message=Problemas ao Editar um Autor');
            break;

        case 'excluir':
            $id = $_GET['id'];
            $autor = new AutoresVO();
            $autor->setId($id);

            $dao = new AutoresDAO();

            if($dao->excluir($autor))
                return header('location:../visao/GuiAutores.php?type=success&message=Autor Removido com sucesso');
            
            return header('location:../visao/GuiAutores.php?type=error&message=Problemas ao Remover um Autor');
            
            break;
    }
} catch (Exception $exception) {
    die('Erro');
}

