<?php
function getDesc($nomeDesc, $nomeTbl, $nomeId, $item){
    include_once('open-database.php');

    $con = openDB();

    // Cria a sentença SQL para buscar os pedidos
    $sql = "SELECT 
                a.$nomeDesc
            FROM
                $nomeTbl a
            WHERE
                a.$nomeId = $item";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

    mysqli_close($con);

    return $row[0];
}
?>