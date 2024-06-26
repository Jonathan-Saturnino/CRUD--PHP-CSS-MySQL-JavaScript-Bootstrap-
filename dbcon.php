<?php

// Estabelece uma conexão com o banco de dados MySQL usando a função mysqli_connect().
$con = mysqli_connect("localhost", "root", "", "paper-crud-php-bootstrap");

// Verifica se a conexão foi bem-sucedida.
if(!$con){
    // Se a conexão falhar, a função mysqli_connect_error() retorna uma descrição do erro.
    // A função die() encerra o script e exibe uma mensagem de erro.
    die('Connection Failed'. mysqli_connect_error());
}

?>
