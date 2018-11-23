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
        <a class="logo">Escolha o Modo de Preparo (Refogado):</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>

    <section id="banner">
        <!--Refogado Azeite-->
        <a href="pingredientes.php?Massa=<?php echo $_SESSION['massa'][$sessao]; ?>&Modo_Preparo=1&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Azeite</strong>
            </button>
        </a>

        <!--Refogado Manteiga-->
        <a href="pingredientes.php?Massa=<?php echo $_SESSION['massa'][$sessao]; ?>&Modo_Preparo=2&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Manteiga</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>