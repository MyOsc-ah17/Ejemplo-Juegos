<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palabras Polidromas</title>
    <style>
        body{
            background-color: aliceblue;
            text-align: center;
           
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }
        input{
            border-radius: 50px;

            
        }
        .boton{
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <h2>Verificador de Palabras o Frases Palindromas</h2>
    <form action="" method="post">
        <label>Introduce una palabra o frase:</label>
        <input type="text"  name="palabra" required>
        <br>
        <br>
        
        <input class="boton" type="submit" value="Verificar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $palabra = $_POST['palabra'];
        //"strtolower()" convierte las palabras en minusculas 
        $palabra = strtolower($palabra);

        //"str_replace(busca lo que se quiere remplazar,remplaza)" 
        $quitar_espacios = str_replace(' ', '', $palabra);

        //"strrev ()" invuerte las palabras
        $palabra_al_reves = strrev($quitar_espacios);

        // Verificar si la palabra al leerla al reves es igual a la original
        if ($quitar_espacios == $palabra_al_reves) {
            echo "<p>[$palabra] es un palíndromo.</p>";
        } else {
            echo "<p>[$palabra] no es un palíndromo.</p>";
        }
    }
    ?>
</body>
</html>
