<?php
$navbarClass = 'navbar-padrao';
include_once '../config/config.php';
include_once INCLUDE_PATH . '/header.php';
?>

<body class="pagina-comum">
  <section class="min-vh-100 card-autenticacao d-flex align-items-center justify-content-center">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-lg" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h2 class="fw-bold mb-3 text-uppercase text-primary">Login</h2>
              <p class="mb-4">Por favor, insira seu e-mail e senha para continuar</p>

              <form method="POST" action="../controllers/login.php">
                <div class="form-outline mb-4 text-start">
                  <label class="form-label" for="emailUsuario">Email</label>
                  <input type="email" id="emailUsuario" name="emailUsuario" class="form-control form-control-lg" required />
                </div>

                <div class="form-outline mb-4 text-start">
                  <label class="form-label" for="senhaUsuario">Senha</label>
                  <input type="password" id="senhaUsuario" name="senhaUsuario" class="form-control form-control-lg" required />
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Entrar</button>
              </form>

              <div class="d-flex justify-content-center text-center mt-4">
                <a href="#!" class="text-primary mx-2"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-primary mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#!" class="text-primary mx-2"><i class="fab fa-google fa-lg"></i></a>
              </div>

              <p class="mt-4 mb-0">Ainda não tem sua conta?
                <a href="/HorizonTravel/pages/formRegistrar.php" class="fw-bold text-primary">Registre-se</a>
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
