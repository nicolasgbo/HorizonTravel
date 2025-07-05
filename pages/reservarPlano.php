<?php
session_start(); //Iniciando sessão
include_once "../config/db.php";
include_once '../config/config.php';
include_once '../includes/header.php';

//Verifica se o usuário está logado
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../pages/formLogin.php");
    exit;
}

//Guarda o id do usuário em uma variável
$idUsuario = $_SESSION['idUsuario'];

//Montando e executando a query de planos
$planos = mysqli_query($conn, "SELECT * FROM planos");
?>

<body class="pagina-comum">
    <div class="container container-reserva">
        <h2>Escolha um plano para reservar</h2>
        <form id="formReserva">
            <select name="idPlano" required>
                <!--Usa o while e o mysqli_fetch_assoc pra iterar sobre os resultados da consulta-->
                <?php while ($plano = mysqli_fetch_assoc($planos)): ?>
                    <!--Exibe pelo id do plano-->
                    <option value="<?= $plano['idPlano'] ?>">
                        <?= $plano['nomePlano'] ?> - R$<?= $plano['precoPlano'] ?>
                    </option>
                <?php endwhile; ?> <!--Encerra o while-->
            </select>
            <button type="submit" class="btn-primary">Reservar</button>
        </form>

        <div id="mensagem"></div>

        <!--Script para consumir a API criada para os pagamentos-->
        <script>
            //captura o envio do formulario 
            $("#formReserva").on("submit", function (e) {
                e.preventDefault(); //Evita o evento padrão do navegador
                //cria uma variavel para guardar o valor do plano
                const idPlano = $("select[name='idPlano']").val();

                //Chama API de pagamento fake
                $.getJSON("../api/apiPagamento.php", function (resposta) {
                    if (resposta.status === "aprovado") {
                        //Se aprovado salva no banco de dados
                        $.post("../controllers/salvarReserva.php", { //Passa o resultado para o salvarReserva.php
                            idPlano: idPlano
                        }, function (sucesso) {
                            $("#mensagem").html("<p style='color:green'>" + resposta.mensagem + "</p>");
                        });
                    } else {
                        //Se o pagamento der errado, vai exibir uma mensagem
                        $("#mensagem").html("<p style='color:red'>" + resposta.mensagem + "</p>");
                    }
                });
            });
        </script>
    </div>
    <?php include_once INCLUDE_PATH . '/footer.php'; ?>
</body>