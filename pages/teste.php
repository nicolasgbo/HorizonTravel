//Verificação para conferir se o admin está logado
if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'admin') {
    header("Location: ../pages/login.php");
    exit;
}

/*Adicionando passeio ao banco de dados
Verificando se o metodo de requisição foi o POST e se existe o campo adicionar no POST*/
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["adicionar"])) {
    //Pega os valores enviados e usa o trim para remover espaços vazios
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);
    $imagem1 = trim($_POST['imagem1']);
    $imagem2 = trim($_POST['imagem2']);
    $imagem3 = trim($_POST['imagem3']);

    if ($nome && $descricao && $imagem1 && $imagem2 && $imagem3) {
        //Protegendo contra SQL Injection usando mysqli_real_escape_string
        $nome = mysqli_real_escape_string($conn, $nome);
        $descricao = mysqli_real_escape_string($conn, $descricao);
        $imagem1 = mysqli_real_escape_string($conn, $imagem1);
        $imagem2 = mysqli_real_escape_string($conn, $imagem2);
        $imagem3 = mysqli_real_escape_string($conn, $imagem3);

        //Montando a query para enviar ao BD
        $query = "INSERT INTO passeios (nome, descricao, imagem1, imagem2, imagem3) VALUES ('$nome', '$descricao', '$imagem1', '$imagem2', '$imagem3')";
        //Conectando ao banco e enviando a query
        mysqli_query($conn, $query);
    }
}
/*Adicionando a função de fazer a exclusão de um passeio no BD.
Veririfica se foi passado o parâmetro excluir na URL, dizendo que o admin apertou em excluir*/
if (isset($_GET['excluir'])) {
    //pega o valor do parâmetro e converte em numero int afim de evitar SQL Injection
    $idPasseio = intval($_GET['excluir']);
    //Cria a query com o Id do passeio passado na variavel idPasseio
    $query = "DELETE FROM passeios WHERE id = $idPasseio";
    //Executa a query de deletar passeio
    mysqli_query($conn, $query);
}

//Montando a query para exibir os passeios existentes
$passeios = "SELECT * FROM passeios ORDER BY id DESC";
//Executando a query
$resultados = mysqli_query($conn, $passeios);