<?php


session_start();

// Generar un número aleatorio si no está ya generado
if (!isset($_SESSION['random_number'])) {
    $_SESSION['random_number'] = rand(1, 100);
}

// Inicializar el mensaje de respuesta
$message = "";
$message_class = "";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_guess = intval($_POST['guess']);
    
    if ($user_guess < $_SESSION['random_number']) {
        $message = "¡Demasiado bajo! Intenta de nuevo.";
        $message_class = "error";
    } elseif ($user_guess > $_SESSION['random_number']) {
        $message = "¡Demasiado alto! Intenta de nuevo.";
        $message_class = "error";
    } else {
        $message = "¡Felicitaciones! Adivinaste el número.";
        $message_class = "success";
        // Reiniciar el número aleatorio para jugar de nuevo
        unset($_SESSION['random_number']);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Juego de Adivinanza</title>
    
</head>

<body>
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;

    justify-content: center;
    height: 100vh;
}

section {
    position: relative;

}

header {
    position: relative;
    height: 10rem;
}

.tit {
    position: absolute;
    right: 30%;
    padding: 5%;

}

.container {
    position: absolute;
    right: 40%;
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 5%;
    height: fit-content;
}

h1 {
    color: #333;
}

p {
    color: #666;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
}

input[type="number"] {
    width: calc(100% - 22px);
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #28a745;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838;
}

.message {
    font-size: 16px;
    color: #333;
    margin-top: 20px;
}

.message.success {
    color: #28a745;
}

.message.error {
    color: #dc3545;
}
    </style>
    <header>
        <div class="tit">
           
        </div>
    </header>

    <section>
        <div class="container">
        <p>Jonathan Castillo Jimenez</p>
            <h1>Juego de Adivinanza de Números</h1>
            <p>Estoy pensando en un número entre 1 y 100. ¿Puedes adivinar cuál es?</p>
            <form method="post" action="">
                <label for="guess">Tu adivinanza:</label>
                <input type="number" id="guess" name="guess" required>
                <button type="submit">Adivinar</button>
            </form>
            <p class="message <?php echo $message_class; ?>"><?php echo $message; ?></p>
        </div>
    </section>
</body>

</html>





