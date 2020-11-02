<?php 
include_once './Header.php';
include_once DIR_MODELO . 'GenerosVO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosDAO.class.php';

$dao = new GenerosDAO();
?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id'])){
        foreach($dao->find($_REQUEST['id']) as $genero);

    }else{
        $genero = new GenerosVO();
    }
    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="id" id="id" value="<?= $genero ? $genero->getId() : '' ?>">
                        <input type="text" autofocus name="nome" id="titulo" value="<?= $genero? $genero->getNome() :'' ?>" class="form-control" required>
                    </div>
                </div>
                
            </div>
        
    
            <div class="pull-right">
                <a href="GuiGeneros.php"><button type="button" class="btn btn-default">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
