<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
     <link rel="icon" href={{ asset('img/favicon/favicon.ico') }} type="image/x-icon">
    <link rel="icon" href={{ asset('img/favicon/favicon-16x16.png') }} sizes="16x16"
      type="image/png">
    <link rel="icon" href={{ asset('img/favicon/favicon-32x32.png') }} sizes="32x32"
      type="image/png">
    <link rel="icon" href={{ asset('img/favicon/favicon.ico')}} sizes="48x48"
      type="image/x-icon">
    <link rel="icon" href={{ asset('img/favicon/favicon.ico')}} sizes="96x96"
      type="image/x-icon">
    <link rel="apple-touch-icon" sizes="57x57"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="60x60"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="72x72"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="76x76"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="114x114"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="120x120"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="144x144"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="152x152"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <link rel="apple-touch-icon" sizes="180x180"
      href={{ asset('img/favicon/apple-touch-icon.png')}}>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
      content={{ asset('img/favicon/mstile-150x150.png')}}>
    <link rel="icon" sizes="192x192"
      href={{ asset('img/favicon/android-chrome-192x192.png')}}>
    <link rel="icon" sizes="512x512"
      href={{ asset('img/favicon/android-chrome-512x512.png')}}>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    @vite('resources/css/errors.css')
  </head>
  <body>
    <div class="error-shell">
      <div class="error-card">
        <div class="error-eyebrow">Don Magnifico</div>
        <div class="error-code">@yield('code')</div>
        <h1 class="error-title">@yield('message')</h1>
        <p class="error-description">@yield('description')</p>
        <div class="error-actions">
          <a class="error-btn primary" href="@yield('action_url', url('/'))">
            @yield('action_label', 'Torna alla home')
          </a>
          @hasSection('secondary_url')
            <a class="error-btn secondary" href="@yield('secondary_url')">
              @yield('secondary_label')
            </a>
          @endif
        </div>
      </div>
    </div>
  </body>
</html>
