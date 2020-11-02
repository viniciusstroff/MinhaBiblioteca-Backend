<?php

include_once '../base_dir.php';
include_once DIR_MODELO . 'EditorasVO.class.php';
include_once DIR_PERSISTENCIA . 'EditorasDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new EditorasDAO();
            return $dao->listar();

        case 'salvar':
            $editora = new EditorasVO();
            
            $editora->setId($_POST['id']);
            $editora->setNome($_POST['nome']);

            $dao = new EditorasDAO();
            if($dao->cadastrar($editora))
                return header('location:../visao/GuiEditoras.php?type=success&message=Editora salva com sucesso');
            
            return header('location:../visao/GuiEditoras.php?type=error&message=Problemas ao salvar uma Editora');
            
        break;

        case 'editar':

            $editora = new EditorasVO();
            
            $editora->setId($_POST['id']);
            $editora->setNome($_POST['nome']);

            $dao = new EditorasDAO();
            if($dao->editar($editora))
                return header('location:../visao/GuiEditoras.php?type=success&message=Editora editado com sucesso');

            return header('location:../visao/GuiEditoras.php?type=error&message=Problemas ao Editar uma Editora');
        break;

        case 'excluir':
            $id = $_GET['id'];
            $editora = new EditorasVO();
            $editora->setId($id);

            $dao = new EditorasDAO();

            if($dao->excluir($editora))
                return header('location:../visao/GuiEditoras.php?type=success&message=Editora removida com sucesso');
           
            return header('location:../visao/GuiEditoras.php?type=error&message=Problemas ao remover uma Editora');
            
        break;
    }
} catch (Exception $exception) {
    die('Erro');
}

