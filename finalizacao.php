<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fechamento pedido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
$consulta = $cn->query('select*from vw_produto');
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);

$rast=$_GET['cd'];

?>

<?php include 'nav.php' ?>

    <main class="mb-5 pb-5 mb-md-0">
        <div class="container text-center">
            <h1>Obrigado!</h1>
            <hr>
            <h3>Anote o Codigo de seu pedido:</h3>
            <h2 class="text-danger"><b><?php echo $rast; ?></b></h2>
            <p>Em até 2 horas, seu pedido será entregue. Qualquer dúvida sobre este pedido, entre em contato conosco e informe o Codigo do pedido para que possamos te ajudar.</p>
            <p>Tenha um  dia certeiro!</p>
            <p>
                Atenciosamente,<br>
                CompraCerta 
            </p>
            <p>
                <a href="../compracertatest2/index.php" class="btn btn-danger btn-lg">Voltar à Página Principal</a>
            </p>
        </div>


    </main>
    <?php include 'footer.php' ?>
</body>

</html>