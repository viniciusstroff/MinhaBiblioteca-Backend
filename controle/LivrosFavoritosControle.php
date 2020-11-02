<?php

include_once '../base_dir.php';
include_once DIR_MODELO . 'LivrosVO.class.php';

include_once DIR_MODELO . 'LivrosFavoritosVO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosDAO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosFavoritosDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

session_start();
try {
    switch ($_GET['op']) {
        
        case 'listar':
            $livrosFavoritosDAO = new LivrosFavoritosDAO();
            return $livrosFavoritosDAO->listar();
        break;

        case 'salvar':
         
        break;

        case 'editar':
            
            break;

        case 'excluir':
            $id = $_GET['livro_id'];
            $usuarioLogado = $_GET['usuario_logado'];
            $header = $_GET['retorno'] == 'favoritos' ? 'GuiLivrosFavoritos' : 'GuiLivros'; 

            $livrosFavoritosDAO = new LivrosFavoritosDAO();
            $livroFavorito = $livrosFavoritosDAO->findByLivroAndUser($id, $usuarioLogado);
            
            if($livrosFavoritosDAO->excluir($livroFavorito))
                return header("location:../visao/$header.php?type=success&message=Livro Favorito removido com Sucesso");
            
            return header("location:../visao/$header.php?type=error&message=Problemas ao remover o Livro do Favorito");
            
            break;

        case 'adicionar':
            if(isset($_GET['livro_id'])){
                $livroFavorito = new LivrosFavoritosVO();
                $livroFavorito->setLivroId($_GET['livro_id']);
                $livroFavorito->setUsuarioId($_SESSION['usuario_id']);

                $livrosFavoritosDAO = new LivrosFavoritosDAO();

                if($livrosFavoritosDAO->cadastrar($livroFavorito))
                    return header('location:../visao/GuiLivros.php?type=success&message=Livro Favorito adicionado com Sucesso');
                
                return header('location:../visao/GuiLivros.php?type=error&message=Problemas ao adicionar o Livro do Favorito');
            }
            

        break;
    }
} catch (Exception $exception) {
    var_dump($exception->getMessage());exit;
}

