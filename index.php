<?php
$navbarClass = 'navbar-index';
// Inclui o config
include_once 'config/config.php';
// Inclui o header dinamicamente
include_once INCLUDE_PATH . '/header.php';
?>

<body class="pagina-index">
  <!--Criando um carrossel-->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!--Criando os indicadores/setas-->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!--Fazendo os slides de imagens-->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/hercilio_luz_florianopolis.webp" alt="Imagem base do site em Florianópolis" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="img/morro_das_pedras_florianopolis.webp" alt="Imagem base do site em Florianópolis"
          class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="img/pescadores_florianopolis.webp" alt="Imagem base do site em Florianópolis" class="d-block w-100">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!--Sessão de newsletter-->
  <section class="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="content">
            <form>
              <h2>Realize seus sonhos com a Horizon Travel!</i></h2>
              <div class="input-group">
                <input type="email" class="form-control" placeholder="Digite seu email">
                <span class="input-group-btn">
                  <button class="btn" type="submit">Inscreva-se <i class="bi bi-envelope"></i></button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Sessão de cards com fotos dos locais-->
  <section class="vantagens py-5">
    <div class="container text-center">
      <h5 class="text-uppercase text-muted">Descubra nossos destinos</h5>
      <h1 class="mb-5">Conheça os locais</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center text-center">
        <div class="col">
          <div class="card h-100 cards-index">
            <img class="card-img-top" src="img/morro_das_pedras_florianopolis.webp" alt="Imagem de Florianópolis - SC">
            <div class="card-body">
              <h4 class="card-title">Florianópolis - SC <i class="bi bi-geo-alt"></i></h4>
              <p class="card-text">“Descubra a magia da ilha que une natureza, cultura e encanto em cada canto.”</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100 cards-index">
            <img class="card-img-top" src="img/lencois.jpg" alt="Imagem de Lençois Maranhenses - MA">
            <div class="card-body">
              <h4 class="card-title">Lençois Maranhenses - MA <i class="bi bi-geo-alt"></i></h4>
              <p class="card-text">“Explore dunas douradas e lagoas azuis em um dos cenários mais surreais do mundo.”
              </p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100 cards-index">
            <img class="card-img-top" src="img/bonito.jpg" alt="Imagem de Bonito - MS">
            <div class="card-body">
              <h4 class="card-title">Bonito - MS <i class="bi bi-geo-alt"></i></h4>
              <p class="card-text">"Mergulhe nas águas cristalinas de Bonito e descubra um paraíso ecológico no coração
                do Brasil."</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!--Fazendo a sessão de imagens-->
  <section class="vantagens py-5">
    <div class="container text-center">
      <h5 class="text-uppercase text-muted">Aproveite as</h5>
      <h1 class="mb-5">Vantagens de viajar com a Horizon Travel</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-currency-exchange display-4 text-primary mb-3"></i>
              <h5 class="card-title">Preço Justo</h5>
              <p class="card-text">Ofertas imperdíveis com o melhor custo-benefício para o seu destino dos sonhos.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-shield-check display-4 text-primary mb-3"></i>
              <h5 class="card-title">Segurança Garantida</h5>
              <p class="card-text">Viaje com tranquilidade, sabendo que tudo está planejado com segurança e cuidado.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-headset display-4 text-primary mb-3"></i>
              <h5 class="card-title">Suporte 24h</h5>
              <p class="card-text">Nossa equipe está pronta para te atender em qualquer momento da sua jornada.</p>
            </div>
          </div>
        </div>

        <!-- Nova linha de vantagens -->
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-globe display-4 text-primary mb-3"></i>
              <h5 class="card-title">Destinos Incríveis</h5>
              <p class="card-text">Descubra lugares únicos e experiências inesquecíveis ao redor do Brasil e do mundo.
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-clock-history display-4 text-primary mb-3"></i>
              <h5 class="card-title">Agilidade nas Reservas</h5>
              <p class="card-text">Reservas rápidas e sem burocracia para você focar apenas em curtir a viagem.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <i class="bi bi-stars display-4 text-primary mb-3"></i>
              <h5 class="card-title">Experiência Personalizada</h5>
              <p class="card-text">Roteiros feitos sob medida, pensados para tornar sua viagem verdadeiramente única.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

<?php
// Inclui o footer dinamicamente
include_once INCLUDE_PATH . '/footer.php';
?>