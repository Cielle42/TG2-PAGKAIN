<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php');
    
    $sessao = $_GET["Sessao"];
    $qtd    = $_GET["Quant"];
    
    // Inicializa a sessão
    session_start();
    ?>
</head>

<body>
	<header id="header">
        <a class="logo">Forma de Pagamento:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
	</header>

	<section id="banner">
        <!--Pagamento via cartão-->
        <a href="insere-pedido.php?Sessao=<?php echo $sessao; ?>&Quant=<?php echo $qtd; ?>">
            <button class="button">
                <strong>Cartão</strong>
            </button>
        </a>

        <!--Pagamento via dinheiro-->
        <a href="insere-pedido.php?Sessao=<?php echo $sessao; ?>&Quant=<?php echo $qtd; ?>">
            <button class="button">
                <strong>Dinheiro</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>