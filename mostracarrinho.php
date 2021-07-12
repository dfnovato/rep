<main class="mb-5 pb-5 mb-md-0">
        <div class="container">
            <h1>Carrinho de Compras</h1>
           </div>
           </div>
           
            <?php
	
	$total = null; // variavel total que recebe valor nulo
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho']=array();
    }
    

    foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consulta = $cn->query("SELECT * FROM tbl_produto WHERE cd_produto='$cd'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    $produto = $exibe['ds_capa'];  // variável que recebe produto
    $preco = number_format(($exibe['vl_preco']),2,',','.'); // variável que recebe o preço
    $total += $exibe['vl_preco'] * $qnt; // variável que recebe preço * quantidade

    


    ?>
    <main class="">
    <div class="container">
                 <ul class="list-group">
                <li class="list-group-item py-3">
                    <div class="row g-3">
                        <div class="col-4 col-md-3 col-lg-2">
                            <a href="#">
                                <img src="img/<?php echo $exibe['nm_produto']; ?>" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                            <h4>
                                <b><a href="#" class="text-decoration-none text-danger">
                                <?php echo $produto; ?></a></b>
                            </h4>
                            <h5>
                               Melhor Produto para Voce
                            </h5>
                        </div>
                        <div
                            class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
                            <div class="input-group">
                            <a href="less.php?cd=<?php echo $cd;?>&qnt=<?php echo $qnt;?>"  class="btn btn-outline-dark btn-sm"> 
                               
                                    <i class="fas fa-angle-down" style="font-size: 16px; line-height: 28px;"></i>
                                </a>
                                <input type="text" class="form-control text-center border-dark" readonly="readonly" id="qtd" value="<?php echo $qnt; ?>">
                              <a href="plus.php?cd=<?php echo $cd;?>"  class="btn btn-outline-dark btn-sm" > 
                                    <i class="fas fa-angle-up" style="font-size: 16px; line-height: 28px;"></i>
                                </a>
                              
                                <a href ="removecarrinho.php?cd=<?php echo $cd;?>"class="btn btn-outline-danger border-dark btn-sm ">
                                <i class="far fa-trash-alt" style="font-size: 16px; line-height: 28px;"></i>
                                </a>
                            </div>
                            
                            <div class="text-end mt-2">
                                
                                <span class="text-dark">Valor unid: R$ <?php echo $preco; ?></span>
                            </div>
                        </div>
                    </div>
                    
                </li>
        </ul>

 </main>   
 </div>  
 <?php } ?>