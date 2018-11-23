<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
    <?php include_once('open-database.php'); ?>
</head>

<body>
    <header id="header">
        <a class="logo">Listagem dos pedidos:</a>
    </header>

    <table>
        <thead>
            <tr>
                <td style = "width: 50px">Prato</td>
                <td style = "width: 100px">Pedido</td>
                <td style = "width: 150px">Massa</td>
                <td style = "width: 120px">Modo de preparo</td>
                <td style = "width: 100px">Molho</td>
                <td style = "width: 100px">Produto</td>
                <td style = "width: 100px">Qtd produto</td>
            </tr>
        </thead>
        <tbody >
            <?php
                $con = openDB();

                // Cria a sentença SQL para buscar os pedidos
                $sql = "SELECT
                            a.ipe_id, a.ped_id, 
                            b.mas_descricao, 
                            c.mpr_descricao, 
                            d.mol_descricao, 
                            e.pro_descricao, 
                            a.ipe_qtd_produto
                        FROM
                            tbl_itens_pedido a
                        LEFT JOIN tbl_massa b ON b.mas_id = a.mas_id
                        LEFT JOIN tbl_modo_preparo c ON c.mpr_id = a.mpr_id
                        LEFT JOIN tbl_molho d ON d.mol_id = a.mol_id
                        LEFT JOIN tbl_produto e ON e.pro_id = a.pro_id";
                $result = mysqli_query($con, $sql);

                // Loop que cria a tabela com os dados do banco
                while($row = mysqli_fetch_array($result)){
                    echo"
                    <tr>
                        <td>Prato $row[0]</td>
                        <td>Pedido $row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                    </tr>
                    ";
                }
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