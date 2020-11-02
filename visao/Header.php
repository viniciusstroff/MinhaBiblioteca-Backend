<?php
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
include_once DIR_PERSISTENCIA . 'UsuariosDAO.class.php';
$usuariosDAO = new UsuariosDAO();
session_start();


 if(!isset($_SESSION['usuario_id'])){
    
    header('location:../index.php');
 }

 $usuarioLogado = $usuariosDAO->find($_SESSION['usuario_id']);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Minha Biblioteca</title>
        <link href="../css/style.css" rel="stylesheet">
        <link type='text/css' rel='stylesheet' href='../css/font.css'/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        
    </head>
    <body>
        
        <header>
          <?php include_once 'menu.php'; ?>  

            <?php if(isset($_SESSION['usuario_id'])): ?>
                <div class="dropdown">
                    <nav class="pull-right" style="margin-right: 15%;">
                        <ul class="menu">
                            <li><a class="fa fa-user fa-lg"href="#" style="color:white"> <?= isset($_SESSION['usuario_login']) ? $_SESSION['usuario_login'] : "" ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu"  role="menu">
                                    <li><a href="../visao/GuiEditarUsuario.php?op=editar&id=<?= $usuarioLogado->getId() ?> "><i class="fa fa-user"></i> Meus dados</a></li>
                                    <li><a href="../controle/LoginControle.php?op=logout"><i class="fa fa-power-off"></i> Sair</a></li>
                                </ul>
                            </li>             
                        </ul>
                    </nav>
                </div>

            <?php endif; ?>
            <h1 class="text-center">Minha Biblioteca</h1>
            
            
                
        </header>
        <main>
            <div class="container">
        
