<?php
require_once("autoload.php");

// Instancia de la clase Usuario para obtener la lista de usuarios
$objFormato = new Formatos();
$formatos = $objFormato->getFormatos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formatos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>
<body>
<!--
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Biblioteca sabiduria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="sistema.php">Agregar formato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
-->
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
        <h4 class="mb-4">Ingresar formatos</h4> <br><br>

        <form action="agregarFormato.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del formato:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar formato..." required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="5" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Agregar</button>
        </form>

        <br><br><br><br>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            include_once("Autoload.php");
            foreach ($formatos as $user){ ?>
                <tr>
                    <td><?= $user['idFormatos'] ?></td>
                    <td><?= $user['nombre'] ?></td>
                    <td><?= $user['descripcion'] ?></td>
                    <td>
                        <a href="editarFormatos.php?idFormatos=<?= $user['idFormatos']; ?>" class="btn btn-warning">Editar</a>
                        <a href="borrarFormato.php?idFormatos=<?= $user['idFormatos']; ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
