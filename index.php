
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        
    </head>
    <body>
        <div class="container">
        <h1 class="text-center">Minha Biblioteca</h1>
        
            <div class="row" style="margin-top: 20%;">
                    
            <?php include_once './visao/Mensagens.php';?>
                    <div class="col-md-12 well">
                        
                        <form action="/minhabiblioteca/controle/LoginControle.php?op=login" method="post">
                            <div class="form-group">
                                <label for="">Login</label>
                                <input type="text" name="login" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="password" name="senha" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>

                                <a class="pull-right" href="cadastro.php">Cadastrar</a>
                           
                            
                            </div>
                            


                        </form>
                    </div>
                </div>
        </div>

               
    </body>
</html>     
