<?php
session_start(); // Iniciar una nueva sesión o reanudar la existente

// Verificar si ya se ha generado un número aleatorio
if (!isset($_SESSION['numero_secreto'])) {
    // Generar un número aleatorio entre 1 y 10
    $_SESSION['numero_secreto'] = rand(1, 10);
}

// Verificar si el usuario ha enviado una suposición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $suposicion = $_POST['suposicion'];
    if ($suposicion == $_SESSION['numero_secreto']) {
        $mensaje = "¡Correcto! El número era " . $_SESSION['numero_secreto'];
        // Opcional: reiniciar el juego
        unset($_SESSION['numero_secreto']);
    } else {
        $mensaje = "Incorrecto, intenta de nuevo.";
    }
} else {
    $mensaje = "Adivina el número entre 1 y 10.";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Adivinanzas</title>
</head>
<body>
    <h1><?php echo $mensaje; ?></h1>
    <form method="post">
        <input type="text" name="suposicion">
        <input type="submit" value="Adivinar">
    </form>
</body>
</html