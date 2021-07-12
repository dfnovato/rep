<!DOCTYPE html>
<html lang="en">
<head>
  <title>CompraCerta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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

  
  </style>
</head>
<body style="min-width:372px;">
  
<?php
session_start();
if(empty($_SESSION['ID'])){
		
    header('location:login.php');
    
}
$cd_user = $_SESSION['ID']; 
include 'conexao.php';


$consultauser  = $cn->query("select*from tbl_usuario where cd_usuario='$cd_user'");
$exibeuser = $consultauser ->fetch(PDO::FETCH_ASSOC);

?>
<?php include 'nav.php' ?>
<main class="mb-5 pb-5 mb-md-0">
  
    <div class="container">
        <h1>Minha Conta</h1>
        <div class="row gx-3 mb-3">
            <div class="col-4">
                <div class="list-group">
                    <a href="minhacontacliente_dados.php" class="list-group-item list-group-item-action  bg-danger text-light">
                        <i class="bi-person fs-6"></i> Dados Pessoais
                    </a>
                    <a href="../CompraCertatest2/minhacontacliente_pedidos.php" class="list-group-item list-group-item-action">
                        <i class="bi-truck fs-6"></i> Pedidos
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">
                        <i class="bi-heart fs-6"></i> Favoritos (Construção)
                    </a>
                    </a>
                    <a href="sair.php" class="list-group-item list-group-item-action">
                        <i class="bi-door-open fs-6"></i> Sair
                    </a>
                </div>
            </div>
     
            <div class="col-8">
                    <form class="row">
                        <div class="col-12 col-md-6">
                        </div>
                        <div class="col-12 col-md-6">

                        </div>
                    </form>
   
                        <div class="card">
                          <div class="card-header">
                          <a><b> Dados Pessoais </b></a>
                            </a>
                          </div>

                            <div class="card-body">
                            
                            <div class="row" style="margin-top: 15px;">
        
        <div class="form-group col-sm-12 col-md-8">

        <form method="post" id="alter-form" action="./auterusuario.php" name="logon">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="cpf" value="<?php echo $exibeuser['nm_usuario'];?>" name="txtnome" required id = "nome">
                     </div>
                     <div class="form-group col-sm-12 col-md-4">
                        <label for="textCpf">CPF:</label>           
                        <input type="text" class="form-control" id="textCpf" value="<?php echo $exibeuser['no_cpf'];?>" readonly="readonly" name="txtcpf" required id = "cpf">
                      </div>
                    <div class="form-group col-9">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $exibeuser['ds_email'];?>" name="txtemail" required id ="email">
                      </div>

                      <div class="form-group col-sm-12 col-md-3">
                        <label for="cep">CEP:</label>
                        <input type="cep" class="form-control" id="cep" value=<?php echo $exibeuser['no_cep'];?> name="txtcep" required  id = "cep">
                        </div>

                      <div class="form-group col-sm-12 col-md-8">
                        <label for="textEndereco">Endereço:</label>
                        <input type="text" class="form-control" id="textEndereco" value="<?php echo $exibeuser['ds_endereco'];?>" name="txtendereco" required id = "endereco">
                      </div>
 
                        <div class="form-group col-sm-12 col-md-4">
                        <label for="senha">Senha:</label>
                        <input type="text" class="form-control" id="senha" value="<?php echo $exibeuser['ds_senha'];?>" name="txtsenha" required id ="senha">
                      </div>
                        </p>
                              </div>
                              <button type="submit" class="btn btn-danger">Alterar</button>
                      </form>
                            </div>
                          </div>
                    </div>   
                    
                       
                        
                    </div>
                </div>
            </div>
        </div>
    
    
    
    


</main>
</div>
<?php include 'footer.php' ?>
</body>
</html>
