<?php 

include_once './Header.php';
include_once DIR_PERSISTENCIA . './EditorasDAO.class.php';

include_once DIR_PERSISTENCIA . './LivrosDAO.class.php';

$dao = new EditorasDAO();
$livrosDAO = new LivrosDAO();
?>


<div class="container">
    <h3 class="text-center">Listagem de Editoras</h3>
    <?php include_once './Mensagens.php';?>
    <div class="listagem" >
         <div class="pull-right">
                <a href="GuiCadastroEditora.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar Editora</button></a>
        </div>

        <?php include_once './GuiFiltro.php'; ?>

        <table class="table">
            <thead>
                <tr>
                    <th width="90%">Nome</th>
                    <th width="10%" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($dao->listar($filtro) as $editora) { ?>
                <tr>
                    
                    <td>    <?= $editora->getNome()     ?>  </td>
                    <td class="text-center">
                    <!--<form method="POST" action="../controle/ControleUsuario.php?op=editar">-->
                        <a  style="margin-right:10px;" class="glyphicon glyphicon-pencil" name="id_edit" id="id_edit" href="../visao/GuiEditarEditora.php?op=editar&id=<?= $editora->getId()?> "></a>

                        <?php if($livrosDAO->findByEditora($editora->getId())):?>
                            <a class="glyphicon glyphicon-trash" style="color: #ccc ;"  title="Essa Editora não pode ser deletado, pois existem vinculos com Livros"></a>
                        <?php else: ?>
                            <a class="glyphicon glyphicon-trash"  
                            href="../controle/EditorasControle.php?op=excluir&id=<?=$editora->getId() ?> "></a>
                        <?php endif; ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>
