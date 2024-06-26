<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Raíz Cuadrada</title>
</head>
<body>

<h2>Calculadora de Raíz Cuadrada</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="numero">Ingresa un número:</label>
    <input type="number" name="numero" id="numero" required>
    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha enviado un valor numérico
    if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {
        // Obtiene el número ingresado por el usuario
        $numero = $_POST["numero"];
        
        // Calcula la raíz cuadrada
        $raizCuadrada = sqrt($numero);

        // Imprime el resultado
        echo "<p>La raíz cuadrada de $numero es: $raizCuadrada</p>";
    } else {
        // Si no se ingresa un número válido, muestra un mensaje de error
        echo "<p>Por favor, ingresa un número válido.</p>";
    }
}
?>

</body>
</html>
