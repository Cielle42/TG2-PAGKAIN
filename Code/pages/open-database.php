<?php
function openDB(){
    // Parametriza a conexão com o banco de dados
    $host     = "localhost";
    $user     = "root";
    $password = "";
    $database = "pagkain";

    // Faz a conexão com o servidor MySQL
    $con = mysqli_connect($host, $user, $password);

    // Verifica se ocorreu erro de conexão
    if (!$con) {
        // Se sim, então encerra o programa com uma mensagem de erro                
        die("Erro de conexão com o servidor do BD (funcao)");
    }

    // Determina qual banco de dados que será utilizado
    $db = mysqli_select_db($con, $database);

    // Verifica se ocorreu erro na seleção
    if (!$db) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro ao selecionar o banco de dados.");
    }

    return $con;
}
?>