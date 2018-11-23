<?php

/* 
    Código utilizado inicialmente para testes de inserção de dados no banco e de sessão
*/

include_once('header.php');
include_once('open-database.php');
include_once('exc-pedido.php');

// Inicializa a sessão
session_start();
$_SESSION['ids'] = 1;
session_id("ped".$_SESSION['ids']);

// Recebe os dados do formulário
$_SESSION['massa']        = $_POST["Massa"];
$_SESSION['modo_preparo'] = $_POST["Modo_Preparo"];
$_SESSION['molho']        = $_POST["Molho"];
$_SESSION['ing'][0]       = $_POST["Bacon"];
$_SESSION['ing'][1]       = $_POST["Queijo_Min"];
$_SESSION['ing'][2]       = $_POST["Queijo_Par"];
$_SESSION['ing'][3]       = $_POST["Ovo_Cod"];
$_SESSION['ing'][4]       = $_POST["Alho_Poro"];
$_SESSION['ing'][5]       = $_POST["Presunto"];
$_SESSION['ing'][6]       = $_POST["Peito_Peru"];
$_SESSION['ing'][7]       = $_POST["Frango"];
$_SESSION['ing'][8]       = $_POST["Tomate_Cer"];
$_SESSION['ing'][9]       = $_POST["Camarao"];
$_SESSION['produto']      = $_POST["Produto"];
$_SESSION['qtd_prod']     = $_POST["Qtd_Produto"];

// Para uso futuro
//if(session_id() == "ped".$_SESSION['ids']){

$erros = "";
if(is_null($_SESSION['massa']) && is_null($_SESSION['modo_preparo']) && is_null($_SESSION['molho']) && is_null($_SESSION['produto'])){
    $erros .= "Nenhum pedido foi feito. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:8088/CodeTG/Code/index.php\">
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
} else {
    $con = openDB();

    // Cria a sentença SQL para inserir o pedido
    $sql = "INSERT INTO tbl_pedido (ped_data)
            VALUES (current_timestamp())";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

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

    // Cria a sentença SQL para inserir os dados do pedido
    $sql = "INSERT INTO tbl_itens_pedido (ped_id, mas_id, mpr_id, mol_id, pro_id, ipe_qtd_produto)
            VALUES (\"$row[0]\", \"{$_SESSION['massa']}\", \"{$_SESSION['modo_preparo']}\", 
                    \"{$_SESSION['molho']}\", \"{$_SESSION['produto']}\", \"{$_SESSION['qtd_prod']}\");";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    // Cria a sentença SQL para resgatar o id do pedido inserido
    $sql = "SELECT 
                a.ipe_id
            FROM
                tbl_itens_pedido a
            ORDER BY a.ipe_id DESC
            LIMIT 1";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    // for que verifica o preenchimento de cada ingrediente
    for($cont = 0; $cont<10; $cont++){
        // for que executa quando o ingrediente foi selecionado
        for($qtd = $_SESSION['ing'][$cont]; $qtd>0; $qtd--){
            $cont++;
            
            // Cria a sentença SQL para inserir um ingrediente do pedido
            $sql = "INSERT INTO tbl_itens_pedido_ingredientes (ing_id, ipe_id)
                    VALUES (\"$cont\", \"$row[0]\")";

            $cont--;

            // Envia o insert para o banco de dados
            $result = mysqli_query($con, $sql);
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
            <META http-equiv=\"refresh\" content=\"1;URL=http://localhost/CodeTG/Code/pages/lista-pedidos.php\">
        </head>
    </html>";
}
?>