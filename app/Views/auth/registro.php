<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#4e73df,#224abe);
    height:100vh;
}

.card{
    border:none;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.form-control{
    border-radius:10px;
    padding:12px;
}

.btn-primary{
    border-radius:10px;
    padding:12px;
    font-weight:600;
}

.title{
    font-weight:700;
    color:#224abe;
}

.small-link{
    text-decoration:none;
    font-weight:500;
}

.small-link:hover{
    text-decoration:underline;
}
</style>
</head>

<body class="d-flex align-items-center justify-content-center">

<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 col-lg-4">

<div class="card p-4">

<h3 class="text-center mb-4 title">Crear cuenta</h3>

<form method="post" action="<?= base_url('/registro') ?>">

<?= csrf_field() ?>

<div class="mb-3">
<input type="text" name="nombreCompleto" value="<?= old("nombreCompleto")?>"  class="form-control <?= session('errors.nombreCompleto')?'is-invalid':''?>" placeholder="Nombre completo" required maxlength="10" >
<div class="is-invalid text-danger small"><?= validation_show_error('nombreCompleto')?></div>
</div>


<div class="mb-3">
<input type="text" name="username" value="<?= old("username")?>"  class="form-control <?= session('errors.username')?'is-invalid':''?>" placeholder="Usuario" required>
<div class="is-invalid text-danger small"><?= validation_show_error('username')?></div>
</div>


<div class="mb-3">
<input type="email" value="<?= old("email")?>"  name="email" class="form-control <?= session('errors.email')?'is-invalid':''?>"placeholder="Correo electrónico" required>
<div class="is-invalid text-danger small"><?= validation_show_error('email')?></div>
</div>


<div class="mb-3">
<input type="password" name="password" value="<?= old("password")?>" class="form-control  <?= session('errors.password')?'is-invalid':''?>" placeholder="Contraseña" required>
<div class="is-invalid text-danger small"><?= validation_show_error('password')?></div>
</div>


<div class="mb-3">
<input type="password" name="password_confirm" value="<?= old("password_confirm")?>"   class="form-control <?= session('errors.password_confirm')?'is-invalid':''?>" placeholder="Confirmar contraseña" required>
<div class="is-invalid text-danger small"><?= validation_show_error('password_confirm')?></div>
</div>

<div class="form-check mb-3">
<input class="form-check-input <?= session('errors.terminos')?'is-invalid':'' ?>" type="checkbox" name="terminos" >
<label class="form-check-label small">
Acepto los términos
</label>
</div>

<button type="submit" class="btn btn-primary w-100 mb-3 ">
Registrarme
</button>

<div class="text-center">
<a href="<?= base_url('/') ?>" class="small-link">
¿Ya tienes cuenta? Inicia sesión
</a>
</div>

</form>

</div>
</div>
</div>
</div>

</body>
</html>
