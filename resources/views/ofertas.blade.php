<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GameDeals - Ofertas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar color negro -->
<div>
    
</nav>

<!-- Contenedor de ofertas -->
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