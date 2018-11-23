<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php');

    $sessao = $_GET["Sessao"];
    
    // Inicializa a sessão    
    session_start();

    $_SESSION['massa'][$sessao] = $_GET["Massa"];
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Escolha o Modo de Preparo:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>

    <section id="banner">
        <a href="pmodo-refogado.php?Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Refogado</strong>
            </button>
        </a>

        <!-- Gratinado -->
        <a href="pingredientes.php?Massa=<?php echo $_SESSION['massa'][$sessao]; ?>&Modo_Preparo=3&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Gratinado</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>