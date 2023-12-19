<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idLibro"];
    $titulo = $_POST["titulo"];
    $canPag = $_POST["canPag"];
    $fechaPublicacion = $_POST["fechaPubli"];
    $descripcion = $_POST["descripcion"];
    $genero = $_POST["genero"];
    $idioma = $_POST["idioma"];
    $isbn = $_POST["isbn"];
    $idForm = $_POST["idForm"];

    $objLibros = new Libros();
    $update = $objLibros->updateLibros($id, $titulo, $canPag, $fechaPublicacion, $descripcion, $genero, $idioma, $isbn, $idForm);

    if ($update) {
        header("Location: sisLibros.php");
    } else {
        echo "Hubo un error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Libros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Editar Libros</h2>

    <?php
    // Obtener el ID del usuario de la URL
    $libroId = isset($_GET['idLibro']) ? $_GET['idLibro'] : null;

    // Verificar si se proporcionó un ID válido
    if ($libroId) {
        $objLibro = new Libros();
        $libro = $objLibro->getLibro($libroId);

        // Verificar si el usuario existe
        if ($libro) {
    ?>
            <!-- Formulario para editar usuario -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo del libro:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="canPag" class="form-label">Cantidad de paginas:</label>
                <input type="number" class="form-control" id="canPag" name="canPag" required>
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
                <input type="text" class="form-control" id="genero" name="genero" required>
            </div>
            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma:</label>
                <input type="text" class="form-control" id="idioma" name="idioma" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="mb-3">
                <label for="idForm" class="form-label">ID del formato:</label>
                <input type="number" class="form-control" id="idForm" name="idForm" required>
            </div>
                <input type="hidden" name="idLibro" value="<?php echo htmlspecialchars($libroId); ?>">
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Actualizar libro</button>
            </form>
    <?php
        } else {
            echo "Libro no encontrado.";
        }
    }
    ?>
</div>
</body>
</html>