<?php
function exclude(){
    include_once('open-database.php');

    $con = openDB();

    // Cria a sentença SQL para contar os pedidos
    $sql = "SELECT 
                COUNT(a.ped_id)
            FROM
                tbl_pedido a";

    // Envia o select para o banco de dados
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    // Executa se houver mais de 3 pedidos
    if($row[0] > 3){
        // Cria a sentença SQL para selecionar o pedido mais antigo
        $sql = "SELECT 
                    a.ped_id
                FROM
                    tbl_pedido a
                ORDER BY a.ped_id ASC
                LIMIT 1";

        // Envia o select para o banco de dados
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        // Cria a sentença SQL para selecionar os pratos do pedido selecionado
        $sql = "SELECT 
                    a.ipe_id
                FROM
                    tbl_itens_pedido a
                WHERE
                    a.ped_id = $row[0]";

        // Envia o select para o banco de dados
        $result = mysqli_query($con, $sql);

        // Loop que executa para cada prato do pedido
        while($row2 = mysqli_fetch_array($result)){
            // Cria a sentença SQl para deletar os ingredientes do pedido
            $sql = "DELETE FROM tbl_itens_pedido_ingredientes
                    WHERE ipe_id = \"$row2[0]\";";

            // Envia o delete para o banco de dados
            mysqli_query($con, $sql);
        }

        // Cria a sentença SQL para deletar os itens do pedido
        $sql = "DELETE FROM tbl_itens_pedido
                WHERE ped_id = \"$row[0]\";";

        // Envia o delete para o banco de dados
        mysqli_query($con, $sql);

        // Cria a sentença SQL para deletar o pedido
        $sql = "DELETE FROM tbl_pedido
                WHERE ped_id = \"$row[0]\";";

        // Envia o delete para o banco de dados
        mysqli_query($con, $sql);
    }
}
?>