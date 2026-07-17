<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Bienvenido, {{ session('usuario_email') }}</h1>
        <a href="/ofertas" class="btn btn-primary">Ver ofertas</a>
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger mt-2">Cerrar sesion - Arigato</button>
        </form>
    </div>
</body>
</html>