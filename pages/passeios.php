<?php
// Inclui o config
include_once '../config/config.php';
// Inclui o header dinamicamente
include_once INCLUDE_PATH . '/header.php';
?>

<body class="pagina-comum">
    <div class="container galerias-destinos py-5 text-center">

        <!-- Florianópolis -->
        <h2 class="titulo-destino mb-2">Florianópolis - SC</h2>
        <p class="descricao-destino mb-4">
            Uma ilha encantadora com praias incríveis, dunas, trilhas e cultura açoriana vibrante.
        </p>
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/hercilio_luz_florianopolis.webp" class="card-img-top" alt="Ponte Hercilio Luz - Florianópolis">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/morro_das_pedras_florianopolis.webp" class="card-img-top" alt="Morro das Pedras - Florianópolis">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/pescadores_florianopolis.webp" class="card-img-top" alt="Pescadores Florianópolis">
                </div>
            </div>
        </div>
        <!-- Botão de plano -->
        <div class="mb-5">
            <a href="/HorizonTravel/pages/planos.php" class="btn btn-primary">Escolha seu plano</a>
        </div>

        <!-- Lençóis Maranhenses -->
        <h2 class="titulo-destino mb-2">Lençóis Maranhenses - MA</h2>
        <p class="descricao-destino mb-4">
            Dunas douradas e lagoas de águas cristalinas formam uma paisagem surreal no nordeste brasileiro.
        </p>
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/lencois.jpg" class="card-img-top" alt="Dunas dos Lençóis">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/lencois_maranhenses.jpg" class="card-img-top" alt="Lagoas cristalinas">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/pordosol_lencois.webp" class="card-img-top" alt="Pôr do sol nos Lençóis">
                </div>
            </div>
        </div>
        <!-- Botão de plano -->
        <div class="mb-5">
            <a href="/HorizonTravel/pages/planos.php" class="btn btn-primary">Escolha seu plano</a>
        </div>

        <!-- Bonito - MS -->
        <h2 class="titulo-destino mb-2">Bonito - MS</h2>
        <p class="descricao-destino mb-4">
            O paraíso do ecoturismo: rios transparentes, grutas e uma biodiversidade impressionante.
        </p>
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/bonito.jpg" class="card-img-top" alt="Rio cristalino em Bonito">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/grutaazul_bonito.png" class="card-img-top" alt="Gruta Azul">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-imagem">
                    <img src="../img/parque_bonito.png" class="card-img-top" alt="Trilhas ecológicas">
                </div>
            </div>
        </div>
        <!-- Botão de plano -->
        <div class="mb-5">
            <a href="/HorizonTravel/pages/planos.php" class="btn btn-primary">Escolha seu plano</a>
        </div>
    </div>
</body>

<?php
include_once INCLUDE_PATH . '/footer.php';
?>