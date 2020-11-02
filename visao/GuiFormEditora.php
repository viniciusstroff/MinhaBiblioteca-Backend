<?php 
include_once './Header.php';
include_once DIR_MODELO . 'EditorasVO.class.php';
include_once DIR_PERSISTENCIA . 'EditorasDAO.class.php';

$dao = new EditorasDAO();
?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id'])){
        foreach($dao->find($_REQUEST['id']) as $editora);

    }else{
        $editora = new EditorasVO();
    }
    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="id" id="id" value="<?= $editora ? $editora->getId() : '' ?>">
                        <input type="text" name="nome" id="titulo" value="<?= $editora? $editora->getNome() :'' ?>" class="form-control" required maxlength="50">
                    </div>
                </div>
                
            </div>
        
    
            <div class="pull-right">
                <a href="GuiEditoras.php"><button type="button" class="btn btn-default">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
