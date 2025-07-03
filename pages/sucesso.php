<?php
$navbarClass = 'navbar-padrao';
include_once '../config/config.php';
include_once INCLUDE_PATH . '/header.php';
?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center shadow p-5 rounded-4" style="background-color: #f8f9fa; max-width: 500px;">
        <h2 class="mb-3" style="color: #004aad;">Cadastro realizado com sucesso!</h2>
        <p class="text-muted">Você será redirecionado para a página de login em instantes.</p>
        <div class="spinner-border text-primary mt-4" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </div>
</div>

<script>
    //Usando setTimeout para dar alguns segundos antes de retornar ao login
    setTimeout(() => {
        window.location.href = '../pages/formLogin.php';
    }, 5000); //Deixando 5 segundos antes de retornar ao login.php
</script>

<?php
include_once INCLUDE_PATH . '/footer.php';
?>

