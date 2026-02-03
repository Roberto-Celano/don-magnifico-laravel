<section class="hero" aria-labelledby="hero-title">
  <div class="hero-media">
    <picture>
      <source media="(max-width: 767.98px)" srcset={{ asset('img/hero/heromobile.webp') }}>
      <img
        src={{ asset('img/hero/hero.webp') }}
        alt="Terrazza del ristorante Don Magnifico con vista mare"
        loading="eager"
        decoding="async"
        fetchpriority="high">
    </picture>
  </div>

  <div class="container hero-content">
    <span class="hero-eyebrow hero-anim hero-anim-left hero-delay-1">Ristorante · Pizzeria</span>
    <h1 class="hero-title hero-anim hero-anim-right hero-delay-2" id="hero-title">Sapori di mare,<br> tradizione abruzzese</h1>
    <blockquote class="hero-quote hero-anim hero-anim-left hero-delay-3">
      “Uno non può pensare bene, amare bene, dormire bene, se non ha mangiato bene.”
    </blockquote>
    <div class="hero-author hero-anim hero-anim-right hero-delay-4">— Virginia Woolf</div>

    <div class="hero-actions hero-anim hero-anim-left hero-delay-5">
      <a class="btn btn-hero-primary" href="/menu">Scopri il menu</a>
      <a class="btn btn-hero-outline" href="/#contatti">Prenota un tavolo</a>
    </div>
  </div>
</section>