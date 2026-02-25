<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#f5f7fa,#e4ecf5);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family: system-ui, -apple-system, sans-serif;
}

.login-card{
    max-width:420px;
    width:100%;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    border:none;
}

.brand-title{
    font-weight:600;
    letter-spacing:.3px;
}

.btn-primary{
    padding:10px;
    font-weight:500;
    border-radius:10px;
}

.form-control{
    border-radius:10px;
    padding:10px;
}

.register-link{
    text-decoration:none;
    font-size:.95rem;
}

.register-link:hover{
    text-decoration:underline;
}
</style>

</head>

<body>

<div class="card login-card p-4">
    
    <div class="card-body">

        <h4 class="text-center mb-2 brand-title">Bienvenido</h4>
        <p class="text-center text-muted mb-4">Ingresa a tu cuenta</p>

        <form method="post" action="<?= base_url('/login')?>">

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text"name="usernameUs" class="form-control" placeholder="Tu usuario">
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contraseñaUs" class="form-control" placeholder="Tu contraseña">
            </div>

            <div class="d-grid mb-3">
                <button class="btn btn-primary">Iniciar sesión</button>
            </div>

            <div class="text-center">
                <span class="text-muted">¿Eres nuevo?</span>
                <a href="<?= base_url('/registro')?>" class="register-link">Regístrate aquí</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
