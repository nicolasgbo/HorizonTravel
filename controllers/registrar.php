<?php 
session_start();
//Definindo as variáveis
$nomeUsuario = $dataNascimentoUsuario = $telefoneUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";
$erro = []; //Variável para declarar erros


//Verificando o método de requisição do servidor
if($_SERVER["REQUEST_METHOD"] === "POST"){
    //Verifica se o campo não existe e com trim() tira espaços em branco e se após o trim() seguir vazio, gera erro.
    if(!isset($_POST['nomeUsuario']) || trim($_POST['nomeUsuario']) === ''){
        $erro[] = "O campo nome é obrigatorio!";
    } else {
        //Se não tiver erro, armazena o valor.
        $nomeUsuario = trim($_POST['nomeUsuario']);
    }

    //Validando o campo data de nascimento
    if(!isset($_POST['dataNascimentoUsuario']) || trim($_POST['dataNascimentoUsuario']) === ''){
        $erro[] = "O campo data de nascimento é obrigatório!";
    } else {
        $dataNascimentoUsuario = trim($_POST['dataNascimentoUsuario']);
    }

    //Validando o campo de telefone
    if(!isset($_POST['telefoneUsuario']) || trim($_POST['telefoneUsuario']) === ''){
        $erro[] = "O campo telefone é obrigatório!";
    } else {
        $telefoneUsuario = trim($_POST['telefoneUsuario']);
    }

    //Validando o campo de email
    if(!isset($_POST['emailUsuario']) || trim($_POST['emailUsuario']) === ''){
        $erro[]= "O campo email é obrigatório!";
    } else {
        $emailUsuario = trim($_POST['emailUsuario']);
        //Utilizando uma função do PHP para validar o formato do email, caso negado o formato, lança erro.
        if(!filter_var($emailUsuario, FILTER_VALIDATE_EMAIL)){
            $erro[] = "O e-mail inserido não é válido!";
        }
    }

    //Validando o campo de senha do usuário
    if(!isset($_POST['senhaUsuario']) || trim($_POST['senhaUsuario']) === ''){
        $erro[] = "O campo de senha é obrigatório!";
    } else {
        $senhaUsuario = $_POST['senhaUsuario'];
        //Usando a função strlen que retorna o número de caracteres string
        if (strlen($senhaUsuario) < 6) {
            $erro[] = "A senha deve ter no mínimo 6 caracteres!";
        }
    }

    //Validando o campo de confirmação de senha do usuário
    if(!isset($_POST['confirmarSenhaUsuario']) || trim($_POST['confirmarSenhaUsuario']) === ''){
        $erro[] = "O campo confirmar senha é obrigatório!";
    } else {
        $confirmarSenhaUsuario = $_POST['confirmarSenhaUsuario'];
        //Se o campo senha não concidir com o campo confirmar senha, lançar erro
        if($senhaUsuario !== $confirmarSenhaUsuario){
            $erro[] = "As senhas não coincidem!";
        }
    }

    //Se não houver erros durante a validação, começa a inserção de dados
    if(empty($erro)){
        //Incluindo o arquivo de conexão com o Banco de dados
        include "../config/db.php";

        //Verificando se a conexão foi feita corretamente com o Banco de dados
        if($conn){
            // Verificando se o e-mail já existe
            $verificaQuery = $conn->prepare("SELECT idUsuario FROM usuarios WHERE emailUsuario = ?");
            $verificaQuery->bind_param("s", $emailUsuario);
            $verificaQuery->execute();
            $verificaQuery->store_result();

            if ($verificaQuery->num_rows > 0) {
                $erro[] = "Este e-mail já está cadastrado!";
                $_SESSION['erros'] = $erro;
                header("Location: ../pages/formRegistrar.php");
                exit;
            }

            $verificaQuery->close();
            
            //Preparando a hash da senha para inserir no banco de dados.
            $senhaComHash = password_hash($senhaUsuario, PASSWORD_DEFAULT);
            //Definindo por padrão que o tipo do usuário será cliente, só sera alterado para o tipo admin pelo BD
            $tipoUsuario = 'cliente';

            //Preparando a query para receber os valores, evitando SQL Injection
            $query = $conn->prepare("INSERT INTO usuarios (nomeUsuario, dataNascimentoUsuario, telefoneUsuario, emailUsuario, senhaUsuario, tipoUsuario) VALUES (?, ?, ?, ?, ?, ?)");

            //Passando os valores da query com segurança
            $query->bind_param("ssssss", $nomeUsuario, $dataNascimentoUsuario, $telefoneUsuario, $emailUsuario, $senhaComHash, $tipoUsuario);

            //Executando a query
            if($query->execute()) {
                header("Location: ../pages/sucesso.php");
                exit;
            } else { //Caso a execução da query falhe, lança erro
                $erro[] = "Erro ao cadastrar o usuário, tente mais tarde!";
            }

            $query->close(); //Fecha a query
            $conn->close(); //Fecha a conexão com o BD
        } else {
            $erro[] = "Erro na conexão com o banco de dados";
        }
    }
    // Se chegou aqui, tem erro(s) — salva na sessão e redireciona
    if (!empty($erro)) {
        $_SESSION['erros'] = $erro;
        header("Location: ../pages/formRegistrar.php");
        exit;
    }
    
}
?>