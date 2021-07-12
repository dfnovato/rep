<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fechaento de compras</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="apple-touch-icon" sizes="180x180" href="/CompraCertatest2/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../CompraCertatest2/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../CompraCertatest2/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="/CompraCertatest2/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="/CompraCertatest2/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  
</head>
<body style="min-width:372px;">
  
<?php

session_start();  

include 'conexao.php';


$data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
$ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
$cd_user = $_SESSION['ID'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

//// criando um loop para sessão carrinho q recebe o $cd e a quantidade
foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $cn->query("SELECT vl_preco FROM tbl_produto WHERE cd_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    $preco = $exibe['vl_preco'];
    
	
	$inserir = $cn->query("INSERT INTO tbl_venda(no_ticket,cd_cliente,cd_produto,qt_produto,vl_item,dt_venda,cd_status)  VALUES
	('$ticket','$cd_user','$cd','$qnt','$preco','$data','1')");
	
}
$consultauser  = $cn->query("select*from tbl_usuario where cd_usuario='$cd_user'");
$exibeuser = $consultauser ->fetch(PDO::FETCH_ASSOC);
?>

<?php include 'nav.php' ?>

<main class="mb-5 pb-5 mb-md-0">
    
    <div class="container">
        <div class="container">
            <h1>Selecione a Forma de Pagamento</h1>
            <h3 class="mb-4">
                Pague com cartão, escolha um endereço de entrega e clique em <b>Finalizar</b> para prosseguir para <b>concluir o
                    pedido</b>.
            </h3>
            <div class="d-flex justify-content-between flex-wrap border rounded-top pt-4 px-3">

                <div class="mb-4 mx-2 flex-even">
                    
                    <label class="btn btn-outline-danger p-4 h-100 w-100" for="pag1">
                        <h3>
                            <b class="text-dark">Cartão de Crédito</b>
                        </h3>
                        <hr>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" id="txtNome" class="form-control" placeholder="Nome pessoal" autofocus required>
                                <label for="txtNome" class="text-black-50">Nome Impresso no Cartão</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" id="txtNumero" class="form-control" placeholder=" 000000" required>
                                <label for="txtNumero" class="text-black-50">Número do Cartão</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" id="txtValidade" class="form-control" placeholder="mm/aa " required>
                                <label for="txtValidade" class="text-black-50">Validade (mm/aa)</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" id="txtCodigo" class="form-control" placeholder=" 000">
                                <label for="txtCodigo" class="text-black-50">Código de Segurança</label>
                            </div>

                            <div class="form-floating">
                                <select id="selParcelas" class="form-select">
                                    <option value="1" selected>À vista</option>
                                    <option value="2">2 x sem juros</option>
                                    <option value="3">3 x sem juros</option>
                                    <option value="4">4 x sem juros</option>
                                    <option value="5">5 x sem juros</option>
                                    <option value="6">6 x sem juros</option>
                                </select>
                                <label for="selParcelas" class="text-black-50">Parcelamento</label>
                            </div>
                        </form>

                    </label>
                </div>

                <div class="mb-4 mx-2 flex-even">
                    
                    <label class="btn btn-outline-danger p-4 h-100 w-100" for="end">
                        
                        <h3>
                            <b class="text-dark">Endereço de entrega</b>
                        </h3>
                        <hr>
                            
                            <fieldset class="row">
                                <div class="form-group col-12 ">
                                    <label for="textEndereco">Endereço:</label>
                                    <input type="textEndereco" class="form-control" id="textEndereco" value="<?php echo $exibeuser['ds_endereco'];?>" name="textEndereco" required>
                                  </div>
                                  <div class="form-group col-sm-12 col-md-6">
                                    <label for="cep">CEP:</label>
                                    <input type="cep" class="form-control" id="cep" value="<?php echo $exibeuser['no_cep'];?>"  name="cep" required>
                                  </div>
                                  <div class="col-sm-12 col-md-6">
                                  <label for="cpf">CPF:</label>
                                    <input type="cpf" class="form-control" id="cpf" value="<?php echo $exibeuser['no_cpf'];?>"  name="CPF" required>
                                  </div>
                            </fieldset>
                                            
                                                       
                          


                    </label>
                </div>
                

            </div>

            <div class="text-end border border-top-0 rounded-bottom p-4 pb-0">

                <a href ="../compracertatest2/finalizacao.php? cd= <?php echo $ticket; ?>">
                <button class="btn btn-danger btn-submit  btn-lg ms-2 mb-4">Finalizar</button>
                </a>
            
            </div>
        </div>
    </div>


</main>
<?php include 'footer.php' ?>
</body>
</html>
