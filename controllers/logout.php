<?php
session_start(); //Iniciando sessão
session_unset(); //limpando as variáveis da sessão
session_destroy(); //destruindo a sessão
header("Location: /HorizonTravel/index.php"); //Redirecionando para o index.php
exit;
?>