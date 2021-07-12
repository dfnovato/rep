<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login CompraCerta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/CompraCertatest2/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../CompraCertatest2/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../CompraCertatest2/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/CompraCertatest2/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/CompraCertatest2/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">



</head>

<body style="min-width:372px;">

<?php
include 'conexao.php';
$consulta = $cn->query('select*from vw_produto');
?>

<?php include 'nav.php' ?>



    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            
            <div>
                <form class="col-sm-10 col-md-8 col-lg-6" id="register-form" name="formusuario" method="post" action="./validausuario.php">
                    <h1 class="mb-3">Identifique-se</h1>
                    <hr>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="txtemail" placeholder="Enter email" name="email" required id="email">
                          </div>
                          <div class="form-group col-12">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control" name="txtsenha" placeholder="Entre sua senha" name="senha" required id="senha">
                          </div>
                        
                                                  
                    </div>
                    <div class="form-group form-check">
                        <label><input class="form-check-input" type="checkbox" name="remember"> lembrar de mim</label>
                      </div>
                      <button type="submit" class="btn btn-danger">Submit</button>
                      <p class="mt-3">
                          Não Cadastrado?<a href="../CompraCertatest2/Cadastro.php">Clique Aqui</a> para cadastrar-se

                      </p>
    
                </form>
            </div>          
           
        </div>      

    </main>
    <?php include 'footer.php' ?>
    <script src="js/scripts.js"></script>
</body>

</html>