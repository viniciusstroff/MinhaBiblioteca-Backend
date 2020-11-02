<?php
include_once './Header.php';
include_once DIR_MODELO . 'LivrosVO.class.php';

?>

<form class="form-horizontal" id="" method="POST" action="../controle/LivrosControle.php?op=salvar">

	<div class="container">
	    <h1 class="text-center">Cadastro de Livro</h1>
	    
	    <?php include_once './GuiFormLivros.php'; ?>
	</div>
</form>

<?php include_once 'Footer.php'; ?>

