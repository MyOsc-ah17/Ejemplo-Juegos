<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Monedas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input, select, button {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: black;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: white;
            color: black;
            border: solid black 2px;
        }
        p {
            text-align: center;
            color: #333;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h1>Conversor de Monedas</h1>
        <p>Enrique González Ramírez</p>
        
        <form method="POST" action="">
            <label for="cantidad">Cantidad:</label>
            <input type="number" step="0.01" id="cantidad" name="cantidad">
            <label for="fromCurrency">De:</label>
            <select id="fromCurrency" name="fromCurrency" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="JPY">JPY</option>
                <option value="MXN">MXN</option>
            </select>
            <label for="toCurrency">A:</label>
            <select id="toCurrency" name="toCurrency" required>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="GBP">GBP</option>
                <option value="JPY">JPY</option>
                <option value="MXN">MXN</option>
            </select>
            <button type="submit" name="convertir">Convertir</button>
        </form>

        <?php
        if (isset($_POST['convertir'])) {
            $cantidad = $_POST['cantidad'];
            $fromCurrency = $_POST['fromCurrency'];
            $toCurrency = $_POST['toCurrency'];

            // Tasas de cambio manuales
            $tasasCambio = [
                'USD' => ['EUR' => 0.85, 'GBP' => 0.75, 'JPY' => 110.0, 'MXN' => 20.0],
                'EUR' => ['USD' => 1.18, 'GBP' => 0.88, 'JPY' => 130.0, 'MXN' => 23.5],
                'GBP' => ['USD' => 1.34, 'EUR' => 1.14, 'JPY' => 148.0, 'MXN' => 27.0],
                'JPY' => ['USD' => 0.0091, 'EUR' => 0.0077, 'GBP' => 0.0067, 'MXN' => 0.18],
                'MXN' => ['USD' => 0.050, 'EUR' => 0.043, 'GBP' => 0.037, 'JPY' => 5.56],
            ];

            // Verificar que las divisas seleccionadas estén definidas en las tasas de cambio
            if (isset($tasasCambio[$fromCurrency][$toCurrency])) {
                $tasaCambio = $tasasCambio[$fromCurrency][$toCurrency];
                $resultado = $cantidad * $tasaCambio;
                echo "<p>{$cantidad} {$fromCurrency} equivale a {$resultado} {$toCurrency}</p>";
            } elseif(empty($cantidad)){
                echo "<p>Tiene que llenar el campo</p>";
                
            }
            else {
                echo "<p>No se puede realizar la conversión entre {$fromCurrency} y {$toCurrency}</p>";
            }
        }
        ?>
    </div>
</body>
</html>
