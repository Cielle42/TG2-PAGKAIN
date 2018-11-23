<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php'); 

    $sessao = $_GET["Sessao"];
    
    // Inicializa a sessão
    session_start();
    
    // Recebe os dados formulário dos ingredientes
    $_SESSION['ing'.$sessao][0] = $_GET["Bacon"];
    $_SESSION['ing'.$sessao][1] = $_GET["Queijo_Min"];
    $_SESSION['ing'.$sessao][2] = $_GET["Queijo_Par"];
    $_SESSION['ing'.$sessao][3] = $_GET["Ovo_Cod"];
    $_SESSION['ing'.$sessao][4] = $_GET["Alho_Poro"];
    $_SESSION['ing'.$sessao][5] = $_GET["Presunto"];
    $_SESSION['ing'.$sessao][6] = $_GET["Peito_Peru"];
    $_SESSION['ing'.$sessao][7] = $_GET["Frango"];
    $_SESSION['ing'.$sessao][8] = $_GET["Tomate_Cer"];
    $_SESSION['ing'.$sessao][9] = $_GET["Camarao"];
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Escolha o Molho:</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
    </header>
    
    <section id="banner">
        <!-- Branco -->
        <a href="pedido-volta.php?Molho=1&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Branco</strong>
            </button>
        </a>

        <!-- Bolonhesa -->
        <a href="pedido-volta.php?Molho=2&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Bolonhesa</strong>
            </button>
        </a>

        <!-- Rose -->
        <a href="pedido-volta.php?Molho=3&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Rose</strong>
            </button>
        </a>

        <!-- Ao Sugo -->
        <a href="pedido-volta.php?Molho=4&Sessao=<?php echo $sessao; ?>">
            <button class="button">
                <strong>Ao Sugo</strong>
            </button>
        </a>
    </section>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>