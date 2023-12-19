<?php
require_once("autoload.php");

// Instancia de la clase Usuario para obtener la lista de usuarios
$objUsuario = new Usuarios();
$usuarios = $objUsuario->getUsuarios();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Biblioteca sabiduría</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="sistema.php">Agregar formato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sisLibros.php">Agregar libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sisEjemplares.php">Agregar Ejemplar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sisUsuarios.php">Agregar Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="centered-container">
        <div class="container mt-5">
            <h4 class="mb-4">Ingresar usuarios</h4> <br><br>

            <form action="agregarUsuario.php" method="post">
                <div class="mb-3">
                    <label for="nombres" class="form-label">Nombres del usuario:</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresar nombres. Ejemplo: Nestor Jhoel..." required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos del usuario:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresar apellidos. Ejemplo: Mamani Mamani..." required>
                </div>
                <div class="mb-3">
                    <label for="ci" class="form-label">CI:</label>
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingresar ci..." required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresar direccion..." required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresar telefono..." required>
                </div>
                <div class="mb-3">
                    <label for="email-u" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email-u" name="email-u" placeholder="Ingresar email. Ejemplo: nestorjhoel2@gmail.com..." required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Genero:</label>
                    <select class="form-select" id="genero" name="genero" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
            </form>

            <br><br><br><br>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>CI</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Genero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("Autoload.php");
                    foreach ($usuarios as $user) { ?>
                        <tr>
                            <td><?= $user['idUsuarios'] ?></td>
                            <td><?= $user['nombres'] ?></td>
                            <td><?= $user['apellidos'] ?></td>
                            <td><?= $user['ci'] ?></td>
                            <td><?= $user['direccion'] ?></td>
                            <td><?= $user['telefono'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['genero'] ?></td>
                            <td>
                                <a href="editarUsuarios.php?idUsuarios=<?= $user['idUsuarios']; ?>" class="btn btn-warning">Editar</a>
                                <a href="borrarUsuario.php?idUsuarios=<?= $user['idUsuarios']; ?>" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>