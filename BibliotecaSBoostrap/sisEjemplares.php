<?php
require_once("autoload.php");

$objEjemplar = new Ejemplares();
$ejemplares = $objEjemplar->getEjemplares();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplares</title>
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
            <h4 class="mb-4">Ingresar ejemplares</h4> <br><br>

            <form action="agregarEjemplares.php" method="post">
                <div class="mb-3">
                    <label for="idLibro" class="form-label">ID del libro:</label>
                    <input type="text" class="form-control" id="idLibro" name="idLibro" placeholder="Ingresar id del libro..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="disponible" value="Disponible" checked>
                        <label class="form-check-label" for="disponible">Disponible</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="estado" id="no-disponible" value="No disponible">
                        <label class="form-check-label" for="no-disponible">No disponible</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
            </form>

            <br><br><br><br>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID Ejemplar</th>
                        <th>ID Libro</th>
                        <th>Estado</th>
                        <th>Titulo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("Autoload.php");
                    foreach ($ejemplares as $user) { ?>
                        <tr>
                            <td><?= $user['idEjemplar'] ?></td>
                            <td><?= $user['idLibro'] ?></td>
                            <td><?= $user['estado'] ?></td>
                            <td><?= $user['titulo'] ?></td>
                            <td>
                                <a href="editarEjemplares.php?idEjemplar=<?= $user['idEjemplar']; ?>" class="btn btn-warning">Editar</a>
                                <a href="borrarEjemplar.php?idEjemplar=<?= $user['idEjemplar']; ?>" class="btn btn-danger">Borrar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>