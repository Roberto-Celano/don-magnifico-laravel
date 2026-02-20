<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Pannello Admin - Don Magnifico</title>
    <link rel="icon" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    @vite(['resources/css/admin.css'])
</head>
<body class="admin-layout">
    <!-- Header -->
    <header class="admin-header">
        <div class="container">
            <div class="admin-header-content">
                <div class="admin-header-left">
                    <img src="{{ asset('img/logo/logoDonMagnifico.webp') }}" alt="Don Magnifico" class="admin-logo">
                    <h1 class="admin-title">
                        <span>Pannello Amministrativo</span>
                    </h1>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="admin-logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Esci
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="admin-container">
        
        <!-- Messaggi Flash -->
        @if (session('success'))
            <div class="admin-message admin-message--success">
                <i class="fas fa-check-circle"></i> 
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="admin-message admin-message--error">
                <i class="fas fa-exclamation-circle"></i> 
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="admin-message admin-message--error">
                <i class="fas fa-exclamation-circle"></i> 
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <!-- Sezione Cambia Password -->
        <section id="password" class="admin-section">
            <h2 class="admin-section-title">
                <i class="fas fa-key"></i> 
                <span>Cambia Password</span>
            </h2>

            <form method="POST" action="{{ route('admin.password.update') }}" class="admin-form">
                @csrf
                @method('PUT')
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="current_password" class="admin-label">Password Attuale</label>
                        <input type="password" id="current_password" name="current_password" class="admin-input has-toggle" required>
                        <button type="button" class="auth-password-toggle" onclick="togglePasswordAdmin('current_password')" aria-label="Mostra/Nascondi password">
                            <i class="fas fa-eye" id="current_password-icon"></i>
                        </button>
                    </div>
                    <div class="admin-form-group">
                        <label for="new_password" class="admin-label">Nuova Password</label>
                        <input type="password" id="new_password" name="new_password" class="admin-input has-toggle" required minlength="8">
                        <button type="button" class="auth-password-toggle" onclick="togglePasswordAdmin('new_password')" aria-label="Mostra/Nascondi password">
                            <i class="fas fa-eye" id="new_password-icon"></i>
                        </button>
                    </div>
                    <div class="admin-form-group">
                        <label for="new_password_confirmation" class="admin-label">Conferma Password</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="admin-input has-toggle" required minlength="8">
                        <button type="button" class="auth-password-toggle" onclick="togglePasswordAdmin('new_password_confirmation')" aria-label="Mostra/Nascondi password">
                            <i class="fas fa-eye" id="new_password_confirmation-icon"></i>
                        </button>
                    </div>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    <i class="fas fa-lock"></i> Aggiorna Password
                </button>
            </form>
        </section>

        <!-- Sezione Gestione Categorie -->
        <section id="categorie" class="admin-section">
            <h2 class="admin-section-title">
                <i class="fas fa-layer-group"></i> 
                <span>Gestione Categorie</span>
            </h2>

            <!-- Form Nuova Categoria -->
            <form method="POST" action="{{ route('admin.categories.store') }}" class="admin-form">
                @csrf
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="category_name" class="admin-label">Nome Categoria</label>
                        <input type="text" id="category_name" name="name" class="admin-input" required placeholder="Es: Antipasti, Primi, Pizze...">
                    </div>
                    <div class="admin-form-group">
                        <label for="category_position" class="admin-label">Ordine</label>
                        <input type="number" id="category_position" name="position" class="admin-input" required min="0" value="0" placeholder="0">
                    </div>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    <i class="fas fa-plus"></i> Aggiungi Categoria
                </button>
            </form>

            <!-- Tabella Categorie (Desktop) -->
            @if ($categories->count() > 0)
                <table class="admin-table d-none d-md-table">
                    <thead>
                        <tr>
                            <th>Nome Categoria</th>
                            <th>Ordine</th>
                            <th>Piatti</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td><span class="admin-badge admin-badge--position">{{ $category->position }}</span></td>
                                <td>{{ $category->menuItems->count() }} piatti</td>
                                <td>
                                    <div class="admin-actions">
                                        <button type="button" onclick="editCategory({{ $category->id }}, '{{ addslashes($category->name) }}', {{ $category->position }})" class="admin-btn admin-btn--secondary admin-btn--small" title="Modifica">
                                            <i class="fas fa-edit"></i><span class="btn-text"> Modifica</span>
                                        </button>
                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare la categoria e tutti i suoi piatti?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn--danger admin-btn--small" title="Elimina">
                                                <i class="fas fa-trash"></i><span class="btn-text"> Elimina</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Card Categorie (Mobile) -->
                <div class="category-cards d-flex flex-column d-md-none">
                    @foreach ($categories as $category)
                        <div class="category-card">
                            <div class="category-card-header">
                                <span class="category-card-title">{{ $category->name }}</span>
                                <span class="admin-badge admin-badge--position">{{ $category->position }}</span>
                            </div>
                            <div class="category-card-body">
                                <div class="category-card-info">
                                    <span class="category-card-label">Piatti</span>
                                    <span class="category-card-value">{{ $category->menuItems->count() }} piatti</span>
                                </div>
                            </div>
                            <div class="category-card-actions">
                                <button type="button" onclick="editCategory({{ $category->id }}, '{{ addslashes($category->name) }}', {{ $category->position }})" class="admin-btn admin-btn--secondary admin-btn--small">
                                    <i class="fas fa-edit"></i> Modifica
                                </button>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare la categoria e tutti i suoi piatti?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn--danger admin-btn--small">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="admin-empty">
                    <div class="admin-empty-icon"><i class="fas fa-inbox"></i></div>
                    <p>Nessuna categoria presente.<br>Creane una per iniziare!</p>
                </div>
            @endif
        </section>

        <!-- Sezione Gestione Piatti -->
        <section id="piatti" class="admin-section">
            <h2 class="admin-section-title">
                <i class="fas fa-pizza-slice"></i> 
                <span>Gestione Piatti</span>
            </h2>

            <!-- Form Nuovo Piatto -->
            <form method="POST" action="{{ route('admin.items.store') }}" class="admin-form">
                @csrf
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="item_name" class="admin-label">Nome Piatto</label>
                        <input type="text" id="item_name" name="name" class="admin-input" required placeholder="Es: Margherita, Carbonara...">
                    </div>
                    <div class="admin-form-group">
                        <label for="item_category" class="admin-label">Categoria</label>
                        <select id="item_category" name="category_id" class="admin-select" required>
                            <option value="">Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="admin-form-group">
                        <label for="item_price" class="admin-label">Prezzo (€)</label>
                        <input type="number" id="item_price" name="price" class="admin-input" required min="0" step="0.01" placeholder="12.50">
                    </div>
                </div>
                <div class="admin-form-group">
                    <label for="item_ingredients" class="admin-label">Ingredienti (opzionale)</label>
                    <textarea id="item_ingredients" name="ingredients" class="admin-textarea" placeholder="Descrivi gli ingredienti del piatto..."></textarea>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    <i class="fas fa-plus"></i> Aggiungi Piatto
                </button>
            </form>

            <!-- Lista Piatti per Categoria -->
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    @if ($category->menuItems->count() > 0)
                        <h3 class="admin-category-title">
                            <i class="fas fa-angle-right"></i> {{ $category->name }}
                        </h3>
                        
                        <!-- Tabella Piatti (Desktop) -->
                        <table class="admin-table d-none d-md-table">
                            <thead>
                                <tr>
                                    <th>Piatto</th>
                                    <th>Ingredienti</th>
                                    <th>Prezzo</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->menuItems->sortBy('price') as $item)
                                    <tr>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td style="max-width: 280px; color: #666;">{{ Str::limit($item->ingredients, 80) ?? '—' }}</td>
                                        <td><strong style="color: var(--dm-burgundy);">€ {{ number_format($item->price, 2, ',', '.') }}</strong></td>
                                        <td>
                                            <div class="admin-actions">
                                                <button type="button" onclick="editItem({{ $item->id }}, '{{ addslashes($item->name) }}', `{{ addslashes($item->ingredients ?? '') }}`, {{ $item->price }}, {{ $item->category_id }})" class="admin-btn admin-btn--secondary admin-btn--small" title="Modifica">
                                                    <i class="fas fa-edit"></i><span class="btn-text"> Modifica</span>
                                                </button>
                                                <form method="POST" action="{{ route('admin.items.destroy', $item) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare questo piatto?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="admin-btn admin-btn--danger admin-btn--small" title="Elimina">
                                                        <i class="fas fa-trash"></i><span class="btn-text"> Elimina</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Card Piatti (Mobile) -->
                        <div class="item-cards show-on-mobile d-none d-md-table mb-2">
                            @foreach ($category->menuItems->sortBy('price') as $item)
                                <div class="item-card">
                                    <div class="item-card-header">
                                        <span class="item-card-title">{{ $item->name }}</span>
                                        <span class="item-card-price">€ {{ number_format($item->price, 2, ',', '.') }}</span>
                                    </div>
                                    @if ($item->ingredients)
                                        <div class="item-card-body">
                                            <p class="item-card-ingredients">{{ $item->ingredients }}</p>
                                        </div>
                                    @endif
                                    <div class="item-card-actions">
                                        <button type="button" onclick="editItem({{ $item->id }}, '{{ addslashes($item->name) }}', `{{ addslashes($item->ingredients ?? '') }}`, {{ $item->price }}, {{ $item->category_id }})" class="admin-btn admin-btn--secondary admin-btn--small">
                                            <i class="fas fa-edit"></i> Modifica
                                        </button>
                                        <form method="POST" action="{{ route('admin.items.destroy', $item) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare questo piatto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn--danger admin-btn--small">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @else
                <div class="admin-empty">
                    <div class="admin-empty-icon"><i class="fas fa-utensils"></i></div>
                    <p>Crea prima una categoria<br>per poter aggiungere piatti!</p>
                </div>
            @endif
        </section>

        <!-- Sezione Menu Pranzo -->
        <section id="menu-pranzo" class="admin-section">
            <h2 class="admin-section-title">
                <i class="fas fa-sun"></i> 
                <span>Menu Pranzo</span>
            </h2>
            <p class="admin-section-subtitle">
                <i class="fas fa-info-circle"></i> 
                I menu inseriti qui saranno visibili sia nella pagina pubblica <strong>"Menu Pranzo"</strong> del sito, sia nella pagina esclusiva per gli ospiti dei B&B partner.
            </p>

            <!-- Form Nuovo Menu Pranzo -->
            <form method="POST" action="{{ route('admin.lunch-menus.store') }}" class="admin-form">
                @csrf
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="lunch_menu_name" class="admin-label">Nome Menu</label>
                        <input type="text" id="lunch_menu_name" name="name" class="admin-input" required placeholder="Es: Menu Turistico, Menu Degustazione...">
                    </div>
                    <div class="admin-form-group">
                        <label for="lunch_menu_price" class="admin-label">Prezzo (€)</label>
                        <input type="number" id="lunch_menu_price" name="price" class="admin-input" required min="0" step="0.01" placeholder="15.00">
                    </div>
                    <div class="admin-form-group">
                        <label for="lunch_menu_order" class="admin-label">Ordine</label>
                        <input type="number" id="lunch_menu_order" name="sort_order" class="admin-input" min="0" value="0" placeholder="0">
                    </div>
                </div>
                <div class="admin-form-group">
                    <label for="lunch_menu_description" class="admin-label">Descrizione breve (opzionale)</label>
                    <input type="text" id="lunch_menu_description" name="description" class="admin-input" placeholder="Es: Ideale per turisti, include bevanda">
                </div>
                <div class="admin-form-group">
                    <label for="lunch_menu_courses" class="admin-label">Piatti inclusi</label>
                    <textarea id="lunch_menu_courses" name="courses" class="admin-textarea" required placeholder="Primo a scelta&#10;Secondo con contorno&#10;Acqua e caffè inclusi"></textarea>
                </div>
                <div class="admin-form-row" style="align-items: center; gap: 1rem;">
                    <label class="admin-checkbox">
                        <input type="checkbox" name="is_active" value="1" checked>
                        <span>Attivo</span>
                    </label>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    <i class="fas fa-plus"></i> Aggiungi Menu Pranzo
                </button>
            </form>

            <!-- Tabella Menu Pranzo (Desktop) -->
            @if ($lunchMenus->count() > 0)
                <table class="admin-table d-none d-md-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Prezzo</th>
                            <th>Stato</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lunchMenus as $lunchMenu)
                            <tr>
                                <td><strong>{{ $lunchMenu->name }}</strong></td>
                                <td style="max-width: 250px; color: #666;">{{ Str::limit($lunchMenu->description, 60) ?? '—' }}</td>
                                <td><strong style="color: var(--dm-burgundy);">€ {{ number_format($lunchMenu->price, 2, ',', '.') }}</strong></td>
                                <td>
                                    @if ($lunchMenu->is_active)
                                        <span class="admin-badge admin-badge--success" title="Attivo"><i class="fas fa-check"></i></span>
                                    @else
                                        <span class="admin-badge admin-badge--danger" title="Disattivo"><i class="fas fa-times"></i></span>
                                    @endif
                                </td>
                                <td>
                                    <div class="admin-actions">
                                        <button type="button" onclick="editLunchMenu({{ $lunchMenu->id }}, '{{ addslashes($lunchMenu->name) }}', '{{ addslashes($lunchMenu->description ?? '') }}', `{{ addslashes($lunchMenu->courses) }}`, {{ $lunchMenu->price }}, {{ $lunchMenu->sort_order }}, {{ $lunchMenu->is_active ? 'true' : 'false' }})" class="admin-btn admin-btn--secondary admin-btn--small" title="Modifica">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" action="{{ route('admin.lunch-menus.destroy', $lunchMenu) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare questo menu pranzo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-btn admin-btn--danger admin-btn--small" title="Elimina">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Card Menu Pranzo (Mobile) -->
                <div class="lunch-cards d-flex flex-column d-md-none">
                    @foreach ($lunchMenus as $lunchMenu)
                        <div class="lunch-card {{ $lunchMenu->is_active ? '' : 'lunch-card--inactive' }}">
                            <div class="lunch-card-header">
                                <div class="lunch-card-title">
                                    <strong>{{ $lunchMenu->name }}</strong>
                                    @if ($lunchMenu->is_active)
                                        <span class="admin-badge admin-badge--success" title="Attivo"><i class="fas fa-check"></i></span>
                                    @else
                                        <span class="admin-badge admin-badge--danger" title="Disattivo"><i class="fas fa-times"></i></span>
                                    @endif
                                </div>
                                <strong class="lunch-card-price">€ {{ number_format($lunchMenu->price, 2, ',', '.') }}</strong>
                            </div>
                            @if ($lunchMenu->description)
                                <div class="lunch-card-body">
                                    <p class="lunch-card-desc">{{ Str::limit($lunchMenu->description, 80) }}</p>
                                </div>
                            @endif
                            <div class="lunch-card-actions">
                                <button type="button" onclick="editLunchMenu({{ $lunchMenu->id }}, '{{ addslashes($lunchMenu->name) }}', '{{ addslashes($lunchMenu->description ?? '') }}', `{{ addslashes($lunchMenu->courses) }}`, {{ $lunchMenu->price }}, {{ $lunchMenu->sort_order }}, {{ $lunchMenu->is_active ? 'true' : 'false' }})" class="admin-btn admin-btn--secondary admin-btn--small">
                                    <i class="fas fa-edit"></i> Modifica
                                </button>
                                <form method="POST" action="{{ route('admin.lunch-menus.destroy', $lunchMenu) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare questo menu pranzo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn--danger admin-btn--small">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="admin-empty">
                    <div class="admin-empty-icon"><i class="fas fa-sun"></i></div>
                    <p>Nessun menu pranzo presente.<br>Creane uno per i clienti dei B&B!</p>
                </div>
            @endif
        </section>

        <!-- Sezione B&B Partner -->
        <section id="beb-partners" class="admin-section">
            <h2 class="admin-section-title">
                <i class="fas fa-bed"></i> 
                <span>B&B Partner</span>
            </h2>

            <!-- Form Nuovo B&B Partner -->
            <form method="POST" action="{{ route('admin.beb-partners.store') }}" class="admin-form">
                @csrf
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="beb_name" class="admin-label">Nome B&B *</label>
                        <input type="text" id="beb_name" name="name" class="admin-input" required placeholder="Es: B&B Bellavista">
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_code" class="admin-label">Codice *</label>
                        <input type="text" id="beb_code" name="code" class="admin-input" required placeholder="Es: BELLAVISTA" style="text-transform: uppercase;">
                        <small style="color: #666; font-size: 0.8rem;">Codice univoco per il QR code</small>
                    </div>
                </div>
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="beb_contact" class="admin-label">Referente</label>
                        <input type="text" id="beb_contact" name="contact_name" class="admin-input" placeholder="Es: Mario Rossi">
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_phone" class="admin-label">Telefono</label>
                        <input type="text" id="beb_phone" name="phone" class="admin-input" placeholder="Es: +39 123 456 7890">
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_email" class="admin-label">Email</label>
                        <input type="email" id="beb_email" name="email" class="admin-input" placeholder="Es: info@bellavista.it">
                    </div>
                </div>
                <div class="admin-form-row">
                    <div class="admin-form-group">
                        <label for="beb_discount_type" class="admin-label">Tipo Sconto *</label>
                        <select id="beb_discount_type" name="discount_type" class="admin-select" required>
                            <option value="percentage">Percentuale (%)</option>
                            <option value="fixed">Fisso (€)</option>
                        </select>
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_discount_value" class="admin-label">Valore Sconto *</label>
                        <input type="number" id="beb_discount_value" name="discount_value" class="admin-input" required min="0" step="0.01" placeholder="10">
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_valid_from" class="admin-label">Valido dal</label>
                        <input type="date" id="beb_valid_from" name="valid_from" class="admin-input">
                    </div>
                    <div class="admin-form-group">
                        <label for="beb_valid_until" class="admin-label">Valido fino al</label>
                        <input type="date" id="beb_valid_until" name="valid_until" class="admin-input">
                    </div>
                </div>
                <div class="admin-form-row">
                    <div class="admin-form-group" style="flex: 2;">
                        <label for="beb_notes" class="admin-label">Note interne</label>
                        <input type="text" id="beb_notes" name="notes" class="admin-input" placeholder="Es: Accordo rinnovato a gennaio 2027">
                    </div>
                    <div class="admin-form-group" style="display: flex; align-items: center; padding-top: 1.5rem;">
                        <label class="admin-checkbox">
                            <input type="checkbox" name="is_active" value="1" checked>
                            <span>Attivo</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="admin-btn admin-btn--primary">
                    <i class="fas fa-plus"></i> Aggiungi B&B Partner
                </button>
            </form>

            <!-- B&B Partner Cards -->
            @if ($bebPartners->count() > 0)
                <div class="beb-cards">
                    @foreach ($bebPartners as $beb)
                        <div class="beb-card {{ $beb->is_active ? '' : 'beb-card--inactive' }}">
                            <div class="beb-card-header">
                                <div class="beb-card-title">
                                    <strong>{{ $beb->name }}</strong>
                                    @if ($beb->is_active)
                                        <span class="admin-badge admin-badge--success" title="Attivo"><i class="fas fa-check"></i></span>
                                    @else
                                        <span class="admin-badge admin-badge--danger" title="Disattivo"><i class="fas fa-times"></i></span>
                                    @endif
                                </div>
                                <code class="beb-card-code">{{ $beb->code }}</code>
                            </div>
                            <div class="beb-card-body">
                                <div class="beb-card-row">
                                    <span class="beb-card-label"><i class="fas fa-percent"></i> Sconto</span>
                                    <strong class="beb-card-value" style="color: var(--dm-gold);">{{ $beb->discount_type === 'percentage' ? $beb->discount_value . '%' : '€' . number_format($beb->discount_value, 2, ',', '.') }}</strong>
                                </div>
                                <div class="beb-card-row">
                                    <span class="beb-card-label"><i class="fas fa-calendar"></i> Validità</span>
                                    <span class="beb-card-value">
                                        @if ($beb->valid_from && $beb->valid_until)
                                            {{ $beb->valid_from->format('d/m/Y') }} - {{ $beb->valid_until->format('d/m/Y') }}
                                        @elseif ($beb->valid_from)
                                            Dal {{ $beb->valid_from->format('d/m/Y') }}
                                        @elseif ($beb->valid_until)
                                            Fino al {{ $beb->valid_until->format('d/m/Y') }}
                                        @else
                                            Sempre valido
                                        @endif
                                    </span>
                                </div>
                                @if ($beb->contact_name || $beb->phone)
                                    <div class="beb-card-row">
                                        <span class="beb-card-label"><i class="fas fa-user"></i> Contatto</span>
                                        <span class="beb-card-value">
                                            {{ $beb->contact_name ?? '' }}
                                            @if ($beb->phone)
                                                <a href="tel:{{ $beb->phone }}">{{ $beb->phone }}</a>
                                            @endif
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="beb-card-actions">
                                <button type="button" onclick="showQRCode('{{ $beb->code }}', '{{ addslashes($beb->name) }}')" class="admin-btn admin-btn--qr admin-btn--small">
                                    <i class="fas fa-qrcode"></i> QR
                                </button>
                                <button type="button" onclick="editBebPartner({{ $beb->id }}, '{{ addslashes($beb->name) }}', '{{ addslashes($beb->contact_name ?? '') }}', '{{ $beb->phone ?? '' }}', '{{ $beb->email ?? '' }}', '{{ $beb->code }}', '{{ $beb->discount_type }}', {{ $beb->discount_value }}, '{{ $beb->valid_from ? $beb->valid_from->format('Y-m-d') : '' }}', '{{ $beb->valid_until ? $beb->valid_until->format('Y-m-d') : '' }}', {{ $beb->is_active ? 'true' : 'false' }}, '{{ addslashes($beb->notes ?? '') }}')" class="admin-btn admin-btn--secondary admin-btn--small">
                                    <i class="fas fa-edit"></i> Modifica
                                </button>
                                <form method="POST" action="{{ route('admin.beb-partners.destroy', $beb) }}" style="display: inline;" onsubmit="return confirmDelete(this, 'Eliminare questo B&B Partner?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn admin-btn--danger admin-btn--small">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="admin-empty">
                    <div class="admin-empty-icon"><i class="fas fa-bed"></i></div>
                    <p>Nessun B&B partner registrato.<br>Aggiungi i B&B convenzionati per generare QR code personalizzati!</p>
                </div>
            @endif
        </section>
    </main>

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" aria-label="Torna su">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Modal Modifica Categoria -->
    <div id="editCategoryModal" class="admin-modal">
        <div class="admin-modal-content">
            <button type="button" class="admin-modal-close" onclick="closeEditCategory()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="admin-modal-title">
                <i class="fas fa-edit"></i> Modifica Categoria
            </h3>
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Nome Categoria</label>
                    <input type="text" name="name" id="edit_category_name" class="admin-input" required>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1.5rem;">
                    <label class="admin-label">Ordine</label>
                    <input type="number" name="position" id="edit_category_position" class="admin-input" required min="0">
                </div>
                <div class="admin-modal-actions">
                    <button type="submit" class="admin-btn admin-btn--primary">
                        <i class="fas fa-save"></i> Salva
                    </button>
                    <button type="button" onclick="closeEditCategory()" class="admin-btn admin-btn--cancel">
                        <i class="fas fa-times"></i> Annulla
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Modifica Piatto -->
    <div id="editItemModal" class="admin-modal">
        <div class="admin-modal-content">
            <button type="button" class="admin-modal-close" onclick="closeEditItem()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="admin-modal-title">
                <i class="fas fa-edit"></i> Modifica Piatto
            </h3>
            <form id="editItemForm" method="POST">
                @csrf
                @method('PUT')
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Nome Piatto</label>
                    <input type="text" name="name" id="edit_item_name" class="admin-input" required>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Categoria</label>
                    <select name="category_id" id="edit_item_category" class="admin-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Prezzo (€)</label>
                    <input type="number" name="price" id="edit_item_price" class="admin-input" required min="0" step="0.01">
                </div>
                <div class="admin-form-group" style="margin-bottom: 1.5rem;">
                    <label class="admin-label">Ingredienti</label>
                    <textarea name="ingredients" id="edit_item_ingredients" class="admin-textarea"></textarea>
                </div>
                <div class="admin-modal-actions">
                    <button type="submit" class="admin-btn admin-btn--primary">
                        <i class="fas fa-save"></i> Salva
                    </button>
                    <button type="button" onclick="closeEditItem()" class="admin-btn admin-btn--cancel">
                        <i class="fas fa-times"></i> Annulla
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Modifica Menu Pranzo -->
    <div id="editLunchMenuModal" class="admin-modal">
        <div class="admin-modal-content">
            <button type="button" class="admin-modal-close" onclick="closeEditLunchMenu()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="admin-modal-title">
                <i class="fas fa-edit"></i> Modifica Menu Pranzo
            </h3>
            <form id="editLunchMenuForm" method="POST">
                @csrf
                @method('PUT')
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Nome Menu</label>
                    <input type="text" name="name" id="edit_lunch_menu_name" class="admin-input" required>
                </div>
                <div class="admin-form-row" style="margin-bottom: 1rem;">
                    <div class="admin-form-group">
                        <label class="admin-label">Prezzo (€)</label>
                        <input type="number" name="price" id="edit_lunch_menu_price" class="admin-input" required min="0" step="0.01">
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Ordine</label>
                        <input type="number" name="sort_order" id="edit_lunch_menu_order" class="admin-input" min="0">
                    </div>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Descrizione</label>
                    <input type="text" name="description" id="edit_lunch_menu_description" class="admin-input">
                </div>
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Piatti inclusi</label>
                    <textarea name="courses" id="edit_lunch_menu_courses" class="admin-textarea" required></textarea>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1.5rem;">
                    <label class="admin-checkbox">
                        <input type="checkbox" name="is_active" id="edit_lunch_menu_active" value="1">
                        <span>Attivo</span>
                    </label>
                </div>
                <div class="admin-modal-actions">
                    <button type="submit" class="admin-btn admin-btn--primary">
                        <i class="fas fa-save"></i> Salva
                    </button>
                    <button type="button" onclick="closeEditLunchMenu()" class="admin-btn admin-btn--cancel">
                        <i class="fas fa-times"></i> Annulla
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Modifica B&B Partner -->
    <div id="editBebPartnerModal" class="admin-modal">
        <div class="admin-modal-content" style="max-width: 600px;">
            <button type="button" class="admin-modal-close" onclick="closeEditBebPartner()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="admin-modal-title">
                <i class="fas fa-edit"></i> Modifica B&B Partner
            </h3>
            <form id="editBebPartnerForm" method="POST">
                @csrf
                @method('PUT')
                <div class="admin-form-row" style="margin-bottom: 1rem;">
                    <div class="admin-form-group">
                        <label class="admin-label">Nome B&B *</label>
                        <input type="text" name="name" id="edit_beb_name" class="admin-input" required>
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Codice *</label>
                        <input type="text" name="code" id="edit_beb_code" class="admin-input" required style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="admin-form-row" style="margin-bottom: 1rem;">
                    <div class="admin-form-group">
                        <label class="admin-label">Referente</label>
                        <input type="text" name="contact_name" id="edit_beb_contact" class="admin-input">
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Telefono</label>
                        <input type="text" name="phone" id="edit_beb_phone" class="admin-input">
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Email</label>
                        <input type="email" name="email" id="edit_beb_email" class="admin-input">
                    </div>
                </div>
                <div class="admin-form-row" style="margin-bottom: 1rem;">
                    <div class="admin-form-group">
                        <label class="admin-label">Tipo Sconto</label>
                        <select name="discount_type" id="edit_beb_discount_type" class="admin-select" required>
                            <option value="percentage">Percentuale (%)</option>
                            <option value="fixed">Fisso (€)</option>
                        </select>
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Valore</label>
                        <input type="number" name="discount_value" id="edit_beb_discount_value" class="admin-input" required min="0" step="0.01">
                    </div>
                </div>
                <div class="admin-form-row" style="margin-bottom: 1rem;">
                    <div class="admin-form-group">
                        <label class="admin-label">Valido dal</label>
                        <input type="date" name="valid_from" id="edit_beb_valid_from" class="admin-input">
                    </div>
                    <div class="admin-form-group">
                        <label class="admin-label">Valido fino al</label>
                        <input type="date" name="valid_until" id="edit_beb_valid_until" class="admin-input">
                    </div>
                </div>
                <div class="admin-form-group" style="margin-bottom: 1rem;">
                    <label class="admin-label">Note interne</label>
                    <input type="text" name="notes" id="edit_beb_notes" class="admin-input">
                </div>
                <div class="admin-form-group" style="margin-bottom: 1.5rem;">
                    <label class="admin-checkbox">
                        <input type="checkbox" name="is_active" id="edit_beb_active" value="1">
                        <span>Attivo</span>
                    </label>
                </div>
                <div class="admin-modal-actions">
                    <button type="submit" class="admin-btn admin-btn--primary">
                        <i class="fas fa-save"></i> Salva
                    </button>
                    <button type="button" onclick="closeEditBebPartner()" class="admin-btn admin-btn--cancel">
                        <i class="fas fa-times"></i> Annulla
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal QR Code -->
    <div id="qrCodeModal" class="admin-modal">
        <div class="admin-modal-content" style="max-width: 500px;">
            <button type="button" class="admin-modal-close" onclick="closeQRCode()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="admin-modal-title">
                <i class="fas fa-qrcode"></i> <span id="qr_modal_title">QR Code & Link</span>
            </h3>
            <div style="text-align: center; padding: 1rem 0;">
                <!-- QR Code Image -->
                <div style="background: white; padding: 1.5rem; border-radius: 12px; display: inline-block; margin-bottom: 1.5rem;">
                    <img id="qr_code_image" src="" alt="QR Code" style="width: 200px; height: 200px;">
                </div>
                
                <!-- Link -->
                <div style="margin-bottom: 1.5rem;">
                    <label class="admin-label" style="text-align: left; display: block; margin-bottom: 0.5rem;">Link da condividere:</label>
                    <div style="display: flex; gap: 0.5rem;">
                        <input type="text" id="qr_link" class="admin-input" readonly style="flex: 1; font-size: 0.85rem;">
                        <button type="button" onclick="copyQRLink()" class="admin-btn admin-btn--primary" style="white-space: nowrap;">
                            <i class="fas fa-copy"></i> Copia
                        </button>
                    </div>
                    <p id="copy_feedback" style="color: #10b981; font-size: 0.85rem; margin-top: 0.5rem; display: none;">
                        <i class="fas fa-check"></i> Link copiato!
                    </p>
                </div>

                <!-- Download QR -->
                <div style="margin-bottom: 1rem;">
                    <a id="qr_download_link" href="" download="" class="admin-btn admin-btn--secondary" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-download"></i> Scarica QR Code
                    </a>
                </div>
                
                <!-- Info -->
                <p style="color: #94a3b8; font-size: 0.85rem; margin-top: 1rem;">
                    <i class="fas fa-info-circle"></i> Stampa il QR code o condividi il link con il B&B partner
                </p>
            </div>
            <div class="admin-modal-actions" style="justify-content: center;">
                <button type="button" onclick="closeQRCode()" class="admin-btn admin-btn--cancel">
                    <i class="fas fa-times"></i> Chiudi
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Conferma Eliminazione -->
    <div id="confirmDeleteModal" class="admin-modal">
        <div class="admin-modal-content" style="max-width: 420px;">
            <button type="button" class="admin-modal-close" onclick="closeConfirmDelete()" aria-label="Chiudi">
                <i class="fas fa-times"></i>
            </button>
            <div style="text-align: center; padding: 1rem 0;">
                <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-trash" style="font-size: 1.75rem; color: #dc3545;"></i>
                </div>
                <h3 class="admin-modal-title" style="justify-content: center; margin-bottom: 0.75rem;">
                    Conferma Eliminazione
                </h3>
                <p id="confirm_delete_message" style="color: #666; margin-bottom: 1.5rem;">
                    Sei sicuro di voler eliminare questo elemento?
                </p>
            </div>
            <div class="admin-modal-actions">
                <button type="button" onclick="closeConfirmDelete()" class="admin-btn admin-btn--cancel">
                    <i class="fas fa-arrow-left"></i> Annulla
                </button>
                <button type="button" id="confirm_delete_btn" class="admin-btn admin-btn--danger">
                    <i class="fas fa-trash"></i> Elimina
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password
        function togglePasswordAdmin(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + '-icon');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Modal Conferma Eliminazione
        let deleteFormToSubmit = null;
        
        function confirmDelete(form, message) {
            deleteFormToSubmit = form;
            document.getElementById('confirm_delete_message').textContent = message;
            document.getElementById('confirmDeleteModal').classList.add('is-open');
            return false; // Previeni submit
        }
        
        function closeConfirmDelete() {
            document.getElementById('confirmDeleteModal').classList.remove('is-open');
            deleteFormToSubmit = null;
        }
        
        document.getElementById('confirm_delete_btn').addEventListener('click', function() {
            if (deleteFormToSubmit) {
                deleteFormToSubmit.submit();
            }
        });

        // Modal Categoria
        function editCategory(id, name, position) {
            document.getElementById('edit_category_name').value = name;
            document.getElementById('edit_category_position').value = position;
            document.getElementById('editCategoryForm').action = '/admin/categories/' + id;
            document.getElementById('editCategoryModal').classList.add('is-open');
        }

        function closeEditCategory() {
            document.getElementById('editCategoryModal').classList.remove('is-open');
        }

        // Modal Piatto
        function editItem(id, name, ingredients, price, categoryId) {
            document.getElementById('edit_item_name').value = name;
            document.getElementById('edit_item_ingredients').value = ingredients;
            document.getElementById('edit_item_price').value = price;
            document.getElementById('edit_item_category').value = categoryId;
            document.getElementById('editItemForm').action = '/admin/items/' + id;
            document.getElementById('editItemModal').classList.add('is-open');
        }

        function closeEditItem() {
            document.getElementById('editItemModal').classList.remove('is-open');
        }

        // Modal Menu Pranzo
        function editLunchMenu(id, name, description, courses, price, sortOrder, isActive) {
            document.getElementById('edit_lunch_menu_name').value = name;
            document.getElementById('edit_lunch_menu_description').value = description;
            document.getElementById('edit_lunch_menu_courses').value = courses;
            document.getElementById('edit_lunch_menu_price').value = price;
            document.getElementById('edit_lunch_menu_order').value = sortOrder;
            document.getElementById('edit_lunch_menu_active').checked = isActive;
            document.getElementById('editLunchMenuForm').action = '/admin/lunch-menus/' + id;
            document.getElementById('editLunchMenuModal').classList.add('is-open');
        }

        function closeEditLunchMenu() {
            document.getElementById('editLunchMenuModal').classList.remove('is-open');
        }

        // Modal B&B Partner
        function editBebPartner(id, name, contactName, phone, email, code, discountType, discountValue, validFrom, validUntil, isActive, notes) {
            document.getElementById('edit_beb_name').value = name;
            document.getElementById('edit_beb_contact').value = contactName;
            document.getElementById('edit_beb_phone').value = phone;
            document.getElementById('edit_beb_email').value = email;
            document.getElementById('edit_beb_code').value = code;
            document.getElementById('edit_beb_discount_type').value = discountType;
            document.getElementById('edit_beb_discount_value').value = discountValue;
            document.getElementById('edit_beb_valid_from').value = validFrom;
            document.getElementById('edit_beb_valid_until').value = validUntil;
            document.getElementById('edit_beb_active').checked = isActive;
            document.getElementById('edit_beb_notes').value = notes;
            document.getElementById('editBebPartnerForm').action = '/admin/beb-partners/' + id;
            document.getElementById('editBebPartnerModal').classList.add('is-open');
        }

        function closeEditBebPartner() {
            document.getElementById('editBebPartnerModal').classList.remove('is-open');
        }

        // Modal QR Code
        function showQRCode(code, description) {
            const baseUrl = '{{ url("/pranzo") }}';
            const fullUrl = baseUrl + '?code=' + code;
            
            // Aggiorna titolo modal
            document.getElementById('qr_modal_title').textContent = description || code;
            
            // Aggiorna link
            document.getElementById('qr_link').value = fullUrl;
            
            // Genera QR code usando API gratuita
            const qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + encodeURIComponent(fullUrl);
            document.getElementById('qr_code_image').src = qrUrl;
            
            // Setup download link
            const downloadLink = document.getElementById('qr_download_link');
            downloadLink.href = qrUrl;
            downloadLink.download = 'qr-' + code + '.png';
            
            // Nascondi feedback copia
            document.getElementById('copy_feedback').style.display = 'none';
            
            // Apri modal
            document.getElementById('qrCodeModal').classList.add('is-open');
        }

        function closeQRCode() {
            document.getElementById('qrCodeModal').classList.remove('is-open');
        }

        function copyQRLink() {
            const linkInput = document.getElementById('qr_link');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // Per mobile
            
            navigator.clipboard.writeText(linkInput.value).then(function() {
                const feedback = document.getElementById('copy_feedback');
                feedback.style.display = 'block';
                setTimeout(function() {
                    feedback.style.display = 'none';
                }, 2000);
            });
        }

        // Chiudi modal cliccando fuori
        document.getElementById('editCategoryModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditCategory();
        });

        document.getElementById('editItemModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditItem();
        });

        document.getElementById('editLunchMenuModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditLunchMenu();
        });

        document.getElementById('editBebPartnerModal').addEventListener('click', function(e) {
            if (e.target === this) closeEditBebPartner();
        });

        document.getElementById('qrCodeModal').addEventListener('click', function(e) {
            if (e.target === this) closeQRCode();
        });

        document.getElementById('confirmDeleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeConfirmDelete();
        });

        // Chiudi modal con ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditCategory();
                closeEditItem();
                closeEditLunchMenu();
                closeEditBebPartner();
                closeQRCode();
                closeConfirmDelete();
            }
        });

        // Back to Top
        const backToTop = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('is-visible');
            } else {
                backToTop.classList.remove('is-visible');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
