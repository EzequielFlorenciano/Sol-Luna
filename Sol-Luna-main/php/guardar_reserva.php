<?php
session_start();
require 'conexion_be.php';

// Verifica si el usuario ha iniciado sesión y obtén su correo
if (isset($_SESSION['usuario'])) {
    $correo_usuario = $_SESSION['usuario'];
} else {
    header("Location: ../login.php"); // Redirige al inicio de sesión si el usuario no ha iniciado sesión
    exit();
}

// Obtiene el ID del bungalow, las fechas y otros datos
if (isset($_POST['id_bungalow'], $_POST['fecha_inicio'], $_POST['fecha_fin'])) {
    $id_bungalow = $_POST['id_bungalow'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Establece el precio basado en el bloque del bungalow
    $precio = ($id_bungalow <= 5) ? 2400 : 1700;

    // Realiza la inserción en la tabla reservas
    require 'conexion_be.php'; // Asegúrate de incluir la conexión a la base de datos en este archivo

    $estado = "Pendiente"; // Estado predeterminado

    // Realiza la inserción en la tabla reservas utilizando el correo del usuario y el precio calculado
    $sql = "INSERT INTO reservas (id_bungalow, id, fecha_inicio, fecha_fin, precio, estado) VALUES ('$id_bungalow', (SELECT id FROM usuario WHERE correo = '$correo_usuario'), '$fecha_inicio', '$fecha_fin', '$precio', '$estado')";

    if ($conexion->query($sql) === TRUE) {
        // Redirige a la página de procesar pago
        header("Location: ../procesar_pago.php");
        exit(); // Asegúrate de detener la ejecución del script después de la redirección
    } else {
        echo "Error al guardar la reserva: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Error: Datos faltantes o inválidos.";
}
?>
