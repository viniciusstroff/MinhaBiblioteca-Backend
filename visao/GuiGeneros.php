<?php 

include_once './Header.php';
include_once DIR_PERSISTENCIA . './GenerosDAO.class.php';

$dao = new GenerosDAO();
?>


<div class="container">
    <h3 class="text-center">Listagem de Generos</h3>

    <?php include_once './Mensagens.php';?>

    <div class="listagem" >
         <div class="pull-right">
                <a href="GuiCadastroGenero.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar Genero</button></a>
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

                <?php foreach ($dao->listar($id=null, $filtro) as $genero) { ?>
                <tr>
                    
                    <td>    <?= $genero->getNome()     ?>  </td>
                    <td class="text-center">
                    <!--<form method="POST" action="../controle/ControleUsuario.php?op=editar">-->
                        <a  style="margin-right:10px;" class="glyphicon glyphicon-pencil" name="id_edit" id="id_edit" href="../visao/GuiEditarGenero.php?op=editar&id=<?= $genero->getId()?> "></a>
                        <a class="glyphicon glyphicon-trash" href="../controle/GenerosControle.php?op=excluir&id=<?=$genero->getId() ?> "></a>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

 