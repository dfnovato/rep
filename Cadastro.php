<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cadastro CompraCerta</title>
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

<?php include 'nav.php' ?>

    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            <h1>Informe seus Dados para cadastro</h1>
            <hr>
            <form method="post" id="register-form" action="./insertusuario.php" name="logon">
                <fieldset class="row">
                    <div class="form-group col-sm-12 col-md-8">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="cpf" placeholder="informe seu nome" name="txtnome" required id = "nome">
                     </div>
                     <div class="form-group col-sm-12 col-md-4">
                        <label for="textCpf">CPF:</label>           
                        <input type="text" class="form-control" id="textCpf" placeholder="informe seu CPF" name="txtcpf" required id = "cpf">
                      </div>
                    
                </fieldset>
                <fieldset class="row">
                    <div class="form-group col-12">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="txtemail" required id ="email">
                      </div>
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" id="senha" placeholder="Entre sua senha" name="txtsenha" required id ="senha">
                      </div>
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="confirme">Confirmação de senha:</label>
                        <input type="password" class="form-control" id="confirme" placeholder="Confirme sua senha" name="txtconfirma_senha">
                      </div>
                    
                </fieldset>
                                         
                <hr>
                <fieldset class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="textEndereco">Endereço:</label>
                        <input type="textEndereco" class="form-control" id="textEndereco" placeholder="Digite seu endereço  " name="txtendereco" required id = "endereco">
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="cep">CEP:</label>
                        <input type="cep" class="form-control" id="cep" placeholder="aqui seu cep  " name="txtcep" required  id = "cep">
                      </div>
                      </select>
                      <br>
                      <br>
                      <br>

                </fieldset>
                <hr>
                  
                <div class="form-group form-check">
                  <label><input class="form-check-input" type="checkbox" name="remember"> Deseja receber informações de promoções?</label>
                </div>
                <button type="submit" class="btn btn-danger">Cadastrar</button>
              </form>
             
        </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
    <script src="js/scripts.js"></script>
</body>

</html>