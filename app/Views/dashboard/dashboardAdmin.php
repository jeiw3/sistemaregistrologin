<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar Admin -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
            <span class="navbar-brand fw-bold">Panel Administrador</span>

            <form action="<?= base_url('/logout') ?>" method="post" class="d-flex">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">

        <!-- Bienvenida -->
        <div class="card shadow mb-4 border-danger">
            <div class="card-body">
                <h4 class="card-title text-danger">
                    Bienvenido Administrador
                </h4>
                <p class="mb-0">
                    <?= esc($usuario) ?>
                </p>
            </div>
        </div>

        <!-- Gestión de Usuarios -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                Gestión de Usuarios
            </div>
            <?php if(session()->getFlashdata('success')):?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success')?>
                </div>
            <?php endif?>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>Nombre completo</th>
                                <th>Username</th>
                                <th>Rol</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($usuariosApp)) : ?>
                                <?php foreach ($usuariosApp as $usuario) : ?>
                                    <tr>
                                        <td><?= esc($usuario->nombreCompleto) ?></td>
                                        <td><?= esc($usuario->username) ?></td>
                                        <td>
                                            <span class="badge 
                                                <?= $usuario->role === 'admin' ? 'bg-danger' : 'bg-primary' ?>">
                                                <?= esc($usuario->role) ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <?php if($usuario->role==='admin'):?>
                                                <p class="text-small">Este eres tú</p>
                                            <?php endif;?>
                                            <?php if($usuario->role != 'admin'):?>
                                                <a href="<?= base_url('/admin/edituser/'.$usuario->id)?>" class="btn btn-sm btn-warning">
                                                Editar
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger">
                                                     Borrar
                                                </a>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        No hay usuarios registrados
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

</body>
</html>