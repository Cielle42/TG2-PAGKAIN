<?php

include_once('header.php');
include_once('open-database.php');
include_once('exc-pedido.php');

$sessao = $_GET["Sessao"];

// Variável com a quantidade de tipos de produtos diferentes no pedido
$qtd    = $_GET["Quant"];

// Inicializa a sessão
session_start();

$con = openDB();

// Cria a sentença SQL para inserir o pedido
$sql = "INSERT INTO tbl_pedido (ped_data)
        VALUES (current_timestamp())";

// Envia o insert para o banco de dados
mysqli_query($con, $sql);

// Cria a sentença SQL para resgatar o id do (último) pedido inserido
$sql = "SELECT 
            a.ped_id
        FROM
            tbl_pedido a
        ORDER BY a.ped_id DESC
        LIMIT 1";

// Envia o insert para o banco de dados
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

// Loop que executa para cada prato no pedido
for($cont = 1; $cont <= $sessao; $cont++){
    $qtd--;

    // Executa caso ainda existam produtos para serem inseridos com os pratos
    if($qtd >= 0){

        // Loop que executa para cada possível ingrediente
        for($cont2 = 0; $cont2 < 4; $cont2++){

            // Executa caso o contador do for evidencie um produto que esteja relacionado ao prato
            if(!empty($_SESSION['prod'.$cont][$cont2])){
                $prod = $cont2 + 1;

                // Executa caso a massa do prato seja Lasanha
                if($_SESSION['massa'][$cont] == 3||$_SESSION['massa'][$cont] == 4||$_SESSION['massa'][$cont] == 5){
                    // Cria a sentença SQL para inserir os dados do pedido
                    $sql = "INSERT INTO tbl_itens_pedido (ped_id, mas_id, mol_id, pro_id, ipe_qtd_produto)
                            VALUES (\"$row[0]\", \"{$_SESSION['massa'][$cont]}\", \"{$_SESSION['molho'][$cont]}\",
                                    \"$prod\", \"{$_SESSION['prod'.$cont][$cont2]}\");";

                    // Envia o insert para o banco de dados
                    mysqli_query($con, $sql);
                }else{
                    // Cria a sentença SQL para inserir os dados do pedido
                    $sql = "INSERT INTO tbl_itens_pedido (ped_id, mas_id, mpr_id, mol_id, pro_id, ipe_qtd_produto)
                            VALUES (\"$row[0]\", \"{$_SESSION['massa'][$cont]}\", \"{$_SESSION['modo_preparo'][$cont]}\", 
                                    \"{$_SESSION['molho'][$cont]}\", \"$prod\", \"{$_SESSION['prod'.$cont][$cont2]}\");";

                    // Envia o insert para o banco de dados
                    mysqli_query($con, $sql);
                }
            }
        }
    // Queries que incluem um prato sem produto
    }else{
        // Executa caso a massa do prato seja Lasanha
        if($_SESSION['massa'][$cont] == 3||$_SESSION['massa'][$cont] == 4||$_SESSION['massa'][$cont] == 5){
            // Cria a sentença SQL para inserir os dados do pedido
            $sql = "INSERT INTO tbl_itens_pedido (ped_id, mas_id, mol_id)
                    VALUES (\"$row[0]\", \"{$_SESSION['massa'][$cont]}\", \"{$_SESSION['molho'][$cont]}\");";

            // Envia o insert para o banco de dados
            mysqli_query($con, $sql);
        }else{
            // Cria a sentença SQL para inserir os dados do pedido
            $sql = "INSERT INTO tbl_itens_pedido (ped_id, mas_id, mpr_id, mol_id)
                    VALUES (\"$row[0]\", \"{$_SESSION['massa'][$cont]}\", 
                            \"{$_SESSION['modo_preparo'][$cont]}\", \"{$_SESSION['molho'][$cont]}\");";

            // Envia o insert para o banco de dados
            mysqli_query($con, $sql);
        }
    }
}

// Cria a sentença SQL para resgatar o id dos pratos inseridos
$sql = "SELECT 
            a.ipe_id
        FROM
            tbl_itens_pedido a
        ORDER BY a.ipe_id DESC
        LIMIT $sessao";

// Envia o insert para o banco de dados
$result = mysqli_query($con, $sql);
$index = 0;

// Loop que armazena os ids dos pratos em um array
while($row = mysqli_fetch_array($result)){
    $array[$index] = $row[0];
    $index++;
}

// Loop para inserir os ingredientes referentes aos pedidos adicionados
for($cont = 1; $cont <= $sessao; $cont++){
    $index--;

    // Loop que verifica o preenchimento de cada ingrediente
    for($cont2 = 0; $cont2<10; $cont2++){
        // Loop que executa quando o ingrediente foi selecionado
        for($qtd = $_SESSION['ing'.$cont][$cont2]; $qtd>0; $qtd--){
            $cont2++;
            
            // Cria a sentença SQL para inserir um ingrediente do pedido
            $sql = "INSERT INTO tbl_itens_pedido_ingredientes (ing_id, ipe_id)
                    VALUES (\"$cont2\", \"$array[$index]\")";

            $cont2--;

            // Envia o insert para o banco de dados
            mysqli_query($con, $sql);
        }
    }
}

// Verifica se existem mais de três pedidos e exclui o mais antigo em caso positivo
exclude();

// Aborta a sessão
session_destroy();

// Fecha a conexão com o banco
mysqli_close($con);

echo "
<html>
    <head>
        <META http-equiv=\"refresh\" content=\"1;URL=http://localhost/Code/pages/pfim.php\">
    </head>
</html>";

?>