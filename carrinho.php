<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompraCerta::Pagina Tal</title>
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
	
	session_start(); 
	if(empty($_SESSION['ID'])){
		
		header('location:login.php');
		
	}

	
	include 'conexao.php';
	include 'nav.php';
	
	// verificando se o codigo do produto NÃO está vazio
	if (!empty($_GET['cd'])) {
	
	// inserindo o código do produto na variável $cd_prod
	$cd_prod=$_GET['cd'];
	
	// se a sessão carrinho não estiver preenchida
	if (!isset($_SESSION['carrinho'])) {
		  // será criado uma sessão chamado carrinho para receber um vetor
		  $_SESSION['carrinho'] = array();
	}


	
	// se a variavel $cd_prod não estiver setado(preenchida)
	if (!isset($_SESSION['carrinho'][$cd_prod])) {
		
		//  adicionado um produto ao carrinho
		$_SESSION['carrinho'][$cd_prod]=1;
	}
	
	// se setada adiciona novos produtos
	else {
		  $_SESSION['carrinho'][$cd_prod]+=1;

	}
		// incluindo o arquivo 'mostraCarrinho.php'
		include 'mostraCarrinho.php';
		
	} else {
		
		//mostrando o carrinho	vazio	
		include 'mostraCarrinho.php';
		
		
	}	
	
	?>
	


    
    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
                <li class="list-group-item py-3">
                    <div class="text-right">
                        <h4 class="text-dark mb-3">
                            Valor Total: R$ <?php echo number_format($total,2,',','.'); ?>
                        </h4>
                        <a href="./Produtos.php" class="btn btn-outline-success btn-lg">
                            Continuar Comprando                        
                        </a>
                        <?php if(count($_SESSION['carrinho'])>0) { ?>
                        <a href="../compracertatest2/fechamentocomprasveio.php" class="btn btn-danger btn-lg ms-2 mt-xs-3">Fechar Compra</a>
                   <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
        </div>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>