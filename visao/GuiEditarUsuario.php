<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuariosVO.class.php';



?>

<form class="form-group" id="cadUsuario" method="POST" action="../controle/UsuarioControle.php?op=editar">


	<div class="container">
	    <h3 class="text-center">Edição de Usuário</h3>
		<?php include_once './Mensagens.php';?>
	    <?php include_once './GuiFormUsuario.php';?>
	</div>
</form>


	<?php include_once 'Footer.php';?>

