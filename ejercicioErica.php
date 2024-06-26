<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Promedio de Alumnos</title>
</head>
<body>
    <center>
    <h2>Calcular Promedio de Alumnos</h2>
    <form method="post" action="">
        <label for="nombre">Nombre del Alumno:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="nota1">Calificación 1:</label><br>
        <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.01" required><br><br>

        <label for="nota2">Calificación 2:</label><br>
        <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.01" required><br><br>

        <label for="nota3">Calificación 3:</label><br>
        <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.01" required><br><br>

        <input type="submit" value="Calcular Promedio">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $nota1 = floatval($_POST['nota1']);
        $nota2 = floatval($_POST['nota2']);
        $nota3 = floatval($_POST['nota3']);

        $promedio = ($nota1 + $nota2 + $nota3) / 3;

        echo "<h3>Resultado:</h3>";
        echo "Nombre del Alumno: " . $nombre . "<br>";
        echo "Calificación 1: " . $nota1 . "<br>";
        echo "Calificación 2: " . $nota2 . "<br>";
        echo "Calificación 3: " . $nota3 . "<br>";
        echo "Promedio: " . number_format($promedio, 2) . "<br>";
    }

    
    ?>
    </center>
</body>
</html>
