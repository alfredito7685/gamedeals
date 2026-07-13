<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GameDeals - Ofertas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div>
    <h1>Ofertas de GameDeals</h1>

    <div class="row">
        @foreach ($ofertas as $oferta)
            <div>
                <div>
                    <img src="{{ $oferta['thumb'] }}" class="card-img-top" alt="{{ $oferta['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $oferta['title'] }}</h5>
                        <p class="card-text">
                            <span class="text-decoration-line-through text-muted">${{ $oferta['normalPrice'] }}</span>
                            <strong class="text-success"> ${{ $oferta['salePrice'] }}</strong>
                        </p>
                        <p-{{ round($oferta['savings']) }}%</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>