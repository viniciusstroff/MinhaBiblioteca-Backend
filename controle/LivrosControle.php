<?php

include_once '../base_dir.php';
include_once DIR_MODELO . 'LivrosVO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosDAO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosLivrosDAO.class.php';


include_once DIR_MODELO . 'LivrosFavoritosVO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosFavoritosDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        
        case 'listar':
            $dao = new LivrosDAO();
            return $dao->listar();
        break;

        case 'salvar':
            $livro = new LivrosVO();
            
            $livro->setId($_POST['id']);
            $livro->setTitulo($_POST['titulo']);
            $livro->setSubTitulo($_POST['subtitulo']);
            $livro->setAutorId($_POST['autor_id']);
            $livro->setEditoraId($_POST['editora_id']);
            $livro->setResumo($_POST['resumo']);
            $livro->setNumeroDePaginas($_POST['numero_de_paginas']);
            // $livro->setImagemId($_POST['imagem_id']);

            $dao = new LivrosDAO();
            $livroID= $dao->cadastrar($livro);
            
            if(isset($_POST['generos'])){
                $generosLivrosDAO = new GenerosLivrosDAO();

                $generosLivros = new GenerosLivrosVO();
                foreach($_POST['generos'] as $genero){
                    
                    $generosLivros->setGeneroId($genero);
                    $generosLivros->setLivroId($livroID);
                    $generosLivrosDAO->cadastrar($generosLivros);
                }
            }

            
            if($livroID)
                return header('location:../visao/GuiLivros.php?type=success&message=Livro cadastrado com sucesso');
            
            return header('location:../visao/GuiLivros.php?type=error&message=Problemas ao cadastrar um Livro');
            
        break;

        case 'editar':
            $livro = new LivrosVO();
            
            $livro->setId($_POST['id']);
            $livro->setTitulo($_POST['titulo']);
            $livro->setSubTitulo($_POST['subtitulo']);
            $livro->setAutorId($_POST['autor_id']);
            $livro->setEditoraId($_POST['editora_id']);
            $livro->setResumo($_POST['resumo']);
            $livro->setNumeroDePaginas($_POST['numero_de_paginas']);
            // $livro->setImagemId($_POST['imagem_id']);

            $livrosDAO = new LivrosDAO();
            $livrosDAO->editar($livro);
            if(isset($_POST['generos'])){
                $generosLivrosDAO = new GenerosLivrosDAO();

                $generosLivros = new GenerosLivrosVO();
                foreach($_POST['generos'] as $genero){
                    
                    $generosLivros->setGeneroId($genero);
                    $generosLivros->setLivroId($_POST['id']);
                    $generosLivrosDAO->cadastrar($generosLivros);
                }
            }
            

            return header('location:../visao/GuiLivros.php?type=success&message=Livro editado com sucesso');

        break;

        case 'excluir':
            $id = $_GET['id'];
            $livro = new LivrosVO();
            $livro->setId($id);

            $dao = new LivrosDAO();

            if($dao->excluir($livro))
                return header('location:../visao/GuiLivros.php?type=success&message=Livro removido com sucesso');
            
            return header('location:../visao/GuiLivros.php?type=error&message=Problemas ao remover um Livro');
            
        break;

        
    }
} catch (Exception $exception) {
    var_dump($exception->getMessage());exit;
}

