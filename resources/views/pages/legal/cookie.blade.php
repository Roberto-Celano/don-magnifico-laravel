@extends('layouts.public')
@section('title', 'Cookie')
@section('content')
  <section class="legal-page">
    <div class="container">
      <div class="legal-header">
        <span class="legal-eyebrow">Informativa</span>
        <h1 class="legal-title">Cookie Policy</h1>
        <p class="legal-lead">Questa pagina descrive quali cookie utilizziamo e come puoi gestire le tue preferenze.</p>
      </div>

      <div class="legal-content">
        <div class="legal-card">
          <h2>Titolare del trattamento</h2>
          <p>
            Don Magnifico – Ristorante · Pizzeria<br>
            Via Loggia Amblingh, 11 – Vasto (CH)<br>
            Email: <a href="mailto:info@donmagnifico.it">info@donmagnifico.it</a>
          </p>
        </div>

        <div class="legal-card">
          <h2>Cosa sono i cookie</h2>
          <p>
            I cookie sono piccoli file di testo che i siti salvano sul tuo dispositivo per garantire
            il corretto funzionamento, migliorare la navigazione e ricordare le tue preferenze.
          </p>
        </div>

        <div class="legal-card">
          <h2>Cookie utilizzati</h2>
          <ul class="legal-list">
            <li><strong>Cookie tecnici (necessari)</strong>: indispensabili per il funzionamento del sito.</li>
            <li><strong>Cookie di preferenza</strong>: memorizzano la tua scelta sul consenso.</li>
          </ul>
          <p class="legal-muted">
            Al momento non utilizziamo cookie di profilazione o marketing.
          </p>
        </div>

        <div class="legal-card">
          <h2>Dettaglio cookie</h2>
          <ul class="legal-list">
            <li><strong>dm_cookie_consent</strong> – salva la tua scelta (durata: 180 giorni).</li>
          </ul>
        </div>

        <div class="legal-card">
          <h2>Gestione delle preferenze</h2>
          <p>
            Puoi modificare o revocare il consenso eliminando i cookie dal browser oppure ricaricando
            la pagina per visualizzare nuovamente il banner.
          </p>
        </div>

        <div class="legal-card">
          <h2>Servizi di terze parti</h2>
          <p>
            Alcuni contenuti (es. font e librerie) potrebbero essere caricati da fornitori esterni.
            Questo può comportare il trattamento di dati tecnici (es. indirizzo IP) strettamente
            necessari all’erogazione del servizio.
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
