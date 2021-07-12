<?php
include 'conexao.php';

$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$endereco = $_POST['txtendereco'];
$cpf = $_POST['txtcpf'];
$cep = $_POST['txtcep'];


try {
	$alterar = $cn->query("UPDATE tbl_usuario SET  


	nm_usuario = '$nome',
	ds_email = '$email',
    ds_senha = '$senha',
	ds_endereco = '$endereco',
    no_cpf = '$cpf',
	no_cep = '$cep'
	
	WHERE no_cpf = '$cpf' 
    "); 

    header('location:index.php'); 


} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro
	
	
	echo $e->getMessage();  
	
}
?>