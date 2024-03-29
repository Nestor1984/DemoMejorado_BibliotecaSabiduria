<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $id = $_POST["idUsuarios"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $ci = $_POST["ci"];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email-u'];
    $genero = $_POST['genero'];

    $objUsuarios = new Usuarios();
    $update = $objUsuarios->updateUsuario($id, $nombres, $apellidos, $ci, $direccion, $telefono, $email, $genero);

    if ($update) {
        header("Location: sisUsuarios.php");
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
    <title>Editar Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="javascript/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Editar Usuarios</h2>

        <?php

        $usuarioId = isset($_GET['idUsuarios']) ? $_GET['idUsuarios'] : null;

        // Verificar si se proporcionó un ID válido
        if ($usuarioId) {
            $objUsuario = new Usuarios();
            $usuario = $objUsuario->getUsuario($usuarioId);

            // Verificar si el usuario existe
            if ($usuario) {
        ?>
                <!-- Formulario para editar usuario -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres del usuario:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos del usuario:</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="mb-3">
                        <label for="ci" class="form-label">CI:</label>
                        <input type="text" class="form-control" id="ci" name="ci" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-u" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email-u" name="email-u" required>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero:</label>
                        <select class="form-select" id="genero" name="genero" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                    <input type="hidden" name="idUsuarios" value="<?php echo htmlspecialchars($usuarioId); ?>">
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Actualizar usuario</button>
                </form>
        <?php
            } else {
                echo "Usuario no encontrado.";
            }
        }
        ?>
    </div>
</body>

</html>