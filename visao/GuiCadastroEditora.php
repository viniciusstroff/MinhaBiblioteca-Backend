<?php
include_once './Header.php';
include_once DIR_MODELO . 'EditorasVO.class.php';

?>

<form class="form-horizontal" id="" method="POST" action="../controle/EditorasControle.php?op=salvar">

	<div class="container">
	    <h1 class="text-center">Cadastro de Editora</h1>
	    
	    <?php include_once './GuiFormEditora.php'; ?>
	</div>
</form>

<?php include_once 'Footer.php'; ?>
