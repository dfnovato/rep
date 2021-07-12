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
	$qnt_prod=$_GET['qnt'];
	// se a sessão carrinho não estiver preenchida
	if (!isset($_SESSION['carrinho'])) {
		  // será criado uma sessão chamado carrinho para receber um vetor
		  $_SESSION['carrinho'] = array();
	}

	
	// se a variavel $cd_prod não estiver setado(preenchida)
	if ($qnt_prod <2) {
		
		//  adicionado um produto ao carrinho
		unset($_SESSION['carrinho'][$cd_prod]);
        
	}
	
	// se setada adiciona novos produtos
	else {
        $_SESSION['carrinho'][$cd_prod]-=1;
          header('location:carrinho.php');

	}
		// incluindo o arquivo 'mostraCarrinho.php'
		header('location:carrinho.php');
		
	} else {
		header('location:carrinho.php');
		//mostrando o carrinho	vazio	
		
		
		
	}	





?>