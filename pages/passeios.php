<?php
include_once '../config/config.php';
include_once '../config/db.php';
include_once INCLUDE_PATH . '/header.php';

//Montando a query para exibir todos os passeios no banco de dados
$query = "SELECT * FROM passeios ORDER BY id DESC";
//Executando a query para mostrar os resultados obtidos da query
$resultado = mysqli_query($conn, $query);
?>

<body class="pagina-comum">
    <div class="container galerias-destinos py-5 text-center">

        <!--Itera sobre todos os passeios com base no resultado da consulta-->
        <?php while ($passeio = mysqli_fetch_assoc($resultado)): ?>
            <h2 class="titulo-destino mb-2"><?= htmlspecialchars($passeio['nome']) ?></h2>
            <p class="descricao-destino mb-4">
                <!--n12br mantém as quebras de linha-->
                <?= nl2br(htmlspecialchars($passeio['descricao'])) ?>
            </p>
            <div class="row g-4 justify-content-center mb-4">
                <div class="col-md-4">
                    <div class="card card-imagem">
                        <img src="/HorizonTravel/<?= htmlspecialchars($passeio['imagem1']) ?>" class="card-img-top" alt="Imagem 1 de <?= htmlspecialchars($passeio['nome']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-imagem">
                        <img src="/HorizonTravel/<?= htmlspecialchars($passeio['imagem2']) ?>" class="card-img-top" alt="Imagem 2 de <?= htmlspecialchars($passeio['nome']) ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-imagem">
                        <img src="/HorizonTravel/<?= htmlspecialchars($passeio['imagem3']) ?>" class="card-img-top" alt="Imagem 3 de <?= htmlspecialchars($passeio['nome']) ?>">
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <a href="/HorizonTravel/pages/planos.php" class="btn btn-primary" style="background-color: #004aad !important;">Escolha seu plano</a>
            </div>
        <?php endwhile; ?><!--Finaliza o while-->
        <!--Se não tiver nenhum passeio cadastrado exibe uma mensagem-->
        <?php if (mysqli_num_rows($resultado) === 0): ?>
            <p class="text-muted">Nenhum passeio cadastrado ainda.</p>
        <?php endif; ?>
    </div>
</body>

<?php
include_once INCLUDE_PATH . '/footer.php';
mysqli_close($conn); //Fecha a conexão com o bd
?>
