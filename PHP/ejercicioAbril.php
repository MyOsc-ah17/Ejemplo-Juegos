<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h2>Calculadora en PHP</h2>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label>Numero 1</label>
        <input type="number" name="num1" required><br><br>
        <label>Numero 2</label>
        <input type="number" name="num2" required><br><br>
        <label>Operación: </label>
        <select name="operacion">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Calcular">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operacion = $_POST['operacion'];

        switch ($operacion) {
            case 'sumar':
                $resultado = $num1 + $num2;
                break;
            
            case 'restar':
                $resultado = $num1 - $num2;
                break;

            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;
            
            case 'dividir':
                $resultado = $num1 / $num2;
                break;
            
            default:
                $resultado = "Sin resultados";
                break;
        }

        echo "<br>El resultado de la operación: ".$operacion." es igual a ".$resultado;
    }
    ?>
</body>
</html>