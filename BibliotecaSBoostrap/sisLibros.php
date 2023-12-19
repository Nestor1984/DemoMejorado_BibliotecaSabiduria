<?php
require_once("autoload.php");

$objLibro = new Libros();
$libros = $objLibro->getLibros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libros</title>
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
        <h4 class="mb-4">Ingresar libros</h4> <br><br>

        <form action="agregarLibros.php" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo del libro:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingresar titulo..." required>
            </div>
            <div class="mb-3">
                <label for="canPag" class="form-label">Cantidad de paginas:</label>
                <input type="number" class="form-control" id="canPag" name="canPag" placeholder="Ingresar cantidad de paginas..." required>
            </div>
            <div class="mb-3">
                <label for="fechaPubli" class="form-label">Fecha de publicacion:</label>
                <input type="date" class="form-control" id="fechaPubli" name="fechaPubli" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="12" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero:</label>
                <input type="text" class="form-control" id="genero" name="genero" placeholder="Ingresar genero..." required>
            </div>
            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma:</label>
                <input type="text" class="form-control" id="idioma" name="idioma" placeholder="Ingresar idioma..." required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Ingresar isbn..." required>
            </div>
            <div class="mb-3">
                <label for="idForm" class="form-label">ID del formato:</label>
                <input type="number" class="form-control" id="idForm" name="idForm" placeholder="Ingresar id del formato..." required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
        </form>

        <br><br><br><br>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID Libro</th>
                <th>Titulo</th>
                <th>Cantidad de paginas</th>
                <th>Fecha de publicacion</th>
                <th>Descripcion</th>
                <th>Genero</th>
                <th>Idioma</th>
                <th>ISBN</th>
                <th>ID Formato</th>
                <th>Nombre del formato</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            include_once("Autoload.php");
            foreach ($libros as $user){ ?>
                <tr>
                    <td><?= $user['idLibro'] ?></td>
                    <td><?= $user['titulo'] ?></td>
                    <td><?= $user['cantidadPaginas'] ?></td>
                    <td><?= $user['fechaPublicacion'] ?></td>
                    <td><?= $user['descripcion'] ?></td>
                    <td><?= $user['genero'] ?></td>
                    <td><?= $user['idioma'] ?></td>
                    <td><?= $user['isbn'] ?></td>
                    <td><?= $user['idFormato'] ?></td>
                    <td><?= $user['nombre'] ?></td>
                    <td>
                        <a href="editarLibros.php?idLibro=<?= $user['idLibro']; ?>" class="btn btn-warning">Editar</a>
                        <a href="borrarLibro.php?idLibro=<?= $user['idLibro']; ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
