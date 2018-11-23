<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php');
    include_once('get-desc.php');

    $sessao = $_GET["Sessao"];
    
    // Inicializa a sessão
    session_start();

    $refri     = $_GET["refri"];
    $agua      = $_GET["ag"];
    $suco      = $_GET["sc"];
    $sobremesa = $_GET["sbr"];

    // Desconsidera produtos que podem ter ficado registrados anteriormente na sessão
    for($cont = 1; $cont <= $sessao; $cont++){
        unset($_SESSION['prod'.$cont][0]);
        unset($_SESSION['prod'.$cont][1]);
        unset($_SESSION['prod'.$cont][2]);
        unset($_SESSION['prod'.$cont][3]);
    }

    $qtd = 0;

    // Loop que associa cada produto a um prato
    for($cont = 1; $cont <= $sessao; $cont++){
        if(!empty($refri)){
            $_SESSION['prod'.$cont][0] = $refri;
            unset($refri);
            $qtd++;
            continue;
        }
        if(!empty($agua)){
            $_SESSION['prod'.$cont][1] = $agua;
            unset($agua);
            $qtd++;
            continue;
        }
        if(!empty($suco)){
            $_SESSION['prod'.$cont][2] = $suco;
            unset($suco);
            $qtd++;
            continue;
        }
        if(!empty($sobremesa)){
            $_SESSION['prod'.$cont][3] = $sobremesa;
            unset($sobremesa);
            $qtd++;
            continue;
        }
    }
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Revisão do pedido:</a>
    </header>

    <article class="column left">
        <div>
            <table>
                <thead>
                    <tr>
                        <?php
                            for($cont = 0; $cont <= $sessao; $cont++){
                                if($cont == 0){
                                    echo "<td></td>";
                                }
                                else{
                                    echo "<td>Pedido $cont</td>";
                                }
                            }
                        ?>
                </thead>
                <tbody>
                    <?php
                        // Linha Massa
                        echo "<tr>";
                            for($cont2 = 0; $cont2 <= $sessao; $cont2++){
                                if($cont2 == 0){
                                    echo "<td>Massa</td>";
                                }
                                else{
                                    // Função que pega a descrição do id da massa relacionada ao prato
                                    $desc = getDesc("mas_descricao","tbl_massa","mas_id",$_SESSION['massa'][$cont2]);
                                    echo "<td>$desc</td>";
                                }
                            }
                        echo "</tr>";

                        // Linhas Ingredientes
                        // Loop que executa para cada ingrediente possível
                        for($cont = 0; $cont < 10; $cont++){
                            echo "<tr>";
                                for($cont2 = 0; $cont2 <= $sessao; $cont2++){
                                    if($cont2 == 0){
                                        $cont++;
                                        // Função que pega a descrição do id do ingrediente
                                        $desc = getDesc("ing_descricao","tbl_ingredientes","ing_id",$cont);
                                        echo "<td>$desc</td>";
                                        $cont--;
                                    }
                                    else{
                                        echo "<td>{$_SESSION['ing'.$cont2][$cont]}</td>";
                                    }
                                }
                            echo "</tr>";
                        }

                        // Linha Modo de Preparo
                        echo "<tr>";
                            for($cont2 = 0; $cont2 <= $sessao; $cont2++){
                                if($cont2 == 0){
                                    echo "<td>Modo de Preparo</td>";
                                }
                                else{
                                    echo "<td>";

                                    // Executa caso a massa do pedido não seja Lasanha
                                    if($_SESSION['massa'][$cont2] != 3&&$_SESSION['massa'][$cont2] != 4&&$_SESSION['massa'][$cont2] != 5){
                                        // Função que pega a descrição do id do modo de preparo relacionado ao prato
                                        $desc = getDesc("mpr_descricao","tbl_modo_preparo","mpr_id",$_SESSION['modo_preparo'][$cont2]);
                                        echo $desc;
                                    }
                                    echo "</td>";
                                }
                            }
                        echo "</tr>";

                        // Linha Molho
                        echo "<tr>";
                            for($cont2 = 0; $cont2 <= $sessao; $cont2++){
                                if($cont2 == 0){
                                    echo "<td>Molho</td>";
                                }
                                else{
                                    // Função que pega a descrição do id do molho relacionado ao prato
                                    $desc = getDesc("mol_descricao","tbl_molho","mol_id",$_SESSION['molho'][$cont2]);
                                    echo "<td>$desc</td>";
                                }
                            }
                        echo "</tr>";

                        // Linhas Produtos
                        // Loop que executa para cada produto possível
                        for($cont = 0; $cont < 4; $cont++){
                            echo "<tr>";
                                for($cont2 = 0; $cont2 <= $sessao; $cont2++){
                                    if($cont2 == 0){
                                        $cont++;
                                        // Função que pega a descrição do id do produto
                                        $desc = getDesc("pro_descricao","tbl_produto","pro_id",$cont);
                                        echo "<td>$desc</td>";
                                        $cont--;
                                    }
                                    else{
                                        echo"<td>";

                                        // Insere uma quantidade do produto do prato caso exista
                                        if(isset($_SESSION['prod'.$cont2][$cont])){
                                            echo "{$_SESSION['prod'.$cont2][$cont]}";
                                            echo"</td>";
                                            continue;
                                        }
                                        echo"</td>";
                                    }
                                }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </article>
    <nav class="column right">
        <br/>
        <!-- Adiciona mais um prato ao pedido -->
        <a href="select-pag.php?Sessao=<?php echo $sessao; ?>&Quant=<?php echo $qtd; ?>">
            <button class="button mini">
                <strong>Pagamento</strong>
            </button>
        </a>
        <br/><br/>

        <!-- Reinicia o pedido -->
        <a href="pmassa-inicial.php?Sessao=0">
            <button class="button mini">
                <strong>Reiniciar pedido</strong>
            </button>
        </a>
    </nav>
    
    <img src="../img/PagkainLogo.PNG" alt="" class="right"/>
</body>