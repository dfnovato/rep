<?php

include 'conexao.php';

$cd=$_GET['id'];


$pasta = "img/";


$consulta = $cn->query("SELECT * FROM tbl_produto WHERE cd_produto='$cd'");

$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$excluir = $cn->query("DELETE FROM tbl_produto WHERE cd_produto='$cd'");

$foto1=$exibe['nm_produto'];  

if ($foto1!="") { 
	
	unlink($pasta.$foto1);
	
}

//redirecionado usuario para página lista.php
header('location:adm_auter.php');

?>