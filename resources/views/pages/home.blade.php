@extends('layouts.public')
@section('content')
  
      @include('pages.partials.home.hero')

        <hr class="menu-divider mt-5 mb-3">

        <!-- Sezione Chi Siamo -->
        <section class="about-us container">
          <div class="row">
            <div class="col-12 text-center">
              <h1 style="color:#6B0008"> <a
                  name="chi-siamo"
                  style="margin-top:-210px; padding-top: 210px;"></a><b>CHI
                  SIAMO</b></h1>
            </div>
            <div class="col-12">
              <div class="col-11 col-lg-9 mx-auto text-start">
                <h6 class="text-justify">
                  Il ristorante - pizzeria Don Magnifico è nato nel 2014 da un
                  sogno rimasto nel cassetto per tanto tempo della nostra
                  famiglia
                  che ha visto già i nonni e i bisnonni cimentarsi in questo
                  settore. La cucina è passione, è ricerca di sapori, è alchimia
                  di profumi e, per noi, fare ristorazione ha significato e
                  significa ricercare il meglio come prodotti e realizzare il
                  meglio con gli stessi avendo cura di seguire ogni passagio con
                  amore ma soprattutto senza fretta, rispettando i tempi della
                  nostra tradizione culinaria. Nei nostri piatti c'è molto della
                  sapienza dei nostri nonni e genitori, molto dei sapori del
                  territorio e della tradizione, con uno sguardo però alla
                  contemporaenità, all'evolversi della cucina e dei gusti.
                  Dietro
                  ogni piatto, anche il più semplice c'e sempre tanta dedizione
                  e
                  tanto amore: questo è per noi il segreto del successo che è
                  andato aumentando di anno in anno. I nostri clienti ritornano
                  ogni stagione per riscoprire i nostri piatti e come dicono
                  loro
                  per "ritrovarci", per rivivere cioè quell'atmosfera familiare
                  fatta di attenzioni e contornata da uno scenario mozzafiato.
                  I
                  nostri tavoli si affacciano su una vista impagabile, di giorno
                  con l'azzurro del mare e di sera con la luna che si rispecchia
                  sull'acqua e poi...le Tremiti in lontanza e il Gargano a
                  chiudere questa cornice meravigliosa. Da noi potrete gustare
                  piatti della tradizione culinaria vastese quali il brodetto e
                  le
                  pallotte cacio e uova, taglieri con le specialità dell'alto
                  vastese quali la ventricina e il pecorino, sapori che potrete
                  ritrovare anche sulle nostre pizze. Un mix di sapori di terra
                  e
                  di mare, una varietà di colori dei nostri piatti e delle
                  nostre
                  pizze, uno spettacolo mozzafiato che potrete ammirare dai
                  nostri
                  tavoli, una ambiente familiare: questi i motivi per i quali
                  vale
                  la pena venirci a trovare.</h6>
              </div>
            </div>
          </div>
        </section>

        <div class="carousel-container">
          <div id="carouselExampleAutoplaying"
            class="carousel slide w-100" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/carosel/pedane.webp" class="d-block w-100"
                  alt="Pedane del ristorante Don Magnifico con vista panoramica"
                  title="Pedane con vista panoramica"
                  aria-label="Pedane con vista mare dove poter gustare una pizza o un piatto di pesce con la splendida vista del golfo di Vasto visibile dal ristorante-pizzeria Don Magnifico" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosel/tiramisu.webp" class="d-block w-100"
                  alt="Panna cotta ai frutti di bosco su vista panoramica del golfo di Vasto"
                  title="Panna cotta ai frutti di bosco"
                  aria-label="Splendida panna cotta ai frutti di bosco da poter gustare sulla vista del golfo di Vasto dal ristorante-pizzeria Don Magnifico" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosello/tavoloantipasto.webp"
                  class="d-block w-100 h-75"
                  alt="Tavolo con antipasto di mare tipico del ristorante-pizzeria Don Magnifico"
                  title="Misto mare Don Magnifico"
                  aria-label="Tavolo con antipasto misto mare da poter gustare al ristorante-pizzeria Don Magnifico" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosello/facciata.webp" class="d-block w-100 h-75"
                  alt="Facciata esterna con vista panoramica ristorante-pizzeria Don Magnifico"
                  title="Esterno vista mare ristorante-pizzeria Don Magnifico"
                  aria-label="Splendida facciata con tavoli apparecchiati dove poter gustare un prano o una cena al ristorante-pizzeria Don Magnifico con la vista del golfo di Vasto" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosello/tavolopesce.webp"
                  class="d-block w-100 h-75"
                  alt="Tavolo con pietanze di pesce e calici di vino bianco su vista panoramica del golfo di Vasto del ristorante-pizzeria Don Magnifico"
                  title="Pranzo di pesce vista mare"
                  aria-label="Tavolo con vista golfo di Vasto imbandito con piatti di pesce del ristorante-pizzeria Don Magnifico" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosello/entrata.webp" class="d-block w-100 h-75"
                  alt="Esterno del ristorante-pizzeria Don Magnifico"
                  title="Esterno ristorante-pizzeria Don Magnifico"
                  aria-label="Esterno del ristorante-pizzeria Don Magnifico sulla loggia amblingh di Vasto" loading="lazy">
              </div>
              <div class="carousel-item">
                <img src="img/carosello/tavolopizze.webp"
                  class="d-block w-100 h-75"
                  alt="Tavolo con pizza e birre su vista panoramica del ristorante-pizzeria Don Magnifico"
                  title="Pranzo di pizza e birra vista mare"
                  aria-label="Tavolo con pizze e birre con splendida vista sul golfo di Vasto del ristorante-pizzeria Don Magnifico" loading="lazy">
              </div>
            </div>
            <button class="carousel-control-prev" type="button"
              data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"
                aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button"
              data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon"
                aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

        <hr class="menu-divider my-5">
        <!-- Sezione Menu -->
        <section class="menu-section container text-center">
          <div class="row">
            <div class="col-12 text-center">
              <h1 style="color:#6B0008"><b>IL NOSTRO MENÙ</b></h1>
              <p class="lead mb-4">SCOPRI I NOSTRI PIATTI DELIZIOSI
                E GENUINI</p>
            </div>
          </div>
          <div class="row">
            <div class="col-10 col-md-4 mx-auto">
              <div class="card mb-4">
                <img src="img/card_piatti/antipasto.webp"
                  class="card-img-top"
                  alt="Antipasto di tagliere di salumi e formaggi misti"
                  title="Tagliere salumi e formaggi misti"
                  aria-label="il gustoso tagliere salumi e formaggi misti che offre Don Magnifico ristorante pizzeria"
                  loading="lazy">
                <div class="card-body text-center">
                  <h6 class="card-title  text-center"
                    id="titolocard"><b>TAGLIERE<br>
                      SALUMI E FORMAGGI</h6></b>
                  <p class="card-text m-auto">Un assortimento di
                    salumi e
                    formaggi,
                    con verdure grigliate e miele.</p>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-4 mx-auto">
              <div class="card mb-4">
                <img src="img/card_piatti/primo.webp"
                  class="card-img-top"
                  alt="Calamarata pesto di zucchine, mazzancolle sgusciate e calamaretti"
                  title="Calamarata pesto di zucchine, mazzancolle e calamaretti"
                  aria-label="Pasta fresca con pesto di zucchine, calmari freschi e mazzancolle sgusciate."
                  loading="lazy">
                <div class="card-body text-center">
                  <h6 class="card-title"
                    id="titolocard"><b>MEZZI PACCHERI<br> AL PESTO DI
                      ZUCCHINE</b></h6>
                  <p class="card-text m-auto">Pasta fresca con
                    pesto di zucchine, calmari
                    freschi e mazzancolle.</p>
                </div>
              </div>
            </div>
            <div class="col-10 col-md-4 mx-auto">
              <div class="card mb-4 m-auto">
                <img src="img/card_piatti/secondo.webp"
                  class="card-img-top" alt="Grigliata mista
                  di pesce e crostacei locali " title="Profumo di mare"
                  aria-label="Grigliata mista
                  di pesce e crostacei locali da gustare al ristorante pizzeria Don Magnifico a Vasto"
                  loading="lazy">
                <div class="card-body text-center">
                  <h6 class="card-title" id="titolocard"><b>GRIGLIATA<br> MISTA
                      DI PESCE</h6></b>
                  <p class="card-text m-auto">Grigliata mista
                    di pesce e crostacei locali secondo disponiblità.</p>
                </div>

              </div>
            </div>
            <div class="col-10 mx-auto">
              <a href="/menu"><button
                  class="btn mt-3 mx-auto"
                  id="btnmenu"><h6 class="m-auto">CLICCA QUI PER VEDERE IL MENÙ
                    COMPLETO</h6></button></a>
            </div>
          </div>
        </section>
        <hr class="menu-divider mb-4 mt-5">

        <section class="customer-reviews container mt-5">
          <div class="container m-auto text-center">
            <div class="row">
              <div class="col-1"></div>
              <div class="col-12 text-center">
                <h1 class="mb-5" style="color:#6B0008"><b>DICONO DI
                    NOI</b></h1>
                <div id="reviewsCarousel" class="carousel slide w-100 mx-auto"
                  data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="review text-center">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h3>Recensione eccellente</h3>
                        <p>"Location tipica di osteria, con tavoli sia fuori con
                          bellissima vista mare e sia dentro al piano di sopra (
                          da alcuni tavoli si può comunque vedere il mare ).

                          Il personale è velocissimo e gentile, SUPER efficiente
                          e
                          professionale.

                          Ho mangiato qui diverse volte ed ho provato sia pesce
                          che pizza.

                          Tutti i piatti sono eccezionali, il pesce fresco
                          cucinato alla perfezione.
                          La pizza è buona."</p>
                        <div class="rating">
                          ★★★★★
                        </div>
                        <p class="reviewer">- Carlo -</p>
                        <p class="date">24 Maggio 2024</p>
                        <p class="source">Fonte: <a
                            href="https://www.google.com/search?client=ms-android-oppo-rvo3&sca_esv=317e6ae4902de9ac&sca_upv=1&cs=0&q=recensioni%20di%20don%20magnifico&ludocid=5311786868120427181&ibp=gwp%3B0%2C7&hl=it-IT&sa=X&ved=0CAYQ5foLahcKEwiA8sO38_OGAxUAAAAAHQAAAAAQDA&biw=360&bih=709&dpr=3#lkt=LocalPoiReviews&arid=ChdDSUhNMG9nS0VJQ0FnSURqc0lmUGlRRRAB&lpg=cid:CgIgAQ%3D%3D">www.google.com</a></p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="review text-center">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h3>Esperienza Unica</h3>
                        <p>"Situato lungo la passeggiata del Belvedere a Vasto, offre una vista mozzafiato sul golfo. L'accoglienza calorosa e professionale del proprietario con i suoi familiari e dipendenti, crea un'atmosfera empatica ed accogliente. I piatti, fotografati ma più gustosi dal vivo, sono preparati con pesce freschissimo e grande maestria. Raccomando vivamente di visitare questo posto fantastico e non vedo l'ora di tornarci per gustare le famose pallotte cacio e ova, che mi sono tenuto per la prossima visita. Godetevi una meravigliosa esperienza gastronomica con vista panoramica, non ve ne pentirete!"</p>
                        <div class="rating">
                          ★★★★★
                        </div>
                        <p class="reviewer">- Stefano Di Noro -</p>
                        <p class="date">15 luglio 2023</p>
                        <p class="source">Fonte: <a
                            href="https://www.google.com/search?client=ms-android-oppo-rvo3&sca_esv=317e6ae4902de9ac&sca_upv=1&cs=0&q=recensioni%20di%20don%20magnifico&ludocid=5311786868120427181&ibp=gwp%3B0%2C7&hl=it-IT&sa=X&ved=0CAYQ5foLahcKEwiA8sO38_OGAxUAAAAAHQAAAAAQDA&biw=360&bih=709&dpr=3#lkt=LocalPoiReviews&arid=ChdDSUhNMG9nS0VJQ0FnSURqc0lmUGlRRRAB&lpg=cid:CgIgAQ%3D%3D">www.google.com</a></p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="review text-center">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h3>Esperienza super positiva</h3>
                        <p>"Iniziamo dal posto che dire molto accogliente con una
                          vista stupenda sul mare
                          Cibo:
                          Ordinato 1 pizza con wurstel e patate per le bambine
                          che l'hanno divorata e devo dire molto buona
                          1 insalata di mare buona semplice e saporita che
                          purtroppo non ho fotografato
                          2 piatti di pasta fresca ai frutti di mare che dire la
                          foto parla da sola ECCEZIONALE per il mio gusto
                          2 piatti di calamari fritti e gamberi buona leggera
                          non unta
                          2 cocacole in lattina 1 birra media 1 acqua
                          naturale"</p>
                        <div class="rating">
                          ★★★★★
                        </div>
                        <p class="reviewer">- Ivan -</p>
                        <p class="date">01 agosto 2024</p>
                        <p class="source">Fonte: <a
                            href="https://www.google.com/search?client=ms-android-oppo-rvo3&sca_esv=317e6ae4902de9ac&sca_upv=1&cs=0&q=recensioni%20di%20don%20magnifico&ludocid=5311786868120427181&ibp=gwp%3B0%2C7&hl=it-IT&sa=X&ved=0CAYQ5foLahcKEwiA8sO38_OGAxUAAAAAHQAAAAAQDA&biw=360&bih=709&dpr=3#lkt=LocalPoiReviews&arid=ChdDSUhNMG9nS0VJQ0FnSURqc0lmUGlRRRAB&lpg=cid:CgIgAQ%3D%3D">www.google.com</a></p>
                      </div>
                    </div>
                     <div class="carousel-item">
                      <div class="review text-center">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h3>Ottima esperienza</h3>
                        <p>"Abbiamo pranzato scegliendo la formula di menù fisso che comprendeva 
                          antipasto a scelta tra tre pietanze, primo a scelta tra tre pietanze e
                           secondo a scelta tra tre pietanze con vino o acqua. I piatti erano a 
                           base di pesce fresco e ben cucinato. Abbiamo preso poi due sorbetti a 
                           limone davvero squisiti. Servizio veloce e personale disponibile e gentile. 
                           Location situata in un punto panoramico della città di Vasto. prezzi adeguati. 
                           Consigliatissimo."</p>
                        <div class="rating">
                          ★★★★★
                        </div>
                        <p class="reviewer">- Maria Cresci -</p>
                        <p class="date">28 luglio 2023</p>
                        <p class="source">Fonte: <a
                            href="https://www.google.com/search?client=ms-android-oppo-rvo3&sca_esv=317e6ae4902de9ac&sca_upv=1&cs=0&q=recensioni%20di%20don%20magnifico&ludocid=5311786868120427181&ibp=gwp%3B0%2C7&hl=it-IT&sa=X&ved=0CAYQ5foLahcKEwiA8sO38_OGAxUAAAAAHQAAAAAQDA&biw=360&bih=709&dpr=3#lkt=LocalPoiReviews&arid=ChdDSUhNMG9nS0VJQ0FnSURqc0lmUGlRRRAB&lpg=cid:CgIgAQ%3D%3D">www.google.com</a></p>
                      </div>
                    </div>
                     <div class="carousel-item">
                      <div class="review text-center">
                        <i class="fas fa-user-circle fa-3x"></i>
                        <h3>Posto scoperto e scelto per caso</h3>
                        <p>"Una vista meravigliosa, personale molto cortese e pizza buonissima, croccante e saporita. Rapporto qualità prezzo super."</p>
                        <div class="rating">
                          ★★★★★
                        </div>
                        <p class="reviewer">- Federica Valarin -</p>
                        <p class="date">10 luglio 2024</p>
                        <p class="source">Fonte: <a
                            href="https://www.google.com/search?client=ms-android-oppo-rvo3&sca_esv=317e6ae4902de9ac&sca_upv=1&cs=0&q=recensioni%20di%20don%20magnifico&ludocid=5311786868120427181&ibp=gwp%3B0%2C7&hl=it-IT&sa=X&ved=0CAYQ5foLahcKEwiA8sO38_OGAxUAAAAAHQAAAAAQDA&biw=360&bih=709&dpr=3#lkt=LocalPoiReviews&arid=ChdDSUhNMG9nS0VJQ0FnSURqc0lmUGlRRRAB&lpg=cid:CgIgAQ%3D%3D">www.google.com</a></p>
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button"
                    data-bs-target="#reviewsCarousel" data-bs-slide="prev"
                    style="color:#6B0008">
                    <span class="carousel-control-prev-icon"
                      aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button"
                    data-bs-target="#reviewsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"
                      aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <a name="contatti"
                style="padding-top:160px; margin-top:-160px"></a>
            </div>
          </div>
        </section>


        <!-- Sezione Orari di Apertura e Contatti -->
        <section class="opening-hours-contact mt-3 mb-5">
          <div class="container text-center mb-5">
            <div class="row justify-content-center">
              <h1 class="mb-0 mb-lg-2 mt-1"
                style="color:#6B0008"><b>CONTATTI</b></h1>
              <div class="col-lg-8 mx-auto">
                <p><h5 class="mt-4">Telefono:</h5><h5><a
                      href="tel:+393405716102"
                      style="color:black;"> +393405716102</a></h5>
                  <p><h5 class="mt-2">Email:</h5><h5
                      class="mb-4"><a
                        href="mailto:info@donmagnifico.it"
                        style="color:black;">info@donmagnifico.it </a></h5>
                    <hr class="menu-divider d-none d-lg-block">
                    <h3 class="mt-4 mb-3"
                      style="color:#6B0008">ORARI DI APERTURA</h3>
                    <ul class="list-unstyled">
                      <li><h5>Lunedì - Domenica :</h5><h5
                          class="mb-sm-5"> 12:00 -
                          15:00 &nbsp;|&nbsp; 19:00 - 23:00</h5></li>
                    </ul>
                    <hr class="menu-divider d-none d-lg-block mb-4">
                  </div>
                  
                  <hr class="menu-divider mb-5 mt-4 d-lg-none">

                  <div class="col-10 col-md-10 col-lg-6 mx-auto">
                   <h3 class="mb-3"
                      style="color:#6B0008">DOVE SIAMO</h3>
                  <h6 class="mb-3">CLICCA SULLA MAPPA E SCOPRI COME RAGGIUNGERCI</h6>
                    
                    <a href="https://www.google.com/maps/place/Don+Magnifico/@42.1100167,14.7087269,19z/data=!4m6!3m5!1s0x1330dc544f573531:0x49b7420374e71aad!8m2!3d42.1100475!4d14.7092788!16s%2Fg%2F11d_8zd6l7?authuser=0&entry=ttu" target="_blank">
                   <img class="img-fluid"src="img/map.png" alt="mappa per raggiungere il ristornate-pizzeria Don Magnifico" aria-label="cerca in google maps come raggiungerci" style="border:2px solid #6B0008"></a>
                  </div>

                </div>
              </div>
            </section>

  

          <!-- Pulsante Galleggiante -->
          <div id="floatingBtn" class="floating-btn d-lg-none">
            <i class="fa-solid fa-users fa-2xl fa-shake"></i>
          </div>

          <!-- Pulsanti Social -->
          <a href="https://www.facebook.com/profile.php?id=61556653926794"
            target="_blank" class="social-btn facebook"
            style="text-decoration: none;">
            <i class="fa-brands fa-facebook fa-2xl"></i>
          </a>
          <a
            href="https://www.instagram.com/donmagnifico.ristorante?igsh=MWp4bDZlMnVkeW1sbQ=="
            target="_blank" class="social-btn instagram"
            style="text-decoration: none;">
            <i class="fa-brands fa-instagram fa-2xl"></i>
          </a>
          <a href="https://wa.me/+393405716102" target="_blank"
            class="social-btn whatsapp" style="text-decoration: none;">
            <i class="fab fa-whatsapp fa-2xl"></i>
          </a>
          <a href="https://g.co/kgs/DfG2BGe" target="_blank"
            class="social-btn google" style="text-decoration: none;">
            <i class="fab fa-google fa-2xl"></i>
          </a>

          <a href="#start" id="back-to-top"><i
              class="fas fa-chevron-up" title="Torna a inizio pagina"></i></a>

          <!-- Collegamento agli script -->
          <script src="js/script.js" defer></script>
          <script
            src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"
            defer></script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script>
      AOS.init();
     </script>
 