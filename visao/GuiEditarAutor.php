<?php
include_once './Header.php';
include_once DIR_MODELO . 'AutoresVO.class.php';



?>

<form class="form-group" id="" method="POST" action="../controle/AutoresControle.php?op=editar">


	<div class="container">
	    <h1 class="text-center">Edição de Autor</h1>
	   
	    <?php include_once './GuiFormAutor.php';?>
	</div>
</form>


<?php include_once 'Footer.php';?>
