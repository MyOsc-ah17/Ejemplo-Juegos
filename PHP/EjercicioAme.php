<?php
$nombre2 = "América Joneri García Vela";

echo "<h2> Código de: ".$nombre2. "</h2>";

        echo "<h2>Definir si un número es positivo, negativo o cero<br></h2>";

function DefinirNum($numero) {
    if ($numero > 0) {
        return "positivo";
    } elseif ($numero < 0) {
        return "negativo";
    } else {
        return "cero";
    }
}

        $num1 = 10;
        $num2 = -5;
        $num3 = 0;

        echo "El número ".$num1." es " . DefinirNum($num1) . "<br>";
        echo "El número ".$num2." es " . DefinirNum($num2) . "<br>";
        echo "El número ".$num3." es " . DefinirNum($num3) . "<br>";


?>
        <a href="EjercicioMigue.php"><button>Ejercicio de Miguel</button></a>
        <a href="Index.php"><button>Inicio</button></a>