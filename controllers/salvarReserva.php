<?php
session_start(); //Inicia sessão
include_once "../config/db.php";

//Verifica se o usuário ta logado
if (!isset($_SESSION['idUsuario'])) {
    http_response_code(401); //Define o código HTTP 401: não autorizado
    exit;
}

//Pega os valores das variáveis, id do usuario, plano escolhido, etc.
$idUsuario = $_SESSION['idUsuario'];
$idPlano = $_POST['idPlano'];
$dataReserva = date('Y-m-d H:i:s');
$statusReserva = 'confirmada'; //Define que a reserva foi confirmada pq o pagamento ja foi aprovado

//Prepara a query para inserir os dados no banco de dados
$query = "INSERT INTO reservas (idUsuario, idPlano, dataReserva, statusReserva) 
          VALUES (?, ?, ?, ?)";


//Prepara a query para ser executada
$queryReserva = mysqli_prepare($conn, $query);
//inserindo os valores reais recebidos nas variaveis
mysqli_stmt_bind_param($queryReserva, "iiss", $idUsuario, $idPlano, $dataReserva, $statusReserva);
//executando a query 
mysqli_stmt_execute($queryReserva);
//fecha a query
mysqli_stmt_close($queryReserva);
?>