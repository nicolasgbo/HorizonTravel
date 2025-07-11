<?php
session_start(); //Iniciando sessão
ob_start();
include_once '../config/db.php';
include_once '../config/config.php';
include_once '../includes/header.php';
include_once '../includes/navbarAdmin.php';

//Verificação para conferir se o admin está logado
if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'admin') {
    header("Location: ../pages/formLogin.php");
    exit;
}

//Variáveis criadas para salvar as imagens
$diretorio = '../img/';
$erroUpload = false;

//Fazendo a função para salvar imagem recebendo os parametros $arquivo e $campo
function salvarImagem($arquivo, $campo){
    //global para dizer que usamos variáveis fora da função
    global $erroUpload, $diretorio;

    //Verificando se o arquivo não está com erro ou vazio
    if ($arquivo['error'] !== 0 || $arquivo['size'] == 0){
        echo "<div class='alert alert-warning'>Erro ao enviar a imagem $campo</div>";
        $erroUpload = true;
        return null; //para a execução
    }

    //Verificando se o arquivo não ultrapassa o limite definido
    if ($arquivo['size'] > 5 * 1024 * 1024) {
        echo "<div class='alert alert-warning'>A imagem $campo ultrapassa 5MB!</div>";
        $erroUpload = true;
        return null; //para a execução
    }

    //Busca o arquivo pelo nome e usa o pathinfo para verificar a extensão do arquivo
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    //verifica se as extensões passadas estão dentro do escopo definido, se não tiver, lança erro
    if (!in_array($extensao, ['jpg', 'jpeg', 'png', 'webp', 'svg'])){
        echo "<div class='alert alert-warning'>Formato inválido para $campo</div>";
        $erroUpload = true;
        return null; //para a execução
    }
    
    //Definindo os nomes unicos pra evitar sobrescrição com uniqid, definindo o nome final
    $nomeUnico = uniqid($campo . '_') . '.' . $extensao;
    //Definindo onde vai ser salvo o arquivo
    $caminhoFinal = $diretorio . $nomeUnico;

    //Usa a função move_uploaded_file para mover o arquivo para o diretório img
    if (!move_uploaded_file($arquivo['tmp_name'], $caminhoFinal)) {
        echo "<div class='alert alert-warning'>Erro ao mover a imagem $campo</div>";
        $erroUpload = true;
        return null;
    }

    //Retorna tudo finalizado
    return 'img/' . $nomeUnico;
}

/*Adicionando passeio ao banco de dados
Verificando se o metodo de requisição foi o POST e se o campo adicionar foi clicado*/
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["adicionar"])) {
    //Pega os valores enviados e usa o trim para remover espaços vazios
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);

    //Usa a função criada acima salvarImagem para organizar os arquivo para enviar ao banco de dados
    $imagem1 = salvarImagem($_FILES['imagem1'], 'imagem1');
    $imagem2 = salvarImagem($_FILES['imagem2'], 'imagem2');
    $imagem3 = salvarImagem($_FILES['imagem3'], 'imagem3');
    
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

