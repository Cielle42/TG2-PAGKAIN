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
        <a class="logo">Escolha o Sabor da Lasanha:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>
    
    <section id="banner">
        <!-- Lasanha de Presunto e Queijo -->
        <a href="pingredientes.php?Massa=3&Modo_Preparo=&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Presunto e Queijo</strong>
            </button>
        </a>

        <!-- Lasanha de Carne -->
        <a href="pingredientes.php?Massa=4&Modo_Preparo=&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Carne</strong>
            </button>
        </a>

        <!-- Lasanha Quatro Queijos -->
        <a href="pingredientes.php?Massa=5&Modo_Preparo=&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Quatro Queijos</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>