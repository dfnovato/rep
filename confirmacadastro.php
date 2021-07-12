<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompraCerta::Pagina Tal</title>
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
?>

<?php include 'nav.php' ?>

    <main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            <h1>Parabens cadastro confirmado</h1>
            <hr>
            <p>
                Parabens
            </p>
            <p>

                Obrigado por se cadastrar conosco, pague mais caro em todas as frutas por estar comprando no nosso mercado online e não em uma feira, provalvelmente ninguem vai ler essa mensagem, então 
                estou escrevendo qualquer coisa. Então nossa loja agradece por sua preferencia. Sabemos que mesmo em um site de verdade ninguem lê essa mensagem imagina em um trabalho de faculdade, onde os
                alunos estão ocupados com seus proprios trabalhos. Toda noite eu penso porque não fiz psicologia, Agradecemos sempre pela compra e preferencia.

            </p>
            <a href="./login.php" class="btn btn-danger">voltar a pagina de login</a>




           
        </div>
        </div>



    </main>
    <?php include 'footer.php' ?>
</body>

</html>