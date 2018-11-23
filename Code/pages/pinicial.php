<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    include_once('header.php');
    
    // Inicializa a sessão
    $sessao = 0;
    ?>
</head>
<body onclick='window.location.href="pmassa-inicial.php?Sessao=<?php echo $sessao; ?>"' class="background">

    <img src="../img/Logo.png" alt=""/><br/><br/>
    Clique na tela <br/>para efetuar seu pedido<br/><br/><br/>

    <img src="../img/TopRight.png" alt="" class="topR"/>
    <img src="../img/BottomLeft.png" alt="" class="topL"/>
</body>
</html>