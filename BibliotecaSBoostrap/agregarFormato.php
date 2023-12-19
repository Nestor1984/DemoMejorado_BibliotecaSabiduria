<?php
require_once("autoload.php");

if (isset($_POST['submit'])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];

    $objUsuario = new Formatos();
    $insert = $objUsuario->insertFormatos($nombre, $descripcion);

    if ($insert) {
        echo "Usuario insertado con éxito. ID: " . $insert;
        header("Location: sistema.php");
    } else {
        echo "Error al insertar usuario.";
    }
}
?>

