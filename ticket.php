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
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> 
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
$ticket_compra= $_GET['ticket'];
$consultavenda = $cn->query(" SELECT * FROM vw_venda WHERE no_ticket ='$ticket_compra'");
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
                          <a><b> Pedido <?php echo $ticket_compra ?> </b></a>
                         
                          
                            </a>
                          </div>

                            <div class="card-body">
                            
                            <div class="row" style="margin-top: 15px;">
		


 
		
		<div class="col-sm-2 col-sm-offset-1"><h5> <b>Status </b></h5></div>
		<div class="col-sm-3"><h5> <b>Ticket</b></h5> </div>
        <div class="col-sm-3"><h5> <b>Produto</b></h5> </div>
        <div class="col-sm-2"><h5> <b>Qtd</b> </h5></div>
        <div class="col-sm-2"><h5> <b>Preço T</b></h5> </div>
		
        
       
		<?php 
         $total=0; // variavel chamada
        while ($exibevenda = $consultavenda-> fetch(PDO::FETCH_ASSOC)) {
            $total += $exibevenda['vl_total_item'];
            
        ?>	  
        <div class="col-sm-2 col-sm-offset-1"> <?php echo ( $exibevenda['dst_status']);?></div>
		<div class="col-sm-3">   <?php echo $exibevenda['no_ticket'];?> </div>
        <div class="col-sm-3"> <?php echo $exibevenda['ds_capa'];?> </div>
        <div class="col-sm-2"> <?php echo $exibevenda['qt_produto'];?> </div>
        <div class="col-sm-2"> <?php echo number_format( $exibevenda['vl_total_item'],2,',','.');?> </div>    
        <div class="col-sm-2 d-none"> <?php echo $exibevenda['cd_status'];?> </div>
           <?php 
        $dive=$exibevenda['cd_status'];
        $tick=$exibevenda['no_ticket'];
        } ?>
           </div>
           <div class="col- sm12" style="margin-top: 15px;">
           
           <hr>
            <h3 class="text-center">Total dessa compra: R$<?php echo number_format( $total,2,',','.');?></h>
            <hr>
            <a href="./minhacontacliente_pedidos.php"><button type="submit" class="btn btn-danger col-12">voltar</button> </a>
           
           </div>
        </div>


        <br>
  </p>
     </div>
             <?php  if(($dive) ==5 ){ ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                
                <div class="rating">
                <input type="radio" name="star5" id="star5"><label for="star5"></label>
                <input type="radio" name="star4" id="star4"><label for="star4"></label>
                <input type="radio" name="star3" id="star3"><label for="star3"></label>
                <input type="radio" name="star2" id="star2"><label for="star2"></label>
                <input type="radio" name="star1" id="star1"><label for="star1"></label>
                <div class="col-sm-10 col-sm-offset-1">
                  
                <a href="./rate.php?id=<?php echo$dive?>& id2=<?php echo $tick?>"><button type="submit" class="btn btn-info col-12 ">Avaliar</button> </a>
             </div>
              </div>
             
                    
            <?php  }else{ ?>        

                <div class="col-sm-2 d-none">nada</div>
              
            <?php } ?>  
                    
                              
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
