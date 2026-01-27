<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
      content="Don Magnifico è un ristorante-pizzeria situato a Vasto, Chieti, con un ambiente familiare. Specializzato in piatti di pesce e pizze, offre anche piatti tipici vastesi e abruzzesi con prodotti locali. Adatto a famiglie, giovani, cene di lavoro e cene di fine scuola.">
    <meta name="keywords"
      content="ristorante, Don Magnifico, Vasto, Chieti, cucina italiana, piatti di pesce, pizze, piatti tipici, prodotti locali, ristorante familiare, cene di lavoro, cene di fine scuola, ristorante stagionale">
    <meta name="author" content="RC Digital Solution">
    <meta name="robots" content="index, follow">
    <title>Don Magnifico</title>
    <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon-16x16.png" sizes="16x16"
      type="image/png">
    <link rel="icon" href="img/favicon/favicon-32x32.png" sizes="32x32"
      type="image/png">
    <link rel="icon" href="img/favicon/favicon.ico" sizes="48x48"
      type="image/x-icon">
    <link rel="icon" href="img/favicon/favicon.ico" sizes="96x96"
      type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="60x60"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="114x114"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="120x120"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="144x144"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="152x152"
      href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="180x180"
      href="img/favicon/apple-touch-icon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
      content="img/favicon/mstile-150x150.png">
    <link rel="icon" sizes="192x192"
      href="img/favicon/android-chrome-192x192.png">
    <link rel="icon" sizes="512x512"
      href="img/favicon/android-chrome-512x512.png">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap"
      rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />   
    <link rel="preload" href="img/carosel/pedane.webp" as="image">
    @stack('style')
  </head>
  <body>
    @include('components.navbar')
    <main>
      @yield('content')
    </main>
    @include('components.footer')
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script>AOS.init();</script>
    @stack('script')
  </body>
  </html