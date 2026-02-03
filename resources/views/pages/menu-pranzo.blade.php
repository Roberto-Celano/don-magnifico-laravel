@extends('layouts.public')
@section('title', 'Menu Pranzo')
@section('content')
<section class="menu-page">
    <div class="container menu-page-header text-center">
        <span class="menu-eyebrow">Pausa pranzo</span>
        <h1 class="menu-page-title">Menu Pranzo</h1>
        <p class="menu-page-lead">Menu a prezzo fisso per una pausa pranzo gustosa e conveniente.</p>
    </div>

    <!-- Contenuto della pagina Menu Pranzo -->
    <div class="container menu-content text-center">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-4 mx-auto mt-2 mt-lg-5">
                <h1 class="menu-page-subtitle text-center mt-3 mb-4">I NOSTRI MENU</h1>
            </div>
        </div>

        @if ($lunchMenus->count() > 0)
            @foreach ($lunchMenus as $menu)
                <hr class="menu-divider my-5">

                <div class="container menu-content text-center">
                    <div class="row justify-content-evenly">
                        <div class="col-12 col-lg-8 mb-3 menu-category-card">
                            <div class="col-10 mx-auto mb-4">
                                <h3 class="menu-section-title text-center">{{ strtoupper($menu->name) }}</h3>
                                <div class="menu-pranzo-price mt-3">
                                    <span class="menu-badge">€ {{ number_format($menu->price, 2, ',', '.') }}</span>
                                </div>
                                @if ($menu->description)
                                    <p class="menu-pranzo-description mt-3">{{ $menu->description }}</p>
                                @endif
                            </div>

                            @foreach (explode("\n", $menu->courses) as $course)
                                @if (trim($course))
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="text-center menu-pranzo-item">
                                                <i class="fas fa-check menu-pranzo-check"></i>
                                                {{ trim($course) }}
                                            </h6>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <hr class="menu-divider my-5">

            <!-- Nota -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <p class="menu-note menu-note--boxed">
                            <i class="fas fa-info-circle"></i> 
                            I menu pranzo sono disponibili tutti i giorni dalle 12:00 alle 15:00.<br>
                            I piatti possono variare in base alla disponibilità e alla stagionalità dei prodotti.
                        </p>
                    </div>
                </div>
            </div>

            <hr class="menu-divider my-5">

            <!-- CTA Prenotazione -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6 text-center">
                        <h3 class="menu-banner-title mb-4">Prenota il tuo tavolo</h3>
                        <a href="https://wa.me/+393405716102?text={{ urlencode('Ciao! Vorrei prenotare un tavolo per il pranzo.') }}" 
                           class="btn-cta-whatsapp" 
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> Prenota su WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        @else
            <hr class="menu-divider my-5">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="menu-category-card text-center">
                            <div class="menu-pranzo-closed-icon mb-3">
                                <i class="fas fa-calendar-times"></i>
                            </div>
                            <h3 class="menu-section-title mb-4">MENU PRANZO NON DISPONIBILI</h3>
                            <p class="menu-pranzo-closed-text">
                                Attualmente i menu pranzo non sono disponibili.<br>
                                Siamo un ristorante stagionale e i nostri menu variano durante l'anno.
                            </p>
                            <p class="menu-pranzo-closed-cta">
                                <i class="fas fa-bell"></i> Torna a visitare questa pagina per scoprire quando saranno di nuovo attivi!
                            </p>
                            <hr class="menu-divider my-4" style="width: 50%;">
                            <p class="menu-pranzo-closed-link">
                                Nel frattempo, scopri il nostro <a href="/menu">menu completo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('style')
<style>
    .menu-pranzo-price {
        margin-bottom: 1rem;
    }

    .menu-pranzo-description {
        color: rgba(60, 43, 47, 0.8);
        font-style: italic;
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .menu-pranzo-item {
        color: var(--dm-burgundy);
        font-weight: 500;
        padding: 0.5rem 0;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .menu-pranzo-check {
        color: var(--dm-gold);
        font-size: 0.85rem;
    }

    .btn-cta-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: #25D366;
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-cta-whatsapp:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(37, 211, 102, 0.35);
        color: white;
    }

    .btn-cta-whatsapp i {
        font-size: 1.4rem;
    }

    /* Messaggio menu non disponibili */
    .menu-pranzo-closed-icon {
        font-size: 3.5rem;
        color: var(--dm-burgundy);
        opacity: 0.4;
    }

    .menu-pranzo-closed-text {
        color: rgba(60, 43, 47, 0.85);
        font-size: 1.1rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .menu-pranzo-closed-cta {
        color: var(--dm-burgundy);
        font-weight: 600;
        font-size: 1rem;
    }

    .menu-pranzo-closed-cta i {
        color: var(--dm-gold);
        margin-right: 0.3rem;
    }

    .menu-pranzo-closed-link {
        color: rgba(60, 43, 47, 0.7);
        font-size: 0.95rem;
    }

    .menu-pranzo-closed-link a {
        color: var(--dm-burgundy);
        font-weight: 600;
        text-decoration: underline;
    }

    .menu-pranzo-closed-link a:hover {
        color: var(--dm-gold);
    }
</style>
@endpush
