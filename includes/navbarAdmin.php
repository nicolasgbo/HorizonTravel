<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- NAVBAR ADMIN -->
<nav class="navbar <?= isset($navbarClass) ? $navbarClass : 'navbar-padrao' ?> navbar-expand-lg fixed-top py-0" style="height: 85px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/HorizonTravel/pages/indexAdmin.php">
            <img src="/HorizonTravel/img/logoHorizontravel.svg" alt="Página Inicial" style="width: 75px">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavBar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavBar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="/HorizonTravel/pages/indexAdmin.php">Início</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="/HorizonTravel/pages/gerenciarPasseios.php">Gerenciar Passeios</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="/HorizonTravel/controllers/logout.php">Sair</a>
                </li>
                <li class="nav-item mx-2 d-flex align-items-center">
                    <span class="navbar-text fw-bold" style="color: #004aad;">
                        <?php if (isset($_SESSION['nomeUsuario'])): ?>
                            Olá, Administrador <?= htmlspecialchars($_SESSION['nomeUsuario']) ?>
                        <?php endif; ?>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>