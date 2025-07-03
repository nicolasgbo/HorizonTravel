<?php
session_start(); //Iniciando sessão
include "../config/db.php"; //Incluindo arquivo de conexão com o BD

$erro = []; //variável para armazenar erros

//Verificando o método de requisição do servidor
if($_SERVER["REQUEST_METHOD"] === "POST"){
    //Garante que se não existir, atribua uma string vazia
    $emailUsuario = trim($_POST['emailUsuario'] ?? '');
    $senhaUsuario = $_POST['senhaUsuario'] ?? '';

    //Validando se os campos estão vazios
    if($emailUsuario === '' || $senhaUsuario === ''){
        $erro[] = "Preencha todos os campos!";
    }

    //Se não tiver erro, vai buscar o banco de dados
    if (empty($erro)){
        //Preparando a query para fazer a busca
        $query = $conn->prepare("SELECT idUsuario, nomeUsuario, emailUsuario, senhaUsuario, tipoUsuario FROM usuarios WHERE emailUsuario = ?");
        //Passando os dados de forma segura
        $query->bind_param("s", $emailUsuario);
        $query->execute();//Executando a query
        //Retorna o resultado
        $resultado = $query->get_result();

        if($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            //Verifica a senha digitada com a senha inserida no banco
            if(password_verify($senhaUsuario, $usuario['senhaUsuario'])){
                //Login validando, define as variáveis da sessão
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
                $_SESSION['emailUsuario'] = $usuario['emailUsuario'];
                $_SESSION['tipoUsuario'] = $usuario['tipoUsuario'];

                //Redireciona para o indexAdmin se for admin, se não para o index normalmente
                if ($usuario['tipoUsuario'] === 'admin'){
                    header("Location: ../pages/indexAdmin.php");
                } else {
                    header("Location: ../index.php");
                    exit;
                }
            } else {
                $erro[] = "E-mail ou senha inválidos!";
            }
        } else {
            $erro[] = "E-mail ou senha inválidos!";
        }

        $query->close(); //Encerra a query
    }

    //Se tiver erros, salva na sessão e redireciona para o form novamente
    if (!empty($erro)) {
        $_SESSION['erros'] = $erro;
        header("Location: ../pages/formLogin.php");
    }

}
?>