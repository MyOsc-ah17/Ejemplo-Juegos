<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .code-block {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        pre {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ejemplo PHP</h1>

        <div class="code-block">
            <pre><?php echo '¡Hola mundo!'; ?></pre>
        </div>

        <div class="code-block">
            <pre><?php echo '¡Hola mundo!'; ?></pre>
        </div>

        <br>

        <div class="code-block">
            <?php
                $num1 = 5;
                $num2 = 10;
                $suma = $num1 + $num2; 
                echo 'La suma es ' . $suma;
            ?>
        </div>

        <br>

        <div class="code-block">
            <?php
                echo 'Hecho con while <br>';
                $i = 1;
                while($i <= 10) {
                    echo $i . ' ';
                    $i++;
                }
                echo '<br>';
                echo 'Hecho con for <br>';
                for($i = 1; $i <= 10; $i++) {
                    echo $i . ' ';
                }
            ?>
        </div>
    </div>
</body>
</html>
