<?php 

include_once './Header.php';
include_once DIR_PERSISTENCIA . './LivrosDAO.class.php';
include_once DIR_PERSISTENCIA . './GenerosLivrosDAO.class.php';

include_once DIR_PERSISTENCIA . './LivrosFavoritosDAO.class.php';

$dao = new LivrosDAO();
$generosLivrosDAO = new GenerosLivrosDAO();
$livrosFavoritosDAO = new LivrosFavoritosDAO();

?>


<div class="container">

    <h3 class="text-center">Listagem de Livros</h1>

    <?php include_once './Mensagens.php';?>

    <div class="listagem" >
         <div class="pull-right">
                <a href="GuiCadastroLivros.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar Livro</button></a>
        </div>
        <?php include_once './GuiFiltro.php'; ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th width="30%" class="text-center">Titulo</th>
                    <th width="10%" class="text-center">Subtitulo</th>
                    <th width="30%" class="text-center">Autor</th>
                    <th width="10%" class="text-center">Editora</th>
                    <th width="10" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                
                <?php foreach ($dao->listar($filtro) as $livro) { ?>
                <tr>
                    
                    <td class="text-center">    <?= $livro->getTitulo()     ?>  </td>
                    <td class="text-center">    <?= $livro->getSubtitulo()  ?>  </td>
                    <td class="text-center">    <?= $livro->getAutorNome()    ?>  </td>
                    <td class="text-center">    <?= $livro->getEditoraNome()  ?>  </td>
                    <td class="text-center">
                   
                    <!--<form method="POST" action="../controle/ControleUsuario.php?op=editar">-->
                        <a  style="margin-right:10px;"  class="glyphicon glyphicon-pencil disabled"  href="../visao/GuiEditarLivros.php?op=editar&id=<?= $livro->getId()?> "></a>

                        <?php if($generosLivrosDAO->findByLivro($livro->getId())):?>
                            <a class="glyphicon glyphicon-trash" style="color: #ccc ;"  title="Esse Livro não pode ser deletado, pois há generos selecionados"></a>
                        <?php else: ?>
                            <a class="glyphicon glyphicon-trash"  
                            href="../controle/LivrosControle.php?op=excluir&id=<?=$livro->getId() ?>"></a>
                        <?php endif; ?>

                        <?php if(!$livrosFavoritosDAO->findByLivroAndUser($livro->getId(), $usuarioLogado->getId())->getId()): ?>
                            <a class="glyphicon glyphicon-star-empty" style="margin-left:10px;"  title="Adicionar da Lista de Favoritos" 
                                href="../controle/LivrosFavoritosControle.php?op=adicionar&livro_id=<?=$livro->getId() ?>&usuario_logado=<?=$usuarioLogado->getId()?>"></a>
                        <?php else: ?>
                            <a class="glyphicon glyphicon-star" style="margin-left:10px;"  title="Remover da Lista de Favoritos"
                                href="../controle/LivrosFavoritosControle.php?op=excluir&livro_id=<?=$livro->getId() ?>&usuario_logado=<?=$usuarioLogado->getId()?>&retorno=livros"></a>
                        <?php endif ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>
