<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idFormatos"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST['descripcion'];

    $objFormatos = new Formatos();
    $update = $objFormatos->updateFormato($id, $nombre, $descripcion);

    if ($update) {
        header("Location: sistema.php");
    } else {
        echo "Hubo un error";
    }
}
?>

<!-- Formulario para editar usuario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Formatos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Editar Formatos</h2>

    <?php
    // Obtener el ID del usuario de la URL
    $formatoId = isset($_GET['idFormatos']) ? $_GET['idFormatos'] : null;

    // Verificar si se proporcionó un ID válido
    if ($formatoId) {
        $objFormato = new Formatos();
        $formato = $objFormato->getFormato($formatoId);

        // Verificar si el usuario existe
        if ($formato) {
    ?>
            <!-- Formulario para editar usuario -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del formato:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" cols="20" rows="5" placeholder="Ingresar descripcion..." style="resize: none;"></textarea>
                </div>
                <input type="hidden" name="idFormatos" value="<?php echo htmlspecialchars($formatoId); ?>">
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Actualizar formato</button>
            </form>
    <?php
        } else {
            echo "Formato no encontrado.";
        }
    }
    ?>
</div>
</body>
</html>
