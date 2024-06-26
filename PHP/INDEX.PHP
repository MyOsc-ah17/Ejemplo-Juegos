<H1> GRUPO  4oH, compilación de programas PHP </H1>


<?php
# este es un pequeño fragmento de código PHP
// Dos instrucciones para imprimir
   echo "GRUPO  4oH, compilación de programas PHP";
   echo "<br>";
   
   print ("<br>Especialidad Programación");

/* Con esta indicacion
podemos poner comentarios
de varias lineas
*/

#variables

$texto = "Ejemplos de diferentes variables con 4oH";
$NumProgramas = 30;

echo "<h2>".$texto." para hacer: " .$NumProgramas. " programas". "</h2>";

$textocompleto = "<h2>".$texto." para hacer: " .$NumProgramas. " programas, ". "</h2>";
 
echo $textocompleto;
echo $textocompleto;
echo $textocompleto;
echo $textocompleto;
echo $textocompleto;

// Inician loscódigos de los alumnos


echo "Código de Isai";
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST['texto'];
    $veces = (int)$_POST['veces'];

    if (!empty($texto) && $veces > 0) {
        echo "<h2>Resultado:</h2>";
        for ($i = 1; $i <= $veces; $i++) {
            echo $i . ". " . htmlspecialchars($texto) . "<br>";
        }
    } else {
        echo "Por favor, ingrese un texto y un número válido de veces.";
    }
}
?>

<h1>Repetidor de texto</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="texto">Ingrese el texto:</label>
    <input type="text" id="texto" name="texto" required><br><br>
    <label for="veces">Número de veces:</label>
    <input type="number" id="veces" name="veces" required min="1"><br><br>
    <input type="submit" value="Repetir">
</form>
<?php 
echo "codigo de kevin leonardo"
?>
<a href="ejerciciokevin.php">entrar </a>


<?php 
echo "<br>codigo de Angel Contreras"
?>
<a href="ejercicioangel.php">entrar </a>


<?php 
echo "<br>codigo de Cesar Sanchez Cabrera"
?>
<a href="ejerciciocesar.php">entrar </a>

<?php 
echo "<br>codigo de Ian Carlo Vigueras Puente"
?>
<a href="Ian.php">entrar </a>

<?php 
echo "<br>codigo de America Joneri"
?>
<a href="EjercicioAme.php">entrar </a>


<?php 
echo "<br>codigo de Aislinn Anel Gutierrez Lozano " 
?>
<a href="ejercicioAnel.php">entrar </a>

<?php 
echo "<br>codigo de Erica Hernandez Quijano"
?>
<a href="ejercicioErica.php">entrar </a>

<?php 
echo "<br>codigo de Alexa Michel Cruz Sanchez " 
?>
<a href="ejercicioMichel.php">entrar </a>


<?php 
echo "<br>codigo de Abril Lopez Estrada" 
?>
<a href="ejercicioAbril.php">entrar </a>

<?php 
echo "<br><br>Código Santiago Nicolás De la mora Núñez<br>" 
?>
<a href="archivo-santiago.php">entrar </a><br><br>

<?php 
echo "<br><br>Código Isaac Rafael Salazar Mora<br>" 
?>
<a href="ejercicioIsaac.php">entrar </a><br><br>

<?php 
echo "<br><br>Código Zuleima Nataly Reyes Martinez<br>" 
?>
<a href="ejercicioZule.php">entrar </a><br><br>

<?php
echo"<br<<br>Código David Antonio Ordaz <br>"
?>
<a href="ejercicioDavid.php">entrar </a><br><br>

<?php
echo"<br<<br>Código de Luna Estefania Villafañez Valdiviezo <br>"
?>
<a href="ejercicioluna.php">entrar </a><br><br>

<?php
echo"<br<<br>Código Salibeth Zenil Garay <br>"
?>
<a href="ejerciciosali.php">entrar </a><br><br>
<?php
echo"<br<<br>Código Enrique Gonzalez Ramirez <br>"
?>
<a href="ejercicioEnrique.php">entrar </a><br><br>
<?php
echo"<br<<br>Código Sergio Gamaliel Ramirez Ceron <br>"
?>
<a href="palindromoGamaliel.php">entrar </a><br><br>
<?php
echo"<br<<br>Código Edxon Owen Reyna Islas <br>"
?>
<a href="ejercicioOwen.php">entrar </a><br><br>
<?php
echo"<br<<br>Código Miguel Angel Aguirre Cruz <br>"
?>
<a href="ejercicioMiguel.php">entrar </a><br><br>
<?php
echo"<br<<br>Código Jonathan Castillo Jimenez <br>"
?>
<a href="ejercicioJona.php">entrar </a><br><br>

<?php
echo "<br<<br> Codigo Oscar Acosta Hernández <br>"
?>
<a href="buscaminas_oscar/index.php">entrar</a> <br><br>

<?php
echo "<br<<br> Codigo marisa yarely vazquez linares <br>"
?>
<a href="Puzzle_yarely/index.html">entrar</a> <br><br>
