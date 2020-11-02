<?php 
include_once './Header.php';
include_once DIR_MODELO . 'LivrosVO.class.php';
include_once DIR_PERSISTENCIA . 'LivrosDAO.class.php';
include_once DIR_PERSISTENCIA . 'EditorasDAO.class.php';
include_once DIR_PERSISTENCIA . 'AutoresDAO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosDAO.class.php';
include_once DIR_PERSISTENCIA . 'GenerosLivrosDAO.class.php';

$dao = new LivrosDAO();
$editorasDAO = new EditorasDAO;
$autoresDAO = new AutoresDAO;
$generosDAO = new GenerosDAO;
$generosLivrosDAO = new GenerosLivrosDAO;

?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id'])){
        foreach($dao->find($_REQUEST['id']) as $livro);

    }else{
        $livro = new LivrosVO();
    }
    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="hidden" name="id" id="id" value="<?= $livro ? $livro->getId() : '' ?>">
                        <input type="text" name="titulo" id="titulo" value="<?= $livro? $livro->getTitulo() :'' ?>" class="form-control" required>
                    </div>
                </div>
                    
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Subtitulo</label>
                        <input type="text" name="subtitulo" id="subtitulo" value="<?= $livro->getSubtitulo() ?>" maxlength="14" class="form-control">
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Autora</label>
                        <select name="autor_id" id="" class="form-control" required>
                            <option  value="">Selecione</option>
                            <?php foreach($autoresDAO->listar() as $autor): ?>
                                <option value="<?=$autor->getId()?>" <?= $livro->getAutorId() ? "selected" : ''?>> <?= $autor->getNome()?></option>
                            <?php endforeach; ?>
                            </select>
                    </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Editora</label>
                        <select name="editora_id" id="" class="form-control" required>
                            <option value="">Selecione</option>
                            <?php foreach($editorasDAO->listar() as $editora): ?>
                                <option value="<?=$editora->getId()?>" <?= $livro->getEditoraId() ? "selected" : ''?> > <?= $editora->getNome()?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
                
                <?php
                    $generosSelecionados =[];
                    if($livro->getId()){
                        foreach($generosLivrosDAO->listar($livro->getId()) as $generosLivros){
                            $generosSelecionados[] = $generosLivros->getGeneroId();    
                        }
                    }
                ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <label >Genero(s)</label>
                        <select name="generos[]" multiple id="" class="form-control" size="3" >
                            <option disabled>Selecione</option>

                            <?php foreach($generosDAO->listar() as $genero): ?>

                                <?php if(in_array($genero->getId(), $generosSelecionados)) : ?>
                                    <option value="<?=$genero->getId()?>"  selected> <?= $genero->getNome()?></option>
                                <?php else: ?>
                                    <option value="<?=$genero->getId()?>" > <?= $genero->getNome()?></option>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-muted">Precione as teclas CTRL + botão esquerdo do mouse para selecioanr mais de um</small>
                    </div>
                </div> 
            </div>
    
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Resumo</label>
                        <textarea name="resumo" class="form-control" id="" cols="50" rows="5"><?= $livro->getResumo()?></textarea>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nº de Páginas</label>
                        <input type="number" name="numero_de_paginas" class="form-control" value="<?= $livro->getNumeroDePaginas()?>">
                        
                    </div>
                </div>
            </div>
        
            <!-- <div class="row"> REMOVIDO POR FALTA DE TEMPO
                 <div class="col-md-2">
                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="imagem" class="">
                    </div>

                </div>
            </div>  -->
        
    
            <div class="pull-right">
                <a href="GuiLivros.php"><button type="button" class="btn btn-default">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
