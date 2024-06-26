<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Suma de números</title>
    <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
$suma = '';
if (isset($_POST['enviar'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $suma = $num1 + $num2;
}

?>

<div class="container">
    <h2>Suma de Números</h2>

    <form method="post">
        <label for="num1">Inserta el número 1</label>
        <input type="number" id="num1" name="num1"  />

        <label for="num2">Inserta el número 2</label>
        <input type="number" id="num2" name="num2"  />

        <input type="submit" name="enviar" value="Sumar" />

    </form>

    <?php
    if ($suma !== '') {
        echo '<p>La suma es: ' . $suma .  '</p>';
    }
    ?>
</div>
</body>

</html>
