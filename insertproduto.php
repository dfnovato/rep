<?php

include 'conexao.php';  
include 'resize-class';

$isbn = $_POST['txtisbn'];
$cd_cat = $_POST['sltcat'];  // recebendo o valor do campo select, valor numérico
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];


$recebe_foto1 = $_FILES['txtfoto1'];

$destino = "img/";  // informando para qual diretorio será enviado a imagem



preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1);


$img_nome1 = md5(uniqid(time())).".".$extencao1[1];


try {
	
	$inserir=$cn->query("INSERT INTO tbl_produto(cd_categoria, nm_produto, vl_preco, qt_estoque, ds_capa) VALUES ('$cd_cat', '$img_nome1', '$preco', '$qtde', '$isbn')");

	
 ini_set('display_errors', 0 );

 error_reporting(0);
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	
	move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
	$resizeObj = new resize($destino.$img_nome1);
	$resizeObj -> resizeImage(900, 640, 'crop');
	$resizeObj -> saveImage($destino.$img_nome1, 100);

	hearder('Location:Produtos.php');



}catch(PDOException $e) {
	
	
	echo $e->getMessage();
	
}

?>
