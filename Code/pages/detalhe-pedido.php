<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php');
    include_once('get-desc.php');
    include_once('open-database.php');

    $id = $_GET["Id"];
    ?>
</head>

<body>
    <header id="header">
        <a class="logo">Detalhes do pedido <?php echo $id; ?>:</a>
    </header>

    <table>
        <?php
            echo"
            <thead>
                <tr>";
                    $con = openDB();

                    // Query que seleciona os detalhes dos pratos do pedido
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
                            LEFT JOIN tbl_produto e ON e.pro_id = a.pro_id
                            WHERE
                                a.ped_id = $id";

                    $result1 = mysqli_query($con, $sql);

                    echo "<td></td>";
                    $cont = 0;

                    while($pratos = mysqli_fetch_array($result1)){
                        $cont++;
                        echo "<td>Prato $cont</td>";
                    }
                    echo"
                </tr>
            </thead>
            <tbody>";

                // Linha Massa
                echo "<tr>";
                    echo "<td>Massa</td>";

                    $result1 = mysqli_query($con, $sql);

                    while($pratos = mysqli_fetch_array($result1)){
                        echo "<td>$pratos[2]</td>";
                    }
                echo "</tr>";

                //Query que seleciona a descricao dos ingredientes dos pratos
                $sql2 = "SELECT
                            a.ing_descricao,
                            b.ipe_id
                        FROM
                            tbl_ingredientes a
                        LEFT JOIN tbl_itens_pedido_ingredientes b ON b.ing_id = a.ing_id
                        LEFT JOIN tbl_itens_pedido c ON c.ipe_id = b.ipe_id
                        WHERE c.ped_id = $id";

                $result1 = mysqli_query($con, $sql);

                $ings = 0;
                $desc[$ings] = "";

                while($pratos = mysqli_fetch_array($result1)){
                    $result2 = mysqli_query($con, $sql2);

                    //Loop que verifica os ingredientes para cada prato
                    while($ing = mysqli_fetch_array($result2)){
                        $index = $ing[0].$pratos[0];

                        //Caso o array com o index criado ainda não exista é passado zero
                        if(empty($ar[$index])){
                            $ar[$index] = 0;
                        }

                        //Executa caso o ingrediente pertença ao prato
                        if($ing[1] == $pratos[0]){
                            //Adiciona um a quantidade do ingrediente no prato
                            $ar[$index] += 1;

                            //Executa caso o tipo de ingrediente ainda não tenha aparecido
                            if(!in_array($ing[0],$desc)){
                                $ings += 1;

                                //Adiciona o tipo para a lista que será impressa na tabela
                                $desc[$ings] = $ing[0];
                            }
                        }
                    }
                }

                // Linhas Ingredientes
                // Loop que executa para cada ingrediente diferente nos pratos
                for($cont = 1; $cont <= $ings; $cont++){
                    $result1 = mysqli_query($con, $sql);

                    echo "<tr>";
                        echo "<td>$desc[$cont]</td>";
                        
                        while($pratos = mysqli_fetch_array($result1)){
                            $index = $desc[$cont].$pratos[0];
                            echo "<td>{$ar[$index]}</td>";
                        }
                    echo "</tr>";
                }

                // Linha Modo de Preparo
                echo "<tr>";
                    echo "<td>Modo de Preparo</td>";

                    $result1 = mysqli_query($con, $sql);

                    while($pratos = mysqli_fetch_array($result1)){
                        echo "<td>$pratos[3]</td>";
                    }
                echo "</tr>";

                // Linha Molho
                echo "<tr>";
                    echo "<td>Molho</td>";

                    $result1 = mysqli_query($con, $sql);

                    while($pratos = mysqli_fetch_array($result1)){
                        echo "<td>$pratos[4]</td>";
                    }
                echo "</tr>";
                echo"
            </tbody>";
        ?>
    </table>

    <img src="../img/PagkainLogo.PNG" alt="" class="left"/>

    <!-- Footer -->
    <footer id="footer">
        <!-- Botão de retorno -->
        <nav class="right">
            <a href="lista-ped-novo.php">
                <button class="button submit">
                    Voltar
                </button>
            </a>
        </nav>
    </footer>   
</body>