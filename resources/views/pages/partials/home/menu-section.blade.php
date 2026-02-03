<!-- Sezione Menu -->
<section class="menu-section">
  <div class="container">
    <div class="menu-header text-center reveal">
      <span class="menu-eyebrow">Menu</span>
      <h2 class="menu-title">Il nostro menù</h2>
      <p class="menu-lead">Scopri i nostri piatti deliziosi e genuini.</p>
    </div>

    <div class="row g-4 justify-content-center">
      <div class="col-12 col-md-6 col-lg-4 reveal reveal-delay-1">
        <article class="menu-card">
          <div class="menu-card-media">
            <img src={{ asset('img/card_piatti/antipasto.webp') }}
              alt="Antipasto di tagliere di salumi e formaggi misti"
              loading="lazy">
            <span class="menu-card-tag">Antipasto</span>
          </div>
          <div class="menu-card-body">
            <h3 class="menu-card-title">Tagliere salumi e formaggi</h3>
            <p class="menu-card-text">
              Un assortimento di salumi e formaggi, con verdure grigliate e miele.
            </p>
          </div>
        </article>
      </div>

      <div class="col-12 col-md-6 col-lg-4 reveal reveal-delay-2">
        <article class="menu-card">
          <div class="menu-card-media">
            <img src={{ asset('img/card_piatti/primo.webp') }}
              alt="Calamarata pesto di zucchine, mazzancolle sgusciate e calamaretti"
              loading="lazy">
            <span class="menu-card-tag">Primo</span>
          </div>
          <div class="menu-card-body">
            <h3 class="menu-card-title">Mezzi paccheri al pesto di zucchine</h3>
            <p class="menu-card-text">
              Pasta fresca con pesto di zucchine, calamari freschi e mazzancolle.
            </p>
          </div>
        </article>
      </div>

      <div class="col-12 col-md-6 col-lg-4 reveal reveal-delay-3">
        <article class="menu-card">
          <div class="menu-card-media">
            <img src={{ asset('img/card_piatti/secondo.webp') }}
              alt="Grigliata mista di pesce e crostacei locali"
              loading="lazy">
            <span class="menu-card-tag">Secondo</span>
          </div>
          <div class="menu-card-body">
            <h3 class="menu-card-title">Grigliata mista di pesce</h3>
            <p class="menu-card-text">
              Grigliata mista di pesce e crostacei locali secondo disponibilità.
            </p>
          </div>
        </article>
      </div>
    </div>

    <div class="text-center reveal reveal-delay-2">
      <a class="btn btn-hero-primary menu-cta" href="/menu">Vedi il menù completo</a>
    </div>
  </div>
</section>
