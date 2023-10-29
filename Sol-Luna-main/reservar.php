<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de fecha y bungalow</title>
    <link rel="stylesheet" href="css/style-reservar.css">
</head>
<body>
    <h1>Selección de fecha y bungalow</h1>
    <p>Selecciona las fechas de tu reserva y el bungalow deseado:</p>
    <section class="reservation-form">
        <div class="container">
            <h2>Formulario de reserva</h2>
            <form action="reservar.php" method="post">
                <label for="fecha_inicio">Fecha de llegada:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required min="<?php echo date('Y-m-d'); ?>">
                
                <label for="fecha_fin">Fecha de salida:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required min="<?php echo date('Y-m-d'); ?>">
                
                <button type="submit">Verificar Disponibilidad</button>
            </form>
        </div>
    </section>

    <?php
    if (isset($_POST['fecha_inicio'], $_POST['fecha_fin'])) {
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];

        // Realiza la consulta para verificar la disponibilidad
        require 'php/conexion_be.php';
        $sql = "SELECT * FROM bungalows WHERE id_bungalow NOT IN (SELECT id_bungalow FROM reservas WHERE ('$fecha_inicio' <= fecha_fin AND '$fecha_fin' >= fecha_inicio))";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Bungalows disponibles para las fechas seleccionadas:</h2>";
            echo "<form action='php/guardar_reserva.php' method='post'>";

            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<label>";
                echo "<input type='radio' name='id_bungalow' value='" . $row['id_bungalow'] . "'>";
                echo "Bungalow ID: " . $row["id_bungalow"];
                echo "</label>";
                echo "<p>Habitaciones: " . $row["num_habitaciones"] . "</p>";
                echo "<p>Max Inquilinos: " . $row["max_inquilinos"] . "</p>";
                echo "<p>Distancia a la playa: " . $row["distancia_playa"] . "</p>";
                echo "<p>Bloque: " . $row["bloque"] . "</p>";
                echo "<p>Precio: $" . $row["precio"] . "</p>";
                echo "</div>";
            }

            echo "<label for='fecha_inicio' style='display: none;'>";
            echo "<input type='date' id='fecha_inicio' name='fecha_inicio' value='$fecha_inicio' style='display: none;'>";
            echo "</label>";
            echo "<label for='fecha_fin' style='display: none;'>";
            echo "<input type='date' id='fecha_fin' name='fecha_fin' value='$fecha_fin' style='display: none;'>";
            echo "</label>";

            echo "<button type='submit'>Reservar</button>";
            echo "</form>";
        } else {
            echo "<p>No hay bungalows disponibles para las fechas seleccionadas.</p>";
        }
    }
    ?>
    </div>
</body>
</html>
