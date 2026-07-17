<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 400px;">
        <h3>Crear cuenta</h3>

        <form method="POST" action="/registro">
            @csrf
            <input type="email" name="email" placeholder="Correo" class="form-control mb-2">
            <input type="password" name="password" placeholder="Contraseña" class="form-control mb-2">
            <button class="btn btn-success">Registrarme</button>
        </form>

        <a href="/login">Ya tengo cuenta</a>
    </div>
</body>
</html>