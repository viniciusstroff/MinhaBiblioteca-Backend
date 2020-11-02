<?php

include_once '../base_dir.php';
include_once DIR_MODELO . 'GenerosVO.class.php';
include_once DIR_MODELO . 'GenerosLivrosVO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosDAO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosLivrosDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new GenerosDAO();
            return $dao->listar();

        case 'salvar':
            $genero = new GenerosVO();
            
            $genero->setId($_POST['id']);
            $genero->setNome($_POST['nome']);

            $dao = new GenerosDAO();
            if($dao->cadastrar($genero))
                return header('location:../visao/GuiGeneros.php?type=success&message=Genero salvo com sucesso');
            
            return header('location:../visao/GuiGeneros.php?type=error?type=error&message=Problemas ao salvar um Genero');
            
        break;

        case 'editar':

            $genero = new GenerosVO();
            
            $genero->setId($_POST['id']);
            $genero->setNome($_POST['nome']);

            $dao = new GenerosDAO();
            if($dao->editar($genero))
                return header('location:../visao/GuiGeneros.php?type=success&message=Genero Editado com sucesso');

            return header('location:../visao/GuiGeneros.php?type=error&message=Problemas ao Editar um Genero');
        break;

        case 'excluir':
            $id = $_GET['id'];
            $generoVO = new GenerosVO();
            $generoVO->setId($id);

            $dao = new GenerosDAO();
            
            $generosLivrosDAO = new GenerosLivrosDAO();

                
            foreach($generosLivrosDAO->findByGenero($id) as $genero){
                
                $generoLivro = new GenerosLivrosVO();
                $generoLivro->setId($genero->getId());
                $generoLivro->setGeneroId($genero->getGeneroId());
                $generoLivro->setLivroId($genero->getLivroId());
                $generosLivrosDAO->excluir($generoLivro);
            }

            if($dao->excluir($generoVO))
                return header('location:../visao/GuiGeneros.php?type=success&message=Genero Removido com sucesso');
            
            return header('location:../visao/GuiGeneros.php?type=error&message=Problemas ao Remover um Genero');
            
        break;
    }
} catch (Exception $exception) {
    die('Erro');
}

