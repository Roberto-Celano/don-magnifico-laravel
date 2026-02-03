@extends('layouts.public')
@section('title', 'Menu Pranzo - Offerta Esclusiva')
@section('content')
<section class="menu-page">
    <div class="container menu-page-header text-center">
        <span class="menu-eyebrow">Esclusiva per gli ospiti dei nostri B&B partner</span>
        <h1 class="menu-page-title">Menu Pranzo</h1>
        <p class="menu-page-lead">Menu a prezzo fisso per una pausa pranzo gustosa e conveniente.</p>
    </div>

    <!-- Banner Sconto B&B -->
    @if ($bebPartner)
        <div class="pranzo-beb-banner">
            <div class="container">
                <div class="pranzo-beb-banner-content">
                    <div class="pranzo-beb-banner-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div class="pranzo-beb-banner-text">
                        <strong>Benvenuto ospite di {{ $bebPartner->name }}!</strong>
                        <span>
                            Hai uno sconto del 
                            <em>{{ $bebPartner->discount_type === 'percentage' ? $bebPartner->discount_value . '%' : '€' . number_format($bebPartner->discount_value, 2, ',', '.') }}</em>
                            - Comunica il codice <code>{{ $bebPartner->code }}</code> al momento dell'ordine
                        </span>
                        <span class="pranzo-beb-banner-validity">
                            <i class="fas fa-calendar-alt"></i>
                            Validità: 
                            @if ($bebPartner->valid_from && $bebPartner->valid_until)
                                dal {{ $bebPartner->valid_from->format('d/m/Y') }} al {{ $bebPartner->valid_until->format('d/m/Y') }}
                            @elseif ($bebPartner->valid_from)
                                dal {{ $bebPartner->valid_from->format('d/m/Y') }}
                            @elseif ($bebPartner->valid_until)
                                fino al {{ $bebPartner->valid_until->format('d/m/Y') }}
                            @else
                                sempre valido
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                                    @if ($bebPartner)
                                        <span class="menu-badge menu-badge--original">€ {{ number_format($menu->price, 2, ',', '.') }}</span>
                                        <span class="menu-badge menu-badge--discounted">
                                            @if ($bebPartner->discount_type === 'percentage')
                                                € {{ number_format($menu->price * (1 - $bebPartner->discount_value / 100), 2, ',', '.') }}
                                            @else
                                                € {{ number_format(max(0, $menu->price - $bebPartner->discount_value), 2, ',', '.') }}
                                            @endif
                                        </span>
                                    @else
                                        <span class="menu-badge">€ {{ number_format($menu->price, 2, ',', '.') }}</span>
                                    @endif
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
                            @if ($bebPartner)
                                <br><strong>Ricorda di comunicare il tuo codice sconto al momento dell'ordine!</strong>
                            @endif
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
                        <a href="https://wa.me/+393405716102?text={{ urlencode('Ciao! Sono un ospite' . ($bebPartner ? ' di ' . $bebPartner->name . ' (codice ' . $bebPartner->code . ')' : ' di un B&B partner') . ' e vorrei prenotare un tavolo per il pranzo.') }}" 
                           class="btn-cta-whatsapp" 
                           target="_blank" 
                           rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> Prenota su WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <hr class="menu-divider my-5">

            <!-- Info B&B Partner -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="pranzo-beb-info">
                            <i class="fas fa-bed pranzo-beb-info-icon"></i>
                            <h4>Convenzione B&B Partner</h4>
                            <p>
                                Questa è un'offerta esclusiva riservata agli ospiti dei nostri B&B partner.<br>
                                @if ($bebPartner)
                                    Grazie alla collaborazione con <strong>{{ $bebPartner->name }}</strong>, hai diritto a uno sconto speciale!
                                @else
                                    Se sei un ospite di un B&B convenzionato, chiedi al tuo host il link con il codice sconto.
                                @endif
                            </p>
                        </div>
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
                            @if ($bebPartner)
                                <p class="menu-pranzo-closed-discount">
                                    <i class="fas fa-gift"></i> Il tuo codice sconto <code>{{ $bebPartner->code }}</code> rimarrà valido 
                                    @if ($bebPartner->valid_until)
                                        fino al {{ $bebPartner->valid_until->format('d/m/Y') }}
                                    @else
                                        per le prossime stagioni
                                    @endif
                                </p>
                            @endif
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
    /* Banner B&B */
    .pranzo-beb-banner {
        background: linear-gradient(135deg, var(--dm-gold) 0%, var(--dm-gold-dark) 100%);
        padding: 1rem 0;
        margin-top: -1rem;
    }

    .pranzo-beb-banner-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
        text-align: center;
    }

    .pranzo-beb-banner-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: var(--dm-burgundy);
        flex-shrink: 0;
    }

    .pranzo-beb-banner-text {
        color: var(--dm-ink);
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .pranzo-beb-banner-text strong {
        font-size: 1.1rem;
    }

    .pranzo-beb-banner-text span {
        font-size: 0.95rem;
    }

    .pranzo-beb-banner-text em {
        font-weight: 700;
        font-style: normal;
    }

    .pranzo-beb-banner-text code {
        background: white;
        padding: 0.15rem 0.5rem;
        border-radius: 4px;
        font-size: 0.95rem;
        color: var(--dm-burgundy);
        font-weight: 600;
    }

    .pranzo-beb-banner-validity {
        font-size: 0.85rem;
        opacity: 0.85;
        margin-top: 0.25rem;
    }

    .pranzo-beb-banner-validity i {
        margin-right: 0.3rem;
    }

    /* Prezzo con sconto */
    .menu-pranzo-price {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .menu-badge--original {
        text-decoration: line-through;
        opacity: 0.6;
        font-size: 1rem;
        background: #e5e7eb;
        color: #6b7280;
    }

    .menu-badge--discounted {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        font-size: 1.2rem;
        animation: pulse-discount 2s ease-in-out infinite;
    }

    @keyframes pulse-discount {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
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

    /* Info B&B Partner */
    .pranzo-beb-info {
        background: linear-gradient(135deg, var(--dm-burgundy) 0%, var(--dm-burgundy-dark) 100%);
        color: white;
        padding: 2rem;
        border-radius: 16px;
        text-align: center;
    }

    .pranzo-beb-info-icon {
        font-size: 2.5rem;
        color: var(--dm-gold);
        margin-bottom: 1rem;
    }

    .pranzo-beb-info h4 {
        color: var(--dm-gold);
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }

    .pranzo-beb-info p {
        margin: 0;
        opacity: 0.95;
        line-height: 1.7;
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

    .menu-pranzo-closed-discount {
        background: linear-gradient(135deg, var(--dm-gold) 0%, var(--dm-gold-dark) 100%);
        color: var(--dm-ink);
        padding: 1rem;
        border-radius: 12px;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .menu-pranzo-closed-discount code {
        background: white;
        padding: 0.15rem 0.5rem;
        border-radius: 4px;
        color: var(--dm-burgundy);
        font-weight: 600;
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

    @media (max-width: 768px) {
        .pranzo-beb-banner-content {
            flex-direction: column;
        }

        .pranzo-beb-banner-text {
            gap: 0.5rem;
        }
    }
</style>
@endpush
