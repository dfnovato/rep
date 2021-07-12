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
include 'conexao.php';
$cd_Usuario = $_SESSION['ID'];
$consultavenda = $cn->query("select*from vw_venda where cd_cliente='$cd_Usuario' group by no_ticket");

?>

<?php include 'nav.php' ?>
<main class="mb-5 pb-5 mb-md-0">


        <div class="container">
            <h1>Minha Conta</h1>
            <div class="row gx-3 mb-3">
                <div class="col-4">
                    <div class="list-group">
                        <a href="minhacontacliente_dados.php" class="list-group-item list-group-item-action">
                            <i class="bi-person fs-6"></i> Dados Pessoais
                        </a>
                        <a href="../CompraCertatest2/minhacontacliente_pedidos.php" class="list-group-item list-group-item-action bg-danger text-light">
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
                    <form class="row mb-3">
                        <div class="col-12 col-md-6 mb-3">
                            <div >
                                <select class="form-select">
                                    <option value="30">Últimos 30 dias</option>
                                    <option value="60">Últimos 60 dias</option>
                                    <option value="90">Últimos 90 dias</option>
                                    <option value="180">Últimos 180 dias</option>
                                    <option value="360" selected>Últimos 360 dias</option>
                                    <option value="9999">Todo o período</option>
                                </select>
                                <label>Período</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div >
                                <select class="form-select">
                                    <option value="1" selected>Mais novos primeiro</option>
                                    <option value="2">Mais antigos primeiro</option>
                                </select>
                                <label>Ordenação</label>
                            </div>
                        </div>
                    </form>
   
                        <div class="card">
                          <div class="card-header">
                          <a><b> Pedidos </b></a>
                            </a>
                          </div>

                            <div class="card-body">
                            
                            <div class="row" style="margin-top: 15px;">
		

    
 
		
		<div class="col-sm-4 col-sm-offset-1"><h5> <b>Data </b></h5></div>
		<div class="col-sm-4"><h5> <b>Ticket</b></h5> </div>
        <div class="col-sm-4"><h5> <b></b></h5> </div>
		
        
		<?php while ($exibevenda = $consultavenda-> fetch(PDO::FETCH_ASSOC)) {?>	
            
        <div class="col-sm-4 col-sm-offset-1"> <?php echo ($exibevenda['dt_venda']);?></div>
        
		<div class="col-sm-4">   <?php echo $exibevenda['no_ticket'];?> </div>

        <a href="ticket.php?ticket=<?php echo $exibevenda['no_ticket']; ?> "class="col-sm-4"> Compra detalhada </a>
        <?php } ?>
        
  </p>
                              </div>
                            </div>
                          </div>
                    </div>   
                    
                       
                        
                    </div>
                </div>
            </div>
        </div>
    
    
    
    

</main>
<?php include 'footer.php' ?>
</body>
</html>
