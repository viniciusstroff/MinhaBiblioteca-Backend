<?php 
include_once '../js/mascara.js';
include_once './Header.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';

$dao = new UsuariosDAO();
?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id'])){
        $usuario = $dao->find($_REQUEST['id']);

    }else{
        $usuario = new UsuariosVO();
    }

    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="id" id="id" value="<?= $usuario ? $usuario->getId() : '' ?>">
                        <input type="text" name="nome" id="nome" value="<?= $usuario? $usuario->getNome() :'' ?>" class="form-control" required>
                    </div>
                </div>
                    
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" value="<?= $usuario->getSobrenome() ?>" maxlength="14" class="form-control" required>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="login" id="login" value="<?= $usuario->getLogin() ?>" class="form-control" required>
                    </div>
                </div> 

                <div class="col-md-6">
                    <div class="form-group">   
                        <label>Senha</label>
                        <input type="password" name="senha" id="senha" value="<?= $usuario->getSenha() ?>" class="form-control" required>
                    </div>

                   
                </div>

                   
            </div>
    
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Perfil</label>
                        <select name="perfil" id="perfil" class="form-control">
                            <option value="">Selecione</option>
                            <option value="administrador" <?=($usuario->getPerfil() == 'administrador')?'selected':'';?> >Administrador</option>
                            <option value="usuario" <?=($usuario->getPerfil() == 'usuario')? 'selected':'';?> >Usuario</option>
                            <option value="desenvolvedor" <?=($usuario->getPerfil() == 'desenvolvedor')? 'selected':'';?>>Desenvolvedor</option>
                        </select>
                    </div>
                </div>
            </div>
        
    
            <div class="pull-right">
                
                <a href="<?= $usuarioLogado->getPerfil() != "usuario" ? 'GuiUsuarios.php' : 'GuiLivros.php' ?>"><button type="button" class="btn btn-default">Voltar</button></a>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
