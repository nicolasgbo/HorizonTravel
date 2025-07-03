<?php
session_start();
include_once '../config/db.php';
include_once '../config/config.php';
include_once '../includes/header.php';
include_once '../includes/navbarAdmin.php';

if (!isset($_SESSION['tipoUsuario']) || $_SESSION['tipoUsuario'] !== 'admin') {
    header("Location: ../formLogin.php");
    exit;
}

$resultado = mysqli_query($conn, "SELECT COUNT(*) AS total FROM usuarios");
$totalUsuarios = mysqli_fetch_assoc($resultado)['total'];
?>

<body class="pagina-comum" style="padding-top: 100px;">
    <div class="container pt-5 pb-5">
        <div class="text-center mb-4">
            <h5 class="fw-light">Bem-vindo ao</h5>
            <h2 class="fw-bold" style="color: #004aad;">Painel Administrativo</h2>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title text-muted mb-2">Usuários Cadastrados</h5>
                        <p class="display-4 fw-bold" style="color: #004aad;"><?= $totalUsuarios ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="gerenciarPasseios.php" class="btn btn-primary btn-lg px-4 py-2 rounded-pill" style="background-color: #004aad; border: none;">
                Gerenciar Passeios
            </a>
        </div>
    </div>

    <?php include_once INCLUDE_PATH . '/footerAdmin.php'; ?>
</body>

<?php mysqli_close($conn); ?>
