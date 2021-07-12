<nav class="navbar navbar-expand-lg navbar-dark bg-danger border-botton shadow-sm mb-3">

        <div class="container">
            <a class="navbar-brand" href="../CompraCertatest2/index.php"><strong>CompraCerta</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a href="../CompraCertatest2/index.php" class="nav-link text-white">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a href="../CompraCertatest2/Produtos.php" class="nav-link text-white">Produto</a>
                    </li>
                    <li class="nav-item">
                        <a href="./minhacontacliente_dados.php" class="nav-link text-white">Dados e Localização</a>
                    </li>
                </ul>
    
            </div>
        <div class="aligh-self-end">
            <ul class="navbar-nav">
            <?php if(empty($_SESSION['ID'] )) { ?>
                <li class="nav-item">
                    <a href="../CompraCertatest2/Cadastro.php" class="nav-link text-white">Cadastre-se Aqui</a>
                </li>
                <li class="nav-item">
                    <a href="../CompraCertatest2/login.php" class="nav-link text-white"><i class="fas fa-sign-in-alt"> Entrar</i></a>
                </li>
                <?php } else {
                if($_SESSION['status'] == 0 ){

                $consulta_usuario =$cn->query("select nm_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]' ");
                $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>
                <li class="nav-item">
                    <a href="sair.php" class="nav-link text-white  "> <span class="fas fa-sign-out-alt"> <?php echo ucwords ($exibe_usuario ['nm_usuario']); ?></a>
                </li>                
                
                <li class="nav-item">
                <a href="../CompraCertatest2/carrinho.php" class="nav-link text-white"><span class="fas fa-shopping-cart"> ::carrinho</span></a>
                </li>
                <?php }else {?>
                <?php
                $consulta_usuario =$cn->query("select nm_usuario from tbl_usuario where cd_usuario = '$_SESSION[ID]' ");
                $exibe_usuario = $consulta_usuario->fetch(PDO::FETCH_ASSOC);
                ?>   
                    <li class="nav-item">
                    <a href="sair.php" class="nav-link text-white  "> <span class="fas fa-sign-out-alt"> <?php echo ucwords ($exibe_usuario ['nm_usuario']); ?></a>
                </li>                
                
                <li class="nav-item">
                <a href="../CompraCertatest2/carrinho.php" class="nav-link text-white"><span class="fas fa-shopping-cart"> ::carrinho</span></a>
                </li>

                <li class="nav-item">
                    <a href="adm_inserir.php" class="nav-link text-white  "> <span class="fas fa-cog"></a>
                </li>    
                
                <?php } }?>

            </ul>
    
        </div>
        </div>    
        </div>
    </nav>