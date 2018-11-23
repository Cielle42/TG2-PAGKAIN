<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php'); 

    $sessao = $_GET["Sessao"];

    // Inicializa a sessão
    session_start();
    
    $_SESSION['molho'][$sessao] = $_GET["Molho"];
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Deseja montar outro prato?</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>
    
    <section id="banner">
        <!-- Adiciona mais um prato ao pedido -->
        <a href="pmassa-inicial.php?Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Montar outro prato</strong>
            </button>
        </a>

        <!-- Continua para os Produtos -->
        <a href="produto.php?Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Continuar</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>