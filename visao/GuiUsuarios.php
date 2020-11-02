<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosFavoritosDAO.class.php';

$usuariosDAO = new UsuariosDAO();
$livrosFavoritosDAO = new LivrosFavoritosDAO();
?>


<div class="conteudo">
    <h3 class="text-center">Listagem de Usuarios</h3>

    <?php include_once './Mensagens.php';?>
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
         <div class="pull-right">
                <a href="GuiCadastroUsuario.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar</button></a>
        </div>
       
        <?php include_once './GuiFiltro.php'; ?>
        
        <table class="table">
            <thead>
                <tr>
                    <th width="25%" class="text-center">Nome</th>
                    <th width="25%"  class="text-center">Sobrenome</th>
                    <th width="20%"  class="text-center">Login</th>
                    <th width="20%"  class="text-center">Perfil</th>
                    <th width="10" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($usuariosDAO->listar($filtro) as $usuario) { ?>
                <tr>
                    <td  class="text-center"><?=$usuario->getNome()?></td>
                    <td  class="text-center"><?=$usuario->getSobrenome()?></td>
                    <td  class="text-center"><?=$usuario->getLogin()?></td>
                    <td  class="text-center"><?=$usuario->getPerfil()?></td>
                    <td class="text-center">
                        <a  style="margin-right:10px;" class="glyphicon glyphicon-pencil" name="id_edit" id="id_edit" href="../visao/GuiEditarUsuario.php?op=editar&id=<?=$usuario->getId();?> "></a>

                        <?php if(!$livrosFavoritosDAO->findByLivroAndUser($livroID ='', $usuario->getId())->getId()):?>
                            <a class="glyphicon glyphicon-trash" href="../controle/UsuarioControle.php?op=excluir&id_usuario=<?=$usuario->getId();?> "></a>
                        <?php else:?>
                            <a class="glyphicon glyphicon-trash" style="color: #ccc ;"  title="Esse Autor não pode ser deletado, pois existem vinculos com Livros"></a>
                        <?php endif; ?>
                        
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>
