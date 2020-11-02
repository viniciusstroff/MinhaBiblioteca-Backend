<?php 
include_once './Header.php';
include_once DIR_MODELO . 'AutoresVO.class.php';
include_once DIR_PERSISTENCIA . 'AutoresDAO.class.php';

$dao = new AutoresDAO();
?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id'])){
        foreach($dao->find($_REQUEST['id']) as $autor);

    }else{
        $autor = new AutoresVO();
    }
    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="id" id="id" value="<?= $autor->getId()  ?>">
                        <input type="text" name="nome" id="nome" value="<?= $autor->getNome()  ?>" maxlength="50" class="form-control" required>
                    </div>
                </div>
                    
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" value="<?= $autor->getSobrenome() ?>" maxlength="50" class="form-control" required>
                    </div>
                </div>
            </div>
    
            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Pseudonimo</label>
                        <input type="text" name="pseudonimo" id="pseudonimo" value="<?= $autor->getPseudonimo() ?>" maxlength="50" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" id=""  value="<?= $autor->getDataNascimento() ?>" required>
                    </div>
                </div> 
            </div>
    
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nacionalidade</label>
                        <input type="text" name="nacionalidade" class="form-control" id="" maxlength="50" value="<?= $autor->getNacionalidade() ?>" >
                    </div>
                </div>

            </div>
        
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" id="" maxlength="255" cols="50" rows="5"><?= $autor->getDescricao() ?></textarea>
                    </div>
                </div>
            </div> 
        
    
            <div class="pull-right">
                <a href="GuiAutores.php"><button type="button" class="btn btn-default">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
