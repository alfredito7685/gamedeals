<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GameDeals - Ofertas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar color negro -->
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bienvenido a GameDeals</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">inicio</a>
                </li>
                    <li class="nav-item">
                            <span class="me-3" style="color: GREEN;">{{ session('usuario_email') }}</span>
                            <form method="POST" action="/logout" style="display:inline;">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
                            </form>
                    </li>
                <li class="nav-item dropdown">
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Red dead redemption" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
            </div>
        </div>
    </nav>
</nav>

<!-- ofertas -->
    <div class="row">
        @foreach ($ofertas as $oferta)
            <div class="card" style="width: 18rem;">
                <div>
                    <img src="{{ $oferta['thumb'] }}" class="card-img-top" alt="{{ $oferta['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $oferta['title'] }}</h5>
                        <p class="card-text">
                            <span class="text-decoration-line-through text-muted">${{ $oferta['normalPrice'] }}</span>
                            <strong class="text-success"> ${{ $oferta['salePrice'] }}</strong>
                        </p>
                        <p class="card-text">
                            <span class="badge bg-danger">Ahorro: {{ round($oferta['savings']) }}%</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>