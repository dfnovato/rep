<?php 

include 'conexao.php';

session_start();

// SUPER GLOBAL
$vemail = $_POST['txtemail'];
$vsenha = $_POST['txtsenha'];


$consulta = $cn->query("select cd_usuario, ds_email, ds_senha, nm_usuario, ds_status from tbl_usuario where ds_email = '$vemail' and ds_senha ='$vsenha' ");
if($consulta->rowCount ()==1){ //usuario existe?
$exibeusuario =$consulta->fetch(PDO::FETCH_ASSOC);
if($exibeusuario['ds_status'] == 0)
{
$_SESSION['ID'] = $exibeusuario['cd_usuario'];
$_SESSION['status'] = 0;
header('location:index.php');
}else{
    $_SESSION['ID'] = $exibeusuario['cd_usuario'];
    $_SESSION['status'] = 1;
    header('location:index.php');
}

}
else{
header('location:error.php');
}

?>