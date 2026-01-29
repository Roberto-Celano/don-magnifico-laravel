@extends('layouts.public')
@section('content')
@section('title', 'Home')  
      @include('pages.partials.home.hero')
      @include('pages.partials.home.chi-siamo')
      @include('pages.partials.home.menu-section')
        @include('pages.partials.home.recensioni') 
        @include('pages.partials.home.contact') 
  

  



          <!-- Collegamento agli script -->
          
          <script>
    window.addEventListener("load", function(){
      window.cookieconsent.initialise({
        "type":"opt-in",
        "palette": {
          "popup": {
            "background": "#FFFFFF",
            "color": "#6b0008"
          },
          "button": {
            "background": "#6b0008",
            "color": "#FFFFFF"
          }
        },
        "theme": "classic",
        "content": {
          "message": "Questo sito utilizza i cookie per migliorare l'esperienza utente.",
          "dismiss": "Accetta",
          "deny": "Rifiuta",
          "link": "Leggi di più",
          "href": "legal/cookie-policy.html"
        }
      })
    });
  </script>
 
 
