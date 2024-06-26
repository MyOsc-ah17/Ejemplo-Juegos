<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Nombres de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            color: #333;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #218838;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin: 8px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Generador de Nombres de Usuario</h1>
    <form method="post" action="">
        <label for="word">Ingresa una palabra:</label>
        <input type="text" id="word" name="word" required>
        <input type="submit" value="Generar Nombres de Usuario">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $word = htmlspecialchars($_POST["word"]);

        function generateUsernames($base, $count = 10) {
            $usernames = [];
            for ($i = 1; $i <= $count; $i++) {
                $usernames[] = $base . $i;
            }
            return $usernames;
        }

        $usernames = generateUsernames($word);
        
        echo "<h2>Nombres de Usuario Generados:</h2>";
        echo "<ul>";
        foreach ($usernames as $username) {
            echo "<li>" . $username . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
