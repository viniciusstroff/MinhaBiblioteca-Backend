<?php
    if(isset($_POST['filtro'])){
        $filtro = $_POST['filtro'];
    }else{
        $filtro = '';
    }
?>

<fieldset class="form-group">
    <form class="form-inline" method="POST" action="#">
    
        <div>
            <input class="form-control mr-sm-2" type="text" name="filtro" value="" placeholder="Pesquisa">
            <button class="btn btn-default" type="submit"><i class="fa fa-eraser" aria-hidden="true"></i>Limpar</button>
            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
        </div>
    </form>
</fieldset>


