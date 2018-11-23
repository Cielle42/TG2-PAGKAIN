<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
    <?php include_once('open-database.php'); ?>
</head>

<body>
    <header id="header">
        <a class="logo">Selecione um pedido:</a>
    </header>

    <table>
        <tbody>
            <?php
                $con = openDB();

                // Cria a sentença SQL para buscar os pedidos
                $sql = "SELECT 
                            a.ped_id
                        FROM
                            tbl_pedido a";
                
                $result = mysqli_query($con, $sql);

                // Loop que cria um botão para cada id de pedido encontrado
                while($row = mysqli_fetch_array($result)){
                    echo"
                    <tr>
                        <td class=\"coluna\">
                            <a href=\"detalhe-pedido.php?Id=$row[0]\">
                                <button class=\"button mini\">
                                    <strong>Pedido $row[0]</strong>
                                </button>
                            </a>
                        </td>
                    </tr>
                    ";
                }

                // Fecha a conexão com o banco
                mysqli_close($con);
            ?>
        </tbody>
    </table>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>

    <!-- Footer -->
    <footer id="footer">
        <!-- Botão de retorno -->
        <nav class="right">
            <a href="../index.php">
                <button class="button submit">
                    Voltar ao menu
                </button>
            </a>
        </nav>
    </footer>
</body>
</html>