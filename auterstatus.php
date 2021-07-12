<?php

include 'conexao.php';

$ticket = $_GET['cd_altera']; 


//criando uma array 
$consulta = $cn->query("SELECT no_ticket FROM tbl_venda WHERE no_ticket='$ticket'"); 
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


// todas as laterações feitas nos campos serão salvas nas variaveis abaixo

$stat = $_POST['sltstatus'];

	

try {
	$alterar = $cn->query("UPDATE tbl_venda SET  

	cd_status = '$stat'

	
    WHERE no_ticket = '$ticket'");
    header('location:adm_venda.php');
    
	
} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro
	
	
	echo $e->getMessage();  
	
}

?>