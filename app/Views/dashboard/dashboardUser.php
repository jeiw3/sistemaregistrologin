<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">Mi Sistema</span>

            <form action="<?= base_url('/logout') ?>" method="post" class="d-flex">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-body text-center">

                        <h3 class="card-title mb-3">
                            Bienvenido
                        </h3>

                        <h4 class="text-primary">
                            <?= esc($usuario) ?>
                        </h4>

                        <p class="text-muted mt-3">
                            Este es tu panel principal.
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>