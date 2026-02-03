# 🍕 Don Magnifico - Ristorante Pizzeria

Sito web completo per il ristorante pizzeria **Don Magnifico**, sviluppato con Laravel 12.

> Refactor completo di un sito originariamente realizzato in PHP senza framework, ora con architettura MVC, pannello admin e sistema partnership B&B.

---

## 📋 Indice

- [Panoramica](#-panoramica)
- [Requisiti di Sistema](#-requisiti-di-sistema)
- [Installazione](#-installazione)
- [Struttura del Progetto](#-struttura-del-progetto)
- [Pagine Pubbliche](#-pagine-pubbliche)
- [Pannello Admin](#-pannello-admin)
- [Sistema B&B Partner](#-sistema-bb-partner)
- [Sicurezza](#-sicurezza)
- [Comandi Utili](#-comandi-utili)
- [Deploy in Produzione](#-deploy-in-produzione)

---

## 🎯 Panoramica

Don Magnifico è un sito web professionale per ristorante che include:

- **Sito pubblico** con menu, informazioni, contatti e recensioni
- **Pannello di amministrazione** nascosto per gestire menu e contenuti
- **Sistema partnership B&B** con codici sconto e QR code per ospiti
- **Design responsive** ottimizzato per mobile e desktop
- **SEO ottimizzato** con sitemap e meta tag

---

## 💻 Requisiti di Sistema

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **MySQL** >= 8.0
- **Estensioni PHP**: BCMath, Ctype, cURL, DOM, Fileinfo, JSON, Mbstring, OpenSSL, PCRE, PDO, Tokenizer, XML

---

## 🚀 Installazione

### 1. Clona il repository
```bash
git clone https://github.com/tuouser/donmagnifico.git
cd donmagnifico
```

### 2. Installa le dipendenze
```bash
composer install
npm install
```

### 3. Configura l'ambiente
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configura il database
Modifica `.env` con le credenziali del tuo database:
```env
DB_DATABASE=don_magnifico
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Esegui migrazioni e seeders
```bash
php artisan migrate
php artisan db:seed
```

### 6. Compila gli asset
```bash
npm run build
```

### 7. Avvia il server di sviluppo
```bash
php artisan serve
```

---

## 📁 Struttura del Progetto

```
donmagnifico/
├── app/
│   ├── Http/Controllers/
│   │   ├── AdminController.php      # CRUD pannello admin
│   │   ├── AuthController.php       # Login/logout admin
│   │   ├── LunchMenuController.php  # Menu pranzo e pagina B&B
│   │   └── MenuController.php       # Menu pubblico
│   └── Models/
│       ├── BebPartner.php           # B&B partner con codici sconto
│       ├── LunchMenu.php            # Menu pranzo
│       ├── MenuCategory.php         # Categorie menu
│       ├── MenuItem.php             # Piatti del menu
│       └── User.php                 # Utenti admin
├── database/
│   ├── migrations/                  # Struttura database
│   └── seeders/                     # Dati iniziali
├── resources/
│   ├── css/                         # Stili CSS
│   ├── js/                          # JavaScript
│   └── views/                       # Template Blade
├── routes/
│   └── web.php                      # Definizione route
└── public/
    ├── .htaccess                    # Configurazione Apache
    ├── robots.txt                   # Direttive SEO
    └── sitemap.xml                  # Sitemap per motori di ricerca
```

---

## 🌐 Pagine Pubbliche

| URL | Descrizione |
|-----|-------------|
| `/` | **Homepage** - Hero, chi siamo, contatti, recensioni |
| `/menu` | **Menu completo** - Tutte le categorie e piatti |
| `/menu-pranzo` | **Menu pranzo** - Menu fissi per il pranzo (pubblico) |
| `/privacy` | **Privacy Policy** - Informativa sulla privacy |
| `/cookie` | **Cookie Policy** - Politica sui cookie |
| `/termini` | **Termini e Condizioni** - Termini di servizio |
| `/qrcode/menuqr` | **Menu QR** - Versione ottimizzata per scansione QR |

### Pagine di Errore Personalizzate
- `403` - Accesso negato
- `404` - Pagina non trovata
- `419` - Sessione scaduta
- `500` - Errore del server

---

## 👨‍💼 Pannello Admin

### Accesso
- **URL:** `/admin-login` (nascosto, non indicizzato)
- **Rate Limiting:** 5 tentativi al minuto
- **Credenziali:** Configurate in `.env` (ADMIN_EMAIL, ADMIN_PASSWORD)

### Funzionalità

#### 🔑 Gestione Password
- Cambio password amministratore
- Validazione password attuale
- Minimo 8 caratteri

#### 📂 Gestione Categorie Menu
- Crea nuove categorie (es: Pizze, Primi, Secondi, Dolci)
- Modifica nome categoria
- Elimina categoria (attenzione: elimina anche i piatti associati)

#### 🍽️ Gestione Piatti
- Aggiungi nuovo piatto con:
  - Nome
  - Categoria di appartenenza
  - Prezzo
  - Ingredienti (opzionale)
- Modifica piatto esistente
- Elimina piatto
- Visualizzazione organizzata per categoria

#### ☀️ Gestione Menu Pranzo
- Crea menu pranzo con:
  - Nome (es: "Menu Turistico")
  - Descrizione breve
  - Elenco piatti inclusi
  - Prezzo
  - Ordine di visualizzazione
  - Stato attivo/disattivo
- I menu attivi appaiono sia in `/menu-pranzo` che in `/pranzo`

#### 🏨 Gestione B&B Partner
- Aggiungi nuovo B&B partner con:
  - Nome struttura
  - Nome referente
  - Telefono e email
  - Codice sconto univoco (es: BELLAVISTA2026)
  - Tipo sconto (percentuale o fisso)
  - Valore sconto
  - Periodo validità (da/a)
  - Note interne
  - Stato attivo/disattivo
- **Generazione QR Code** per ogni partner
- Download QR Code come immagine PNG

### UI/UX Admin
- Design responsive (funziona su mobile)
- Layout a cards per B&B partner
- Modal per modifiche inline
- Conferma personalizzata per eliminazioni
- Pulsante "Torna su" flottante
- Navigazione con anchor (resta sulla sezione dopo salvataggio)

---

## 🏨 Sistema B&B Partner

### Come Funziona

1. **Admin crea un B&B Partner** nel pannello admin con codice univoco
2. **Genera il QR Code** e lo scarica
3. **Il B&B stampa il QR** e lo mette nelle camere
4. **Gli ospiti scansionano** il QR e accedono alla pagina esclusiva
5. **Vedono i menu pranzo** con lo sconto applicato

### Pagine del Sistema

| URL | Accesso | Descrizione |
|-----|---------|-------------|
| `/menu-pranzo` | Pubblico | Menu pranzo senza sconti |
| `/pranzo?code=CODICE` | Con codice | Menu pranzo CON sconto B&B |

### Visualizzazione Sconto
- Banner colorato con nome B&B e validità
- Prezzo originale barrato
- Prezzo scontato in verde
- Risparmio evidenziato

### Esempio URL per QR Code
```
https://donmagnifico.it/pranzo?code=BELLAVISTA2026
```

---

## 🔒 Sicurezza

### Protezioni Implementate

| Misura | Descrizione |
|--------|-------------|
| **Force HTTPS** | Redirect automatico da HTTP a HTTPS |
| **Rate Limiting** | 5 tentativi login/minuto |
| **Session Encrypt** | Sessioni crittografate |
| **Secure Cookies** | Cookie solo su HTTPS |
| **BCRYPT Rounds** | 12 round per hash password |
| **X-Frame-Options** | Protezione clickjacking |
| **X-XSS-Protection** | Protezione XSS |
| **X-Content-Type-Options** | Prevenzione MIME sniffing |
| **Referrer-Policy** | Controllo header referrer |
| **Permissions-Policy** | Blocco geolocation, camera, microfono |

### File Protetti
- `.env`, `.git`, `.log`, `.sql`, `.bak` bloccati via .htaccess
- `/admin`, `/admin-login`, `/pranzo` esclusi da robots.txt

---

## ⚡ Comandi Utili

### Sviluppo
```bash
# Avvia server sviluppo
php artisan serve

# Compila asset in watch mode
npm run dev

# Compila per produzione
npm run build
```

### Database
```bash
# Esegui migrazioni
php artisan migrate

# Rollback ultima migrazione
php artisan migrate:rollback

# Reset completo database
php artisan migrate:fresh --seed
```

### Cache (Produzione)
```bash
# Ottimizza per produzione
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Pulisci cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Manutenzione
```bash
# Attiva modalità manutenzione
php artisan down

# Disattiva modalità manutenzione
php artisan up
```

---

## 🚀 Deploy in Produzione

### 1. Prepara il server
- PHP 8.2+ con estensioni richieste
- MySQL 8.0+
- Composer installato
- SSL/HTTPS configurato

### 2. Carica i file
```bash
git clone https://github.com/tuouser/donmagnifico.git
cd donmagnifico
```

### 3. Installa dipendenze (senza dev)
```bash
composer install --no-dev --optimize-autoloader
```

### 4. Configura ambiente
```bash
cp .env.production .env
# Oppure copia .env.example e modifica i valori
```

### 5. Valori critici .env per produzione
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://donmagnifico.it

SESSION_SECURE_COOKIE=true
SESSION_DOMAIN=donmagnifico.it

# Credenziali database di produzione
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...

# Credenziali admin
ADMIN_EMAIL=admin@donmagnifico.it
ADMIN_PASSWORD=PasswordMoltoSicura!
```

### 6. Setup database e cache
```bash
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Permessi cartelle
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## 📊 Database Schema

### Tabelle Principali

#### `users`
| Campo | Tipo | Descrizione |
|-------|------|-------------|
| id | bigint | ID univoco |
| name | string | Nome utente |
| email | string | Email (unique) |
| password | string | Password hash |

#### `menu_categories`
| Campo | Tipo | Descrizione |
|-------|------|-------------|
| id | bigint | ID univoco |
| name | string | Nome categoria |

#### `menu_items`
| Campo | Tipo | Descrizione |
|-------|------|-------------|
| id | bigint | ID univoco |
| category_id | bigint | FK categoria |
| name | string | Nome piatto |
| ingredients | text | Ingredienti |
| price | decimal | Prezzo |

#### `lunch_menus`
| Campo | Tipo | Descrizione |
|-------|------|-------------|
| id | bigint | ID univoco |
| name | string | Nome menu |
| description | string | Descrizione |
| courses | text | Piatti inclusi |
| price | decimal | Prezzo |
| sort_order | int | Ordine visualizzazione |
| is_active | boolean | Attivo/disattivo |

#### `beb_partners`
| Campo | Tipo | Descrizione |
|-------|------|-------------|
| id | bigint | ID univoco |
| name | string | Nome B&B |
| contact_name | string | Nome referente |
| phone | string | Telefono |
| email | string | Email |
| code | string | Codice sconto (unique) |
| discount_type | enum | percentage/fixed |
| discount_value | decimal | Valore sconto |
| valid_from | date | Inizio validità |
| valid_until | date | Fine validità |
| is_active | boolean | Attivo/disattivo |
| notes | text | Note interne |

---

## 🛠️ Tecnologie Utilizzate

- **Backend:** Laravel 12, PHP 8.2
- **Frontend:** Blade, CSS Custom, JavaScript Vanilla
- **Build Tool:** Vite
- **Database:** MySQL 8
- **Icons:** Font Awesome 6
- **QR Code:** qrcode.js (client-side)

---

## 📝 Note di Sviluppo

### Convenzioni
- Lingua italiana per UI e messaggi
- Commenti in italiano
- Route in italiano (dove sensato)
- Prezzi in formato europeo (€ 12,50)

### Struttura CSS
- `app.css` - Stili globali e variabili
- `navbar.css` - Navigazione
- `footer.css` - Footer
- `menu.css` - Pagine menu
- `admin.css` - Pannello admin
- `errors.css` - Pagine errore

---

## 📞 Supporto

Per problemi o domande:
- Controlla i log in `storage/logs/laravel.log`
- Verifica la configurazione in `.env`
- Esegui `php artisan config:clear` dopo modifiche a `.env`

---

## 📄 Licenza

Progetto proprietario - Tutti i diritti riservati.
Il codice è pubblico a fini di consultazione, ma non è distribuito come software open source.

---

*Ultimo aggiornamento: Febbraio 2026*
