<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Accedi - Don Magnifico</title>
    <link rel="icon" href="{{ asset('img/favicon/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    @vite(['resources/css/admin.css'])
</head>
<body class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-logo-icon">
                <img
        class="logo dm-logo"
        src={{ asset('img/logo/logoDonMagnifico.webp') }}
        alt="Logo Don Magnifico">
            </div>
            <h1 class="auth-logo">Don Magnifico</h1>
            <p class="auth-subtitle">Pannello Amministrativo</p>
        </div>
        <div class="auth-body">
            @if ($errors->any())
                <div class="auth-alert auth-alert--error">
                    <i class="fas fa-exclamation-circle"></i> 
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            @if (session('status'))
                <div class="auth-alert auth-alert--success">
                    <i class="fas fa-check-circle"></i> 
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                
                <div class="auth-form-group">
                    <label for="email" class="auth-label">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="auth-input" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        placeholder="admin@donmagnifico.it">
                </div>

                <div class="auth-form-group">
                    <label for="password" class="auth-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="auth-input has-toggle" 
                        required
                        placeholder="••••••••">
                    <button type="button" class="auth-password-toggle" onclick="togglePassword('password')" aria-label="Mostra/Nascondi password">
                        <i class="fas fa-eye" id="password-icon"></i>
                    </button>
                </div>

                <button type="submit" class="auth-btn">
                    <i class="fas fa-sign-in-alt"></i> Accedi
                </button>
            </form>

            <a href="{{ url('/') }}" class="auth-link">
                <i class="fas fa-arrow-left"></i> Torna al sito
            </a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
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
    </script>
</body>
</html>
