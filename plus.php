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
          header('location:carrinho.php');

	}
		// incluindo o arquivo 'mostraCarrinho.php'
		include 'mostraCarrinho.php';
		
	} else {
		
		//mostrando o carrinho	vazio	
		include 'mostraCarrinho.php';
		
		
	}	





?>