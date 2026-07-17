<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <h3>Iniciar sesión</h3>

        @if (session('mensaje'))
            <p style="color: green;">{{ session('mensaje') }}</p>
        @endif

        @if ($errors->any())
            <p style="color: red;">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" placeholder="Correo" class="form-control mb-2">
            <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
            <button class="btn btn-primary">Entrar</button>
        </form>

        <a href="/registro">Crear cuenta</a>
    </div>
</body>
</html>