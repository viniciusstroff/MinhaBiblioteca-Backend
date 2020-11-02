<?php 

include_once './Header.php';
include_once DIR_PERSISTENCIA . './AutoresDAO.class.php';
include_once DIR_PERSISTENCIA . './LivrosDAO.class.php';

$dao = new AutoresDAO();
$livrosDAO = new LivrosDAO();
?>


<div class="container">
    <h3 class="text-center">Listagem de Autores</h3>
    <?php include_once './Mensagens.php';?>
    <div class="listagem" >
         <div class="pull-right">
                <a href="GuiCadastroAutor.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar Autor</button></a>
        </div>
        

        <?php include_once './GuiFiltro.php'; ?>

        <table class="table">
            <thead>
                <tr>
                    <th style="width:15%"  class="text-center">Nome</th>
                    <th style="width:15%"  class="text-center">Sobrenome</th>
                    <th style="width:10%"  class="text-center">Pseudonimo</th>
                    <th style="width:10%"  class="text-center">Data Nascimento</th>
                    <th style="width:10%"  class="text-center">Nacionalidade</th>
                    <th style="width:10%"  class="text-center">Descrição</th>
                    <th style="width:5%;"  class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($dao->listar($filtro) as $autor) : ?>
                    <tr>
                        
                        <td class="text-center">    <?= $autor->getNome()     ?>  </td>
                        <td class="text-center">    <?= $autor->getSobrenome()     ?>  </td>
                        <td class="text-center">    <?= $autor->getPseudonimo()     ?>  </td>
                        <td class="text-center">    <?= $autor->getDataNascimento($dateFormat = 'd/m/Y')     ?>  </td>
                        <td class="text-center">    <?= $autor->getNacionalidade()     ?>  </td>
                        <td class="text-center">    <?= $autor->getDescricao()     ?>  </td>
                        <td class="text-center">
                                <a  class="glyphicon glyphicon-pencil" name="id_edit" id="id_edit" href="../visao/GuiEditarAutor.php?op=editar&id=<?= $autor->getId()?> "></a>
                            <?php if($livrosDAO->findByAutor($autor->getId())):?>
                                <a class="glyphicon glyphicon-trash" style="color: #ccc ;"  title="Esse Autor não pode ser deletado, pois existem vinculos com Livros"></a>
                            <?php else: ?>
                                <a class="glyphicon glyphicon-trash"  
                                href="../controle/AutoresControle.php?op=excluir&id=<?=$autor->getId() ?> "></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once './Footer.php'; ?>
  