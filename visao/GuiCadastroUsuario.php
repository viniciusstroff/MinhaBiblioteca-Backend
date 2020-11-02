<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';

?>

<form class="form-horizontal" id="cadUsuario" method="POST" action="../controle/UsuarioControle.php?op=salvar">

	<div class="container">
		<?php include_once './Mensagens.php';?>
	    <h1 class="text-center">Cadastro de Usuário</h1>
	    
	    <?php include_once './GuiFormUsuario.php'; ?>
	</div>
</form>

<?php include_once 'Footer.php'; ?>

