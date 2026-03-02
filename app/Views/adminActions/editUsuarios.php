<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Panel Administrador</span>

            <form action="<?= base_url('logout') ?>" method="post" class="d-flex">
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
                    <div class="card-header bg-dark text-white">
                        Editar Usuario

                    <div class="card-body">
                        <?php if(session()->getFlashdata('error')):?>
                            <div class="alert alert-danger" role="alert">
                                <ul class="list-unstyled">
                                    <?php foreach(session()->getFlashdata('error') as $error):?>

                                        <li><?= $error?></li>
                                    
                                    <?php endforeach?>
                                </ul>

                            </div>
                        <?php endif?>

                        <form action="<?= base_url('admin/edituser/'.$infoUsuarioEdit->id); ?>" method="POST">
                            <?= csrf_field() ?>

                            <!-- Nombre -->
                            <div class="mb-3">
                                <label class="form-label">Nombre completo</label>
                                <input 
                                    type="text" 
                                    name="nombreCompleto" 
                                    class="form-control"
                                    value="<?= esc($infoUsuarioEdit->nombreCompleto) ?>"
                                    required
                                >
                            </div>

                            <!-- Username -->
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input 
                                    type="text" 
                                    name="username" 
                                    class="form-control"
                                    value="<?= esc($infoUsuarioEdit->username) ?>"
                                    required
                                >
                            </div>

                            <!-- Rol -->
                            <div class="mb-4">
                                <label class="form-label">Rol</label>
                                <select name="role" class="form-select" required>
                                    <option value="user" <?= $infoUsuarioEdit->role === 'user' ? 'selected' : '' ?>>
                                        User
                                    </option>
                                    <option value="admin" <?= $infoUsuarioEdit->role === 'admin' ? 'selected' : '' ?>>
                                        Admin
                                    </option>
                                </select>
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between">
                                <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">
                                    Cancelar
                                </a>

                                <button type="submit" class="btn btn-danger">
                                    Guardar cambios
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>