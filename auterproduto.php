<?php

include 'conexao.php';
include 'resize-class.php'; 

$cd_produto = $_GET['cd_altera']; 


$consulta = $cn->query("SELECT nm_produto FROM tbl_produto WHERE cd_produto='$cd_produto'"); 

$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


// todas as laterações feitas nos campos serão salvas nas variaveis abaixo

$isbn = $_POST['txtisbn'];
$categoria = $_POST['sltcat'];
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];


$recebe_foto1 = $_FILES['txtfoto1'];


$destino = "img/";


if (!empty($recebe_foto1['name'])) { // se a propriedade name[propriedade que pega o nome da imagem ] não estiver vazia faça

	preg_match("/\.(jpg|jpeg|png|gif){1}$/i",$recebe_foto1['name'],$extencao1); 
	$img_nome1 = md5(uniqid(time())).".".$extencao1[1]; 

	$upload_foto1=1;

}

else {  // caso não haja alteração na imagem, pegar o nome da imagem que está no banco
	
	$img_nome1=$exibe['nm_produto'];
	$upload_foto1=0;
	
}
	

try {
	$alterar = $cn->query("UPDATE tbl_produto SET  

	cd_categoria = '$categoria',
	nm_produto = '$img_nome1',
	vl_preco = '$preco',
	qt_estoque = '$qtde',
	ds_capa = '$isbn'
	

	
	WHERE cd_produto = '$cd_produto' 	
	"); 
	
	
	if ($upload_foto1==1) {  // se a foto1 for igual a 1 é pq foi feito alteração será feita
		
		
		move_uploaded_file($recebe_foto1['tmp_name'], $destino.$img_nome1);             
		$resizeObj = new resize($destino.$img_nome1);
		$resizeObj -> resizeImage(340, 480, 'crop');
		$resizeObj -> saveImage($destino.$img_nome1, 100);
		
	}
	

	header('location:Produto.php');  // redirecionando para a pagina menu principal (se tudo der certo)
	
} catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro
	
	
	echo $e->getMessage();  
	
}



?>