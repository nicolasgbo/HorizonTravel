<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Travel</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--Inserindo o CSS no arquivo-->
    <link href="/HorizonTravel/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!--Logo whatsapp (FONT AWESOME)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--CDN de icons do Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR INÍCIO -->
    <nav class="navbar <?= isset($navbarClass) ? $navbarClass : 'navbar-padrao' ?> navbar-expand-lg fixed-top py-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="/HorizonTravel/index.php">
                <img src="/HorizonTravel/img/logoHorizontravel.svg" alt="Página Inicial" style="width: 75px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavBar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavBar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HorizonTravel/index.php">Início</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HorizonTravel/pages/passeios.php">Passeios</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HorizonTravel/pages/planos.php">Planos</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/HorizonTravel/pages/login.php">Login</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="btn custom-whatsapp-btn" href="https://wa.me/seu_numero" target="_blank">
                            <i class="fab fa-whatsapp"></i> Enviar mensagem
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR FIM -->
</body>
