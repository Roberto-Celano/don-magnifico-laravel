<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
      content="Don Magnifico è un ristorante-pizzeria situato a Vasto, Chieti, con un ambiente familiare. Specializzato in piatti di pesce e pizze, offre anche piatti tipici vastesi e abruzzesi con prodotti locali. Adatto a famiglie, giovani, cene di lavoro e cene di fine scuola.">
    <meta name="keywords"
      content="ristorante, Don Magnifico, Vasto, Chieti, cucina italiana, piatti di pesce, pizze, piatti tipici, prodotti locali, ristorante familiare, cene di lavoro, cene di fine scuola, ristorante stagionale">
    <meta name="author" content="Roberto Celano">
    <meta name="robots" content="index, follow">
    <title>@yield('title') - Don Magnifico</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon/favicon-16x16.png?v=1') }}" sizes="16x16"
      type="image/png">
    <link rel="icon" href="{{ asset('img/favicon/favicon-32x32.png?v=1') }}" sizes="32x32"
      type="image/png">
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico?v=1') }}" sizes="48x48"
      type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico?v=1') }}" sizes="96x96"
      type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="60x60"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="72x72"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="76x76"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="114x114"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="120x120"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="144x144"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="152x152"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <link rel="apple-touch-icon" sizes="180x180"
      href="{{ asset('img/favicon/apple-touch-icon.png?v=1') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
      content="{{ asset('img/favicon/mstile-150x150.png?v=1') }}">
    <link rel="icon" sizes="192x192"
      href="{{ asset('img/favicon/android-chrome-192x192.png?v=1') }}">
    <link rel="icon" sizes="512x512"
      href="{{ asset('img/favicon/android-chrome-512x512.png?v=1') }}">
    <!-- Bootstrap CSS is bundled via Vite -->
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap"
      rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preload" href={{ asset('img/carosello/pedane.webp') }} as="image">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')
  </head>
  <body>
    @include('components.navbarqr')
    <main>
      @yield('content')
    </main>
    @include('components.footerqr')
    
    <a href="#start" id="back-to-top" class="back-to-top" aria-label="Torna a inizio pagina">
      <i class="fas fa-chevron-up"></i>
    </a>
    @stack('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
      window.addEventListener('load', function () {
        if (window.AOS) {
          AOS.init();
        }
      });
    </script>
  </body>
</html>

