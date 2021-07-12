<?php
include 'conexao.php';

$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$endereco = $_POST['txtendereco'];
$cpf = $_POST['txtcpf'];
$cep = $_POST['txtcep'];


/* teste
echo $nome.'<br>';
echo $email.'<br>';
echo $senha.'<br>';
echo $endereco.'<br>';
echo $cep.'<br>';
echo $cpf.'<br>';
*/

$consulta2 = $cn->query("select ds_email from tbl_usuario where no_cpf= '$cpf' ");
$exibe2 = $consulta2 ->fetch(PDO::FETCH_ASSOC);

$consulta = $cn->query("select ds_email from tbl_usuario where ds_email= '$email' ");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);

if($consulta-> rowCount()==1 or $consulta2-> rowCount()==1) {
    header('location:erro2.php');
}
else{
    $incluir = $cn->query(" 
    insert into tbl_usuario(nm_usuario, ds_email, ds_senha, ds_status, ds_endereco, no_cpf, no_cep)
    values('$nome','$email','$senha','0','$endereco','$cpf',$cep)");
    header('location:confirmacadastro.php');
}

?>