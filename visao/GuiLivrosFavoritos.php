<?php 

include_once './Header.php';
include_once DIR_PERSISTENCIA . './LivrosDAO.class.php';
include_once DIR_PERSISTENCIA . './LivrosFavoritosDAO.class.php';

$livrosDAO = new LivrosDAO();
$livrosFavoritosDAO = new LivrosFavoritosDAO();
?>


<div class="container">

    <h3 class="text-center">Listagem de Livros Favoritos</h1>

    <?php include_once './Mensagens.php';?>

    <div class="listagem" >
        
        <?php include_once './GuiFiltro.php'; ?>

        <table class="table">
            <thead>
                <tr>
                    <th width="90%" class="text-center">Titulo</th>
                    <th width="10" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($livrosFavoritosDAO->listar($usuarioLogado, $filtro) as $favorito) { ?>
                <tr>
                    <td class="text-center">    <?= $favorito->getLivroTitulo()     ?>  </td>
                    <td class="text-center">
                    <!--<form method="POST" action="../controle/ControleUsuario.php?op=editar">-->
                        <a  style="margin-right:10px;"  class="glyphicon glyphicon-pencil disabled" name="id_edit" id="id_edit" href="../visao/GuiEditarLivros.php?op=editar&id=<?= $favorito->getLivroId()?> "></a>
                       
                        <a class="glyphicon glyphicon-star" title="Remover da Lista dos Favoritos"  
                        href="../controle/LivrosFavoritosControle.php?op=excluir&livro_id=<?=$favorito->getLivroId()?>&usuario_logado=<?=$usuarioLogado->getId() ?>&retorno=favoritos"></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>
