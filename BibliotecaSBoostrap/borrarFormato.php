<?php
require_once("autoload.php");

// Verificar si se proporcionó un ID de usuario válido
if (isset($_GET['idFormatos'])) {
    $formatoId = $_GET['idFormatos'];

    $objForm = new Formatos();
    $delete = $objForm->delFormato($formatoId);

    if ($delete) {
        header("Location: sistema.php");
    } else {
        echo "Error al eliminar usuario.";
        exit();
    }
}
?>
