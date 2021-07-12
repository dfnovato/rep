<?php

include 'conexao.php';  

$tick= $_GET['id2'];
$id = $_GET['id']; 

$id=6;

try {
	
    $alterar = $cn->query("UPDATE tbl_venda SET  

	cd_status = '$id'

	
    WHERE no_ticket = '$tick'");
    
    header('location:minhacontacliente_pedidos.php');


}catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}
