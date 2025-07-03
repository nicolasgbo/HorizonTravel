<?php
session_start();  // Inicia a sessão para poder usar $_SESSION

// Inicializa o array de erros vazio
$erro = [];

// Se existir erros salvos na sessão, pega eles e remove da sessão para não repetir
if (isset($_SESSION['erros'])) {
    $erro = $_SESSION['erros'];
    unset($_SESSION['erros']);
}

$navbarClass = 'navbar-padrao';
include_once '../config/config.php';
include_once INCLUDE_PATH . '/header.php';
?>

<!--Incluindo a validação de JavaScript-->
<script src="../js/validarRegistro.js" defer></script>


<body class="pagina-comum">
  <section class="min-vh-100 card-autenticacao d-flex align-items-center justify-content-center">
    <div class="container py-5">
    <!--Exibindo as mensagens de erro feita por validações no Back-end-->
    <?php if (!empty($erro)): ?> <!--Se a variável erro estiver diferente de vazio, vai exibir os erros-->
        <div class="alert alert-danger">
            <ul>
                <!--Itera no array de erro e procura todas as mensagens de erro-->
                <?php foreach ($erro as $msg): ?>
                    <!--htmlspecialchars transforma caracteres especiais em HTML-->
                    <li><?= htmlspecialchars($msg) ?></li>
                <!--Finalizando a iteração-->
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-lg" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h2 class="fw-bold mb-2 text-uppercase text-primary">Registre-se</h2>
              <p class="mb-4">Por favor, preencha os campos para registrar-se!</p>

              <form id="formRegistrar" method="POST" action="../controllers/registrar.php"> 
                <div class="form-outline mb-3 text-start">
                  <label class="form-label" for="nomeUsuario">Nome Completo</label>
                  <input type="text" id="nomeUsuario" name="nomeUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-3 text-start">
                  <label class="form-label" for="dataNascimentoUsuario">Data de Nascimento</label>
                  <input type="date" id="dataNascimentoUsuario" name="dataNascimentoUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-3 text-start">
                  <label class="form-label" for="telefoneUsuario">Telefone</label>
                  <input type="text" id="telefoneUsuario" name="telefoneUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-3 text-start">
                  <label class="form-label" for="emailUsuario">Email</label>
                  <input type="email" id="emailUsuario" name="emailUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-3 text-start">
                  <label class="form-label" for="senhaUsuario">Senha</label>
                  <input type="password" id="senhaUsuario" name="senhaUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-4 text-start">
                  <label class="form-label" for="confirmarSenhaUsuario">Confirmar Senha</label>
                  <input type="password" id="confirmarSenhaUsuario" name="confirmarSenhaUsuario" class="form-control form-control-lg" required />
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Registrar</button>
              </form>

              <div class="d-flex justify-content-center text-center mt-4">
                <a href="#!" class="text-primary mx-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-primary mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#!" class="text-primary mx-2"><i class="fab fa-google fa-lg"></i></a>
              </div>

              <p class="mt-4 mb-0">Já possui uma conta?
                <a href="/HorizonTravel/pages/Formlogin.php" class="fw-bold text-primary">Faça login</a>
              </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

<?php
include_once INCLUDE_PATH . '/footer.php';
?>
