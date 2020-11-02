<?php
include_once './Header.php';
include_once DIR_MODELO . 'AutoresVO.class.php';

?>

<form class="form-horizontal" id="" method="POST" action="../controle/AutoresControle.php?op=salvar">

	<div class="container">
	    <h1 class="text-center">Cadastro de Autor</h1>
	    
	    <?php include_once './GuiFormAutor.php'; ?>
	</div>
</form>

<?php include_once 'Footer.php'; ?>

