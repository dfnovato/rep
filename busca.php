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
  <link rel="stylesheet" href="css/styles.css">
  <style>
      .carousel-control-next,
      .carousel-control-prev ,
      .carousel-indicators {
    filter: invert(100%);
}
  </style>
</head>
<body style="min-width:372px;">
  

<?php
session_start();
include 'conexao.php';
?>


<?php include 'nav.php' ?>

<header class="container">
    <div id="carouselMain" class="carousel  slide" data-ride="carousel">
        <ol class="carousel-indicators"  >
            <li data-target="#carouselMain" data-slide-to="0" class="active"></li>
            <li data-target="#carouselMain" data-slide-to="1" class="active"></li>
            <li data-target="#carouselMain" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active text-center" data-interval="5000">
                <img src="../CompraCertatest2/img/slides/slide01.jpg" alt="meu slide" class="img-fluid d-none d-md-block">
                <img src="../CompraCertatest2/img/slides/slide01small.jpg" alt="" class="img-fluid d-block d-md-none">
            </div>
            <div class="carousel-item  text-center" data-interval="5000">
                <img src="../CompraCertatest2/img/slides/slide02.jpg" alt="" class="img-fluid d-none d-md-block">
                <img src="../CompraCertatest2/img/slides/slide02small.jpg" alt="" class="img-fluid d-block d-md-none">
            </div>
            <div class="carousel-item  text-center" data-interval="5000">
                <img src="../CompraCertatest2/img/slides/slide01.jpg" alt="" class="img-fluid d-none d-md-block">
                <img src="../CompraCertatest2/img/slides/slide01small.jpg" alt="" class="img-fluid d-block d-md-none">
            </div>
            
        </div>

        <a class="carousel-control-prev" href="#carouselMain" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carouselMain" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <hr class="mt-3">
</header>
<main class="mb-5 pb-5 mb-md-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <form class="justify-content-center justify-content-md-start" method="get" action="busca.php" name="frmpesquisa">
                   <div class="input-group input-group-sm">
                       <input type="search" class="form-control" placeholder="Digite aqui o que procura" name="txtbuscar">
                       <button class="btn pta btn-danger padding">Buscar</button>
                   </div>
                </form>

            </div>
            <div class="col-12 col-md-7">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                    <form class="ml-3 d-inline-block">
                        <select class="form-select form-select-sm">
                                <option >Mostrar Tudo</option>
                                <option >Mostrar Salgadinhos</option>
                                <option >Mostrar Frutas</option>
                                <option >Mostrar Jogos</option>
                        </select>
                    </form>
                    <nav class="d-inline-block">
                        <ul class="pagination pagination-sm my-0">
                            <li class="page-item disabled" >
                                <button class="page-link">1</button>
                            </li>
                            <li class="page-item" >
                                <button class="page-link">2</button>
                            </li>
                            <li class="page-item " >
                                <button class="page-link">3</button>
                            </li>
                            <li class="page-item" >
                                <button class="page-link">4</button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <hr class="mt-3">

        <?php
        $pesquisa = $_GET['txtbuscar'];
        $consulta = $cn->query("select * from vw_produto where ds_capa like concat('%','$pesquisa','%') or ds_categoria like concat('%','$pesquisa','%')");   
        if($consulta->rowCount() == 0){
            echo"<html> <script> location.href='erro3.php' </script> </html>";
        ?>
        <?php }else{ ?>
        <div class="row ">

        <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>

            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
                <div class="card text-center bg-light">
                    <a href="#" class="position-absolute  p-2 text-danger" title="adicionar aos favoritos">
                        <span class="far fa-heart "></span>
                    </a>
                    <img src="img/<?php echo $exibe['nm_produto' ]; ?>" class="card-img-top">
                <div class="card-header">
                    R$: <?php echo number_format( $exibe['vl_preco'],2,',','.'); ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $exibe['ds_capa']; ?> </h5>
                    <p class="card-text"><?php echo mb_strimwidth ($exibe['ds_categoria'],0,10,'...'); ?></p>
                </div>
                <div class="card-footer">
                <?php if($exibe['qt_estoque'] > 0 ){   ?>
                    <a href="./carrinho.php? cd= <?php echo $exibe['cd_produto']; ?> ">
                    <button class="btn btn-danger">
                            Adicionar ao carrinho
                        </button> 
                    </a>
                    <small class="text-success"><?php echo $exibe['qt_estoque']; ?> unid. estoque</small>
                <?php  }else { ?>
                    <button class="btn btn-light disabled" disabled>
                        <small class="text-danger">Produto</small>
                        <small class="text-danger">Esgotado</small>
                    </button>
                    <small class="text-danger">Sem estoque</small>
                    <?php }?>
                </div>
                
                </div>
 
            </div>
            <?php }?>
            <?php }?>
        </div>
        <hr class="mt-3">
        <div class="row pb-4">
            <div class="col-12">
                
                    <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                        <form class="ml-3 d-inline-block">
                            <select class="form-select form-select-sm">
                                <option >Mostrar Tudo</option>
                                <option >Mostrar Salgadinhos</option>
                                <option >Mostrar Frutas</option>
                                <option >Mostrar Jogos</option>
    
                            </select>
                        </form>
                        <nav class="d-inline-block">
                            <ul class="pagination pagination-sm my-0">
                                <li class="page-item disabled">
                                    <button class="page-link">1</button>
                                </li>
                                <li class="page-item" >
                                    <button class="page-link">2</button>
                                </li>
                                <li class="page-item" >
                                    <button class="page-link">3</button>
                                </li>
                                <li class="page-item" >
                                    <button class="page-link">4</button>
                                </li>
                            </ul>
                        </nav>
                    </div>
    
                </div>

            </div>
        </div>
    </div>
    
    

</main>
<?php include 'footer.php' ?>
</body>
</html>
