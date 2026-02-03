@extends('layouts.qr')
@section('content')
@section('title', 'Menù')

<section class="menu-page">
    <div class="container menu-page-header text-center">
        <span class="menu-eyebrow">Il nostro menù</span>
        <h1 class="menu-page-title">Menù</h1>
        <p class="menu-page-lead">Ristorante, pizzeria e specialità della tradizione abruzzese.</p>
    </div>

    <!-- Contenuto della pagina Menù -->
    <div class="container menu-content text-center">
        <div class="row justify-content-center">
            <div class="col-11 col md-8 col-lg-4 mx-auto mt-2 mt-lg-5">
                <img class="menu-hero-image menu-hero-image--top" src={{ asset('img/card_menu/tagliere.webp') }}
                    alt="Tagliere salumi e formaggi" title="Tagliere salumi e formaggi" data-aos="fade-down"
                    loading="lazy" width="250">
                <h1 class="menu-page-subtitle text-center mt-5 mb-4">IL RISTORANTE</h1>
                <img class="menu-hero-image menu-hero-image--bottom" src={{ asset('img/card_menu/primo.webp') }}
                    data-aos="fade-up"alt="Calamarata pesto di zucchine, mazzancolle sgusciate e calamaretti"
                    title="Calamarata pesto di zucchine, mazzancolle e calamaretti"
                    aria-label="Pasta fresca con pesto di zucchine, calmari freschi e mazzancolle sgusciate."
                    loading="lazy" width="250">
            </div>
        </div>
        <!--Antipasti-->
        <hr class="menu-divider my-5">

        <div class="container menu-content text-center">
            <div class="row justify-content-evenly">
                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    <div class="col-8 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">ANTIPASTI</h3>
                    </div>

                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Antipasti')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <hr class="menu-divider my-5">

        <!--Primi piatti-->
        <div class="container menu-content text-center">
            <div class="row justify-content-evenly">
                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    <div class="col-8 mx-auto mb-4">
                        <h3 class="menu-section-title">PRIMI PIATTI</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Primi Piatti')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
            </div>
        </div>

        <hr class="menu-divider my-5">

        <!--Secondi piatti-->
        <div class="container menu-content text-center">
            <div class="row justify-content-evenly">
                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    <div class="col-12 col-lg-8 mx-auto mb-4">
                        <h3 class="menu-section-title">SECONDI PIATTI</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Secondi Piatti')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <hr class="menu-divider my-5">

        <!--Contorni e insalate-->
        <div class="container menu-content text-center">
            <div class="row justify-content-around">
                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title">INSALATONE</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Insalatone')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container menu-content text-center mt-5">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-4 mx-auto">
                    <img class="menu-hero-image menu-hero-image--top" src={{ asset('img/card_menu/pizzarossameta.webp') }}
                        alt="pizza rossa capricciosa" title="Pizza Capricciosa"
                        aria-label="pizza capricciosa del ristorante Don Magnifico" data-aos="fade-down" width="250"
                        loading="lazy">
                    <h1 class="menu-page-subtitle text-center mt-5 mb-4">LA PIZZERIA</h1>
                    <img class="menu-hero-image menu-hero-image--bottom" src={{ asset('img/card_menu/pizzabiancameta.webp') }}
                        alt="pizza bianca norma" data-aos="fade-up" width="250" loading="lazy">
                </div>
            </div>
        </div>
        <!--Pizze-->

        <div class="container menu-content text-center">
            <div class="row justify-content-around mt-5">
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mx-auto mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title">PIZZE ROSSE</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Pizze Rosse')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="menu-divider my-5">
        <div class="container menu-content text-center">
            <div class="row justify-content-around">
                <div class="col-12 col-lg-8 mx-auto mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title">PIZZE BIANCHE</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Pizze Bianche')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="menu-divider my-5">

        <div class="container menu-content text-center">
            <div class="row justify-content-around">
                <div class="col-12 col-lg-8 mx-auto mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title">PIZZE SPECIALI</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Pizze Speciali')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container menu-content text-center">
            <div class="row justify-content-around">
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mx-auto mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">PIZZE BABY</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Pizze Baby')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container menu-content text-center">
            <div class="row justify-content-around">
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    <div class="col-7 mx-auto mb-4">
                        <h3 class="menu-section-title">FRIGGITORIA</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Friggitoria')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!--Dessert-->

        <div class="container menu-content text-center mt-5">

            <div class="row justify-content-center">
                <div class="col-11 col-lg-4 mx-auto">
                    <img class="menu-hero-image menu-hero-image--top" src={{ asset('img/card_menu/dolce1.webp') }}
                        alt="dolce con frutti" loading="lazy" data-aos="fade-down" width="250">
                    <h1 class="menu-page-subtitle text-center mt-5 mb-4">I DESSERT</h1>
                    <img class="menu-hero-image menu-hero-image--bottom" src={{ asset('img/card_menu/dolce2.webp') }}
                        alt="dolce con frutti" loading="lazy" data-aos="fade-up" width="250">
                </div>
            </div>
        </div>
        <div class="container menu-content text-center">
            <div class="row justify-content-around mt-5">
                <hr class="menu-divider my-5">

                <div class="col-12 col-lg-8 mb-3 menu-category-card">
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Dessert')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container menu-content text-center">
            <div class="row justify-content-evenly">
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mb-3 mx-auto menu-category-card">
                    <div class="col-8 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">BEVANDE</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Bevande')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="menu-divider my-5">

                <div class="col-12 col-lg-8 mb-4 menu-category-card">
                    <div class="col-12 mx-auto mb-3">
                        <h3 class="menu-section-title text-center">BEVANDE ALLA SPINA</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Bevande alla Spina')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mb-4 menu-category-card">
                    <div class="col-12 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">BIRRA ALLA SPINA</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Birra alla Spina')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mb-4 menu-category-card">
                    <div class="col-12 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">BIRRA IN BOTTIGLIA</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Birra in Bottiglia')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="menu-divider my-5">
                <div class="col-12 col-lg-8 mb-4 menu-category-card">
                    <div class="col-12 mx-auto mb-4">
                        <h3 class="menu-section-title text-center">DIGESTIVI</h3>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Digestivi')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <hr class="menu-divider my-5">
                <div class="col-12 col-md-12 col-lg-8 mb-0 mb-lg-2 menu-category-card">
                    <div class="menu-card-header">
                        <h3 class="menu-card-title">Vini</h3>
                        <p class="menu-card-subtitle">Selezione della cantina per accompagnare i piatti.</p>
                    </div>
                    <div class="col-5 col-lg-2 mx-auto my-4">
                        <h5 class="menu-badge">POLLUTRO</h5>
                    </div>
                     @foreach ($menuCategories as $category)
                        @if ($category->name == 'Vini Pollutro')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    <div class="col-7 col-lg-3 mx-auto my-4">
                        <h5 class="menu-badge">DON VENANZIO</h5>
                    </div>
                     @foreach ($menuCategories as $category)
                        @if ($category->name == 'Vini Don Venanzio')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    <div class="col-4 col-lg-2 mx-auto my-4">
                        <h5 class="menu-badge">OTHERS</h5>
                    </div>
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Vini Others')
                            @foreach ($category->menuItems as $item)
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class=" text-start">{{ $item->name }}</h6>
                                        <p class=" text-start">
                                            @if ($item->ingredients)
                                                ({{ $item->ingredients }})
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    @foreach ($menuCategories as $category)
                        @if ($category->name == 'Coperto')
                            @foreach ($category->menuItems as $item)
                                <div class="row justify-content-around">
                                    <div class="col-3 col-lg-2">
                                        <h6 class=" text-start">{{ strtoupper($item->name) }}</h6>
                                    </div>
                                    <div class="col-4 col-md-3 col-lg-2">
                                        <h6 class=" text-end">€ {{ $item->price }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="container text-center mt-2 mb-2">
                    <div class="row">
                        <div
                            class="col-10 col-md-10 col-lg-5 mb-0 mb-lg-2 mt-5 mx-auto menu-category-card menu-category-card--narrow">
                            <div class="menu-card-header">
                                <h3 class="menu-card-title">Aggiunte sulla pizza</h3>
                                <p class="menu-card-subtitle">Extra e ingredienti aggiuntivi disponibili.</p>
                            </div>
                            @foreach ($menuCategories as $category)
                                @if ($category->name == 'Aggiunte')
                                    @foreach ($category->menuItems as $item)
                                        <div class="row">
                                            <div class="col-8">
                                                <h6 class=" text-start">{{ $item->name }}</h6>
                                                <p class=" text-start">
                                                    @if ($item->ingredients)
                                                        ({{ $item->ingredients }})
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <h6 class=" text-end">€ {{ $item->price }}</h6>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="container text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-10 col-lg-6 menu-category-card menu-category-card--narrow">
                            <div class="menu-card-header">
                                <h3 class="menu-card-title">Nota basilico</h3>
                                <p class="menu-card-subtitle">In tutte le pizze c'è l'aggiunta del basilico.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center mt-5">
                    <div class="row">
                        <div class="col-10 col-md-8 col-lg-4 mx-auto">
                            <h5 class="menu-note menu-note--boxed">
                                Si segnala ai signori clienti che in questo esercizio si servono alimenti freschi,
                                surgelati e congelati.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Sezione Allergeni -->
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mt-5 menu-category-card">
                <div class="menu-card-header">
                    <h3 class="menu-card-title">Informazioni sugli allergeni</h3>
                    <p class="menu-card-subtitle">
                        Alcuni dei nostri piatti potrebbero contenere allergeni. Se hai intolleranze o allergie
                        alimentari, informaci al momento dell'ordinazione.
                    </p>
                </div>
                @foreach ($menuCategories as $category)
                    @if ($category->name == 'Allergeni')
                        @foreach ($category->menuItems as $item)
                            <div class="row">
                                <hr class="menu-divider my-4">
                                <div class="col-12">
                                    <h6 class="text-center">{{ $item->name }}</h6>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach

                <div class="col-9 mx-auto">
                    <p class="text-center">
                    <h5 class=" my-5">Per ulteriori informazioni non esitare a contattarci.</h5>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>