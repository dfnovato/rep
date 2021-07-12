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
  <script src="jquery.mask.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/CompraCertatest2/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../CompraCertatest2/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../CompraCertatest2/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/CompraCertatest2/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="/CompraCertatest2/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="css/styles.css">


    

</head>




<body style="min-width:372px;">
<?php
session_start();
// s n log volta index
if(empty($_SESSION['status']) || $_SESSION['status'] !=1){
    header('location:index.php');
}

include 'conexao.php';
$consulta1 = $cn->query("select * from tbl_categoria");
$consulta = $cn->query("select * from tbl_produto");

?>
<?php include 'nav.php' ?>

<main class="mb-5 pb-5 mb-md-0">
  
    <div class="container">
        <h1>Administrador</h1>
        <div class="row gx-3 mb-3">
            <div class="col-4">
                <div class="list-group">
                    <a href="adm_inserir.php" class="list-group-item list-group-item-action">
                        <i class="bi-person fs-6"></i>Incluir Produto
                    </a>
                    <a href="adm_auter.php" class="list-group-item list-group-item-action  bg-danger text-light">
                        <i class="bi-truck fs-6"></i> Alterar/Excluir Produto
                    </a>
                    <a href="adm_venda.php" class="list-group-item list-group-item-action">
                        <i class="bi-heart fs-6"></i> Vendas
                    </a>
                    <a href="sair.php" class="list-group-item list-group-item-action">
                        <i class="bi-door-open fs-6"></i> Sair
                    </a>
                </div>
            </div>

            <hr class="mt-3">


    <div class="accordion col-12 col-md-8">
	
    <div class="card">
    
    <div class="card-header">
            
    <h2>Alterar / Excluir</h2>



<div class="row">
<?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
    <div class="col-xl-4 col-lg-6 col-md-8 col-sm-12 d-flex align-items-stretch">
        <div class="card text-center bg-light">
            <img src="img/<?php echo $exibe['nm_produto' ]; ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"> <?php echo $exibe['ds_capa']; ?> </h5>

            <a href="formauter.php?id=<?php echo $exibe ['cd_produto'];?>&id2=<?php echo $exibe['cd_categoria']; ?>">

            <button class="btn btn-warning ">
                  <span>  Alterar Produto </span>
                </button> 
            </a>

        </div>
        <div class="card-footer">

            
            <a href="excluir.php?id=<?php echo $exibe ['cd_produto'];?>">
            <button class="btn btn-danger">
                    Excluir Produto
                </button> 
             </a>   
            <p>
            <small class="text-warning"><?php echo $exibe['qt_estoque']; ?> unid. estoque</small>
            </p>


        </div>
        
        </div>
    </div>

<?php }?>
</div>






            </main>
<?php include 'footer.php' ?>
</body>
</html> 
    