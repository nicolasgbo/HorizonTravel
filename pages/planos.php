<?php
// Inclui o config
include_once '../config/config.php';
// Inclui o header dinamicamente
include_once INCLUDE_PATH . '/header.php';
?>

<body class="pagina-comum">
    <div class="container planos-container text-center">
        <h5 class="text-uppercase text-muted">Siga com a Horizon Travel</h5>
        <h1 class="mb-5">Escolha um Plano</h1>
        <div class="row g-4 justify-content-center">

            <!-- Plano Bronze -->
            <div class="col-md-4">
                <div class="card card-plan">
                    <div class="card-header plano-bronze">
                        Plano Bronze
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">R$ 499</h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✓ Suporte básico</li>
                            <hr>
                            <li>✓ Acesso a ofertas nacionais</li>
                            <hr>
                            <li>✓ 1 viagem por ano</li>
                            <hr>
                            <li>✓ Check-in antecipado (quando disponível)</li>
                            <hr>
                            <li>✓ Parcelamento em até 3x sem juros</li>
                            <hr>
                        </ul>
                        <a href="/HorizonTravel/pages/reservarPlano.php" class="btn btn-selecionar">Selecionar</a>
                    </div>
                </div>
            </div>

            <!-- Plano Prata -->
            <div class="col-md-4">
                <div class="card card-plan">
                    <div class="card-header plano-prata">
                        Plano Prata
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">R$ 399</h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✓ Suporte intermediário</li>
                            <hr>
                            <li>✓ Ofertas nacionais e internacionais</li>
                            <hr>
                            <li>✓ 3 viagens por ano</li>
                            <hr>
                            <li>✓ Descontos em hotéis parceiros</li>
                            <hr>
                            <li>✓ Seguro viagem básico incluso</li>
                            <hr>
                            <li>✓ Parcelamento em até 6x sem juros</li>
                            <hr>
                        </ul>
                        <a href="/HorizonTravel/pages/reservarPlano.php" class="btn btn-selecionar">Selecionar</a>
                    </div>
                </div>
            </div>

            <!-- Plano Platina -->
            <div class="col-md-4">
                <div class="card card-plan border-primary">
                    <div class="card-header plano-platina">
                        Plano Platina
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">R$ 699</h2>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>✓ Suporte VIP 24h</li>
                            <hr>
                            <li>✓ Acesso a todos os destinos</li>
                            <hr>
                            <li>✓ Viagens ilimitadas no ano</li>
                            <hr>
                            <li>✓ Consultoria personalizada de roteiros</li>
                            <hr>
                            <li>✓ Sala VIP em aeroportos parceiros</li>
                            <hr>
                            <li>✓ Upgrade gratuito de categoria (quando disponível)</li>
                            <hr>
                            <li>✓ Seguro viagem premium incluso</li>
                            <hr>
                            <li>✓ Parcelamento em até 12x sem juros</li>
                            <hr>
                        </ul>
                        <a href="/HorizonTravel/pages/reservarPlano.php" class="btn btn-selecionar">Selecionar</a>
                    </div>
                </div>
            </div>

        </div> 
    </div> 

<?php
include_once INCLUDE_PATH . '/footer.php';
?>