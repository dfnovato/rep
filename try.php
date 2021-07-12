<?php 


include 'conexao.php';  // include com arquivo de conexao

$ds_capa = $_POST['txtnomeproduto'];
$cd_categoria = $_POST['txtcat'];
$preco = $_POST['txtpreco'];
$qtde = $_POST['txtqtde'];

echo$ds_capa;
echo$cd_categoria;
echo$preco;
echo$qtde;



?>