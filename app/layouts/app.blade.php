<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'GameDealCholo') }} | Plataforma de Ofertas</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2563eb; /* Un azul corporativo moderno */
            --bg-color: #f3f4f6; /* Gris súper sutil para el fondo */
            --text-main: #1f2937;
            --text-muted: #6b7280;
        }

        body { 
            background-color: var(--bg-color); 
            font-family: 'Inter', sans-serif; 
            color: var(--text-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Premium */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px); /* Efecto cristalino moderno */
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .navbar-brand { letter-spacing: -0.5px; }
        .nav-link { font-weight: 500; color: var(--text-muted) !important; transition: color 0.2s; }
        .nav-link:hover { color: var(--primary-color) !important; }
        
        /* Botones refinados */
        .btn-primary-custom {
            background-color: var(--primary-color);
            color: white;
            border: none;
            font-weight: 500;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary-custom:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            color: white;
        }

        /* Utilidad para empujar el footer hacia abajo */
        main { flex: 1; }
    </style>

    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg py-3 sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 text-dark" href="ofertas">
                GameDeal<span style="color: var(--primary-color);">Cholo</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="/ofertas">Explorar Ofertas</a>
                    </li>
                    
                    @if(session()->has('firebase_user_id'))
                        <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-decoration-none p-0">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                            <a class="btn btn-primary-custom rounded-pill px-4 py-2" href="{{ route('register') }}">Crear Cuenta</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="d-flex align-items-center justify-content-center text-muted rounded-3" 
             style="height: 90px; background-color: #e5e7eb; border: 1px solid #d1d5db; font-size: 0.85rem;">
            Espacio reservado para anuncio publicitario
        </div>
    </div>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-1 text-muted small fw-medium">
                &copy; {{ date('Y') }} GameDealCholo. Todos los derechos reservados.
            </p>
            <p class="text-muted small mb-0">
                Plataforma de comparación y análisis de ofertas.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>