@extends('layouts.public')
@section('title', 'Privacy Policy')
@section('content')
  <section class="legal-page">
    <div class="container">
      <div class="legal-header">
        <span class="legal-eyebrow">Informativa</span>
        <h1 class="legal-title">Privacy Policy</h1>
        <p class="legal-lead">Questa informativa descrive come trattiamo i dati personali.</p>
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
          <h2>Dati trattati</h2>
          <ul class="legal-list">
            <li><strong>Dati di navigazione</strong>: dati tecnici (es. IP, log di accesso) necessari al funzionamento del sito.</li>
            <li><strong>Dati forniti volontariamente</strong>: se ci contatti via email o telefono, tratteremo i dati che ci fornisci.</li>
          </ul>
        </div>

        <div class="legal-card">
          <h2>Finalità e base giuridica</h2>
          <ul class="legal-list">
            <li>Rispondere a richieste e comunicazioni: <strong>esecuzione di misure precontrattuali</strong>.</li>
            <li>Gestione tecnica e sicurezza del sito: <strong>legittimo interesse</strong>.</li>
            <li>Cookie non necessari (se presenti): <strong>consenso</strong>.</li>
          </ul>
        </div>

        <div class="legal-card">
          <h2>Conservazione dei dati</h2>
          <p>
            I dati vengono conservati per il tempo necessario a rispondere alle richieste e a gestire eventuali
            obblighi di legge. I dati tecnici sono conservati per periodi limitati.
          </p>
        </div>

        <div class="legal-card">
          <h2>Comunicazione a terzi</h2>
          <p>
            Non cediamo i dati a terzi per finalità commerciali. Alcuni fornitori tecnici (es. hosting o CDN)
            potrebbero trattare dati in qualità di responsabili del trattamento.
          </p>
        </div>

        <div class="legal-card">
          <h2>Diritti dell’interessato</h2>
          <p>
            Hai il diritto di accedere, rettificare, cancellare i tuoi dati, limitarne il trattamento o opporti.
            Per esercitare i tuoi diritti, scrivi a <a href="mailto:info@donmagnifico.it">info@donmagnifico.it</a>.
          </p>
          <p class="legal-muted">
            È possibile proporre reclamo al Garante per la Protezione dei Dati Personali.
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
