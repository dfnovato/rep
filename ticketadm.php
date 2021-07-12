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
// s n log volta index
if(empty($_SESSION['status']) || $_SESSION['status'] !=1){
    header('location:index.php');
}
include 'conexao.php';
$cd_Usuario = $_SESSION['ID'];
$ticket_compra= $_GET['ticket'];
$stat= $_GET['id'];
$consultavenda = $cn->query(" SELECT * FROM vw_venda WHERE no_ticket ='$ticket_compra'");
$consultastatus = $cn->query("SELECT cd_status, dst_status FROM tbl_status WHERE cd_status='$stat' union select cd_status, dst_status FROM tbl_status where cd_status !='$stat'");
?>

<?php include 'nav.php' ?>
<main class="mb-5 pb-5 mb-md-0">


        <div class="container">
            <h1>Minha Conta</h1>
            <div class="row gx-3 mb-3">
                <div class="col-4">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi-person fs-6"></i> Dados Pessoais (Construção)
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
         $total=0;
        while ($exibevenda = $consultavenda-> fetch(PDO::FETCH_ASSOC)) {
            $total += $exibevenda['vl_total_item'];
        ?>

        <div class="col-sm-2 col-sm-offset-1"> <?php echo ( $exibevenda['dst_status']);?></div>
		<div class="col-sm-3">   <?php echo $exibevenda['no_ticket'];?> </div>
        <div class="col-sm-3"> <?php echo $exibevenda['ds_capa'];?> </div>
        <div class="col-sm-2"> <?php echo $exibevenda['qt_produto'];?> </div>
        <div class="col-sm-2"> <?php echo number_format( $exibevenda['vl_total_item'],2,',','.');?> </div>    
        
           <?php } ?>
           </div>
           <div class="col- sm12" style="margin-top: 15px;">
           <hr>



            <h3 class="text-center">Total dessa compra: R$<?php echo number_format( $total,2,',','.');?></h>
            <hr>



            <form method="post" action="auterstatus.php?cd_altera=<?php echo $ticket_compra;?>" name="auterProd" enctype="multipart/form-data">
             <div class="form-group ">
                
                    <select class="form-control" name="sltstatus">
 
                    <?php while($listastatus = $consultastatus->fetch(PDO::FETCH_ASSOC)) {  ?>
					  
					  <option value="<?php echo $listastatus['cd_status'];?>"><?php echo $listastatus['dst_status'];?></option>			
                      <?php } ?>		
					</select>

                    <div class="form-group">
				
                
                <input type="text" name="txtticket" value="<?php echo $ticket_compra; ?>"  class="form-control d-none" required id="txtticket">
                </div>

                    
                    <button type="submit" style="margin-top: 15px;" class="btn btn-success col-12">Alterar Status da Compra</button>

            </form>
   
         </div>

           <hr>
            <a href="./adm_venda.php"><button type="" class="btn btn-danger col-12">voltar</button> </a>
           </div>
  </p>
                              </div>
                              
                            </div>
                            
                          </div>
                          
                    </div>   
                    
                       
                        
                    </div>
                </div>
            </div>
        
            
            

    

</main>
<?php 
include 'footer.php' ?>
</body>
</html>