/*Adicionando passeio ao banco de dados
Verificando se o metodo de requisição foi o POST e se o campo editar foi clicado*/
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar"])) {
    //Pega o id do passeio usa intval() para tornar inteiro afim de evitar SQL Injection
    $idPasseio = intval($_POST['idPasseio']);
    //Usa o trim para remover os espaços vazios
    $nome = trim($_POST['nome']);
    $descricao = trim($_POST['descricao']);

    //Verificando se as imagens foram enviadadas
    $imagem1 = !empty($_FILES['imagem1']['name']) ? salvarImagem($_FILES['imagem1'], 'imagem1') : null;
    $imagem2 = !empty($_FILES['imagem2']['name']) ? salvarImagem($_FILES['imagem2'], 'imagem2') : null;
    $imagem3 = !empty($_FILES['imagem3']['name']) ? salvarImagem($_FILES['imagem3'], 'imagem3') : null;

    //Verifica se as variaveis estão preenchidas
    if ($nome && $descricao) {
        //mysqli_real_escape_string() evita sql injection
        $nome = mysqli_real_escape_string($conn, $nome);
        $descricao = mysqli_real_escape_string($conn, $descricao);

        //Montando dinamicamente a query de update
        $updates = [];
        $updates[] = "nome = '$nome'";
        $updates[] = "descricao = '$descricao'";
        //com o update criado, fica disponivel a atualização das imagens
        if ($imagem1) $updates[] = "imagem1 = '" . mysqli_real_escape_string($conn, $imagem1) . "'";
        if ($imagem2) $updates[] = "imagem2 = '" . mysqli_real_escape_string($conn, $imagem2) . "'";
        if ($imagem3) $updates[] = "imagem3 = '" . mysqli_real_escape_string($conn, $imagem3) . "'";

        //Montando a query para fazer o update. impolde() junta os itens do arra com vírgulas
        $queryUpdate = "UPDATE passeios SET " . implode(', ', $updates) . " WHERE id = $idPasseio";
        //Executando a query
        mysqli_query($conn, $queryUpdate);

        //Redireciona pra evitar reenvio do form
        $_SESSION['mensagem'] = "Passeio alterado com sucesso!";
        header("Location: gerenciarPasseios.php");
        exit;
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

//variável para guardar os dados do passeio que serão editados
$passeioEditando = null;

//Verifica se foi passado via GET (url) o parametrô editar
if (isset($_GET['editar'])) {
    //Converte o valor do 'editar' usado intval() transformando em inteiro para evitar SQL Injection
    $idEditar = intval($_GET['editar']);
    //Montando e executando a query para buscar o id do passeio
    $resultado = mysqli_query($conn, "SELECT * FROM passeios WHERE id = $idEditar");
    //Verifica se o resultado da consulta teve retorno maior que 0 
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        //O resultado encontrado é armazenado
        $passeioEditando = mysqli_fetch_assoc($resultado);
    }
}

//Montando a query para exibir os passeios existentes
$passeios = "SELECT * FROM passeios ORDER BY id DESC";
//Executando a query
$resultados = mysqli_query($conn, $passeios);

?>

<body class="pagina-comum py-5" style="padding-top: 100px !important; background-color: #f9f9f9;">
    <div class="container">
        <?php if (isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensagem']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
            <?php unset($_SESSION['mensagem']); ?>
        <?php endif; ?>
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #004aad !important;">Gerenciar Passeios</h2>
            <p class="text-muted">Adicione novos passeios ao sistema</p>
        </div>

        <form method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm mb-5">
        <input type="hidden" name="<?= $passeioEditando ? 'editar' : 'adicionar' ?>" value="1" />
        <?php if ($passeioEditando): ?>
            <input type="hidden" name="idPasseio" value="<?= $passeioEditando['id'] ?>">
        <?php endif; ?>
            <div class="mb-3">
                <label class="form-label">Nome do passeio</label>
                <input type="text" class="form-control" name="nome" required value="<?= $passeioEditando ? htmlspecialchars($passeioEditando['nome']) : '' ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição do passeio</label>
                <textarea class="form-control" name="descricao" rows="3" required><?= $passeioEditando ? htmlspecialchars($passeioEditando['descricao']) : '' ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem 1</label>
                <input type="file" class="form-control" name="imagem1" accept="image/*" <?= $passeioEditando ? '' : 'required' ?> />
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem 2</label>
                <input type="file" class="form-control" name="imagem2" accept="image/*" <?= $passeioEditando ? '' : 'required' ?> />
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem 3</label>
                <input type="file" class="form-control" name="imagem3" accept="image/*" <?= $passeioEditando ? '' : 'required' ?> />
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4 rounded-3" style="background-color: #004aad; border: none;">
                    <?= $passeioEditando ? 'Atualizar Passeio' : 'Adicionar Passeio' ?>
                </button>
            </div>
        </form>

        <h3 class="mb-3">Passeios Cadastrados</h3>
        <ul class="list-group mb-5">
            <?php while ($p = mysqli_fetch_assoc($resultados)): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-medium"><?= htmlspecialchars($p['nome']) ?></span>
                    <div class="d-flex gap-2">
                        <a href="?editar=<?= $p['id'] ?>" class="btn btn-outline-warning btn-sm">
                            Editar
                        </a>
                        <a href="?excluir=<?= $p['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este passeio?')">
                            Excluir
                        </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <?php include_once INCLUDE_PATH . '/footerAdmin.php'; ?>
</body>

<?php mysqli_close($conn); ob_end_flush();?>