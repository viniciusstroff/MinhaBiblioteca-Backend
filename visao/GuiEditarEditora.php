<?php
include_once './Header.php';
include_once DIR_MODELO . 'EditorasVO.class.php';



?>

<form class="form-group" id="" method="POST" action="../controle/EditorasControle.php?op=editar">


	<div class="container">
	    <h1 class="text-center">Edição de Editora</h1>
	   
	    <?php include_once './GuiFormEditora.php';?>
	</div>
</form>


<?php include_once 'Footer.php';?>

