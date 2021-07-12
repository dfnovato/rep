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
$consulta = $cn->query('select*from vw_produto');
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
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
          <div class="col-sm-4">
          <div class="card ">
                <h5 class="card-header text-white text-center  bg-danger" >PROMOÇÃO</h5>
              
              <div class="card-body"><img src="../compracertatest2/img/goiaba.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
              <div class="card-footer">Grande Promoção da Feira da Fruta</div>
              <a href="./produtos.php" class="btn btn-success">Veja em produtos</a>
            </div>
            
          </div>
          <div class="col-sm-4">
            <div class="card ">
                <h5 class="card-header text-white text-center  bg-danger" >PROMOÇÃO</h5>
              
              <div class="card-body"><img src="../compracertatest2/img/doritos.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
              <div class="card-footer">Grande Promoção Salgadinhos</div>
              <a href="./produtos.php" class="btn btn-success">Veja em produtos</a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card ">
                <h5 class="card-header text-white text-center  bg-danger" >PROMOÇÃO</h5>
              
              <div class="card-body"><img src="../compracertatest2/img/war.jpg" class="img-responsive" style="width:100%" alt="Image"></div>
              <div class="card-footer">Grande Promoção de  Jogos de tabuleiro</div>
              <a href="./produtos.php" class="btn btn-success">Veja em produtos</a>
            </div>
          </div>
          
         
        </div>
      </div>
    
    </div>
    
    

</main>
<?php include 'footer.php' ?>
</body>
</html>
