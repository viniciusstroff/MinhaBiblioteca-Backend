<?php
include_once './Header.php';
include_once DIR_MODELO . 'LivrosVO.class.php';



?>

<form class="form-group" id="" method="POST" action="../controle/LivrosControle.php?op=editar">


	<div class="container">
	    <h1 class="text-center">Edição de Livro</h1>
	   
	    <?php include_once './GuiFormLivros.php';?>
	</div>
</form>


	<?php include_once 'Footer.php';?>
