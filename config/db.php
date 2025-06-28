<?php
    $host = "localhost"; //Servidor do Banco de dados
    $user = "root"; //Usuário do Banco de dados
    $senhaDB = ""; //Senha do banco de dados
    $database = "horizon_travel"; //Nome do Banco de dados

    //Função para estabelecer a comunicação com o Banco de dados
    $conn = mysqli_connect($host, $user, $senhaDB, $database);

    //Caso der erro de conexão com o banco de dados, lançar erro
    if(!$conn) {
        echo 
        "<p>Erro ao Tentar conectar a base de dados <strong>$database</strong>!</p>";
    }
?>