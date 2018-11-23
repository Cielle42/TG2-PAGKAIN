<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    // Inicializa a sessão
    $sessao = 0;
    ?>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/pagkain.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Pagkain</title>
</head>
<body>
    <header id="header">
        <a class="logo">Quem utilizará este dispositivo?</a>
    </header>

    <section id="banner">
        
        <!-- Botão que leva a parte do cliente -->
        <a href="pages/pinicial.php">
            <button class="button">
                <strong>Cliente</strong>
            </button>
        </a>

        <!-- Botão que leva a parte do cozinheiro -->
        <a href="pages/lista-ped-novo.php">
            <button class="button">
                <strong>Cozinheiro</strong>
            </button>
        </a>

        <!-- Botão que leva a parte do caixa -->
        <a href="pages/lista-pedidos.php">
            <button class="button">
                <strong>Caixa</strong>
            </button>
        </a>
    </section>

    <img src="img/PagkainLogo.PNG" alt="" class="left"/>
</body>
</html>