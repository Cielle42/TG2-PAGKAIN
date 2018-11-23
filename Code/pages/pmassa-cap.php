<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include_once('header.php');
    
    $sessao = $_GET["Sessao"];
    
    // Inicializa a sessão
    session_start();
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Escolha o Sabor do Capeletti:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>

    <section id="banner">
        <!-- Capeletti de Carne -->
        <a href="pmodo-inicial.php?Massa=1&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Carne</strong>
            </button>
        </a>

        <!-- Capeletti de Queijo -->
        <a href="pmodo-inicial.php?Massa=2&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Queijo</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>