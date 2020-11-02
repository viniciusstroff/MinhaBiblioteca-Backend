<?php
include_once './Header.php';
include_once DIR_MODELO . 'GenerosVO.class.php';

?>

<form class="form-horizontal" id="" method="POST" action="../controle/GenerosControle.php?op=salvar">

	<div class="container">
	    <h1 class="text-center">Cadastro de Genero</h1>
	    
	    <?php include_once './GuiFormGenero.php'; ?>
	</div>
</form>

<?php include_once 'Footer.php'; ?>
