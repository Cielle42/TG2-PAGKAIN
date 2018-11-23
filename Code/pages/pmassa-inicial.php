<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php');

    $sessao = $_GET["Sessao"];
    $sessao++;

    
    // Inicializa a sessão
    session_start();

    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Escolha a Massa:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>
    
    <section id="banner">
        <a href="pmassa-cap.php?Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Capeletti</strong>
            </button>
        </a>

        <a href="pmassa-las.php?Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Lasanha</strong>
            </button>
        </a>

        <!-- Penne -->
        <a href="pmodo-inicial.php?Massa=6&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Penne</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>