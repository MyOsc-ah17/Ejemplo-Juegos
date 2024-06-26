
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Potencia</title>
</head>
<body>

<h2>Calculadora de Potencia</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="base">Ingrese el número base:</label><br>
    <input type="text" id="base" name="base"><br><br>

    <label for="exponente">Ingrese el exponente:</label><br>
    <input type="text" id="exponente" name="exponente"><br><br>

    <input type="submit" value="Calcular">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $exponente = $_POST['exponente'];
    
    // Validar si se ingresaron números válidos
    if (!is_numeric($base) || !is_numeric($exponente)) {
        echo "Por favor ingrese números válidos.";
    } else {
        // Calcular la potencia
        $resultado = pow($base, $exponente);
        echo "El resultado de elevar $base a la potencia $exponente es: $resultado";
    }
}
?>

</body>
</html>
