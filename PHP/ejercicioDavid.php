<html>
    <head>
        <title>Libras a kilogramos y gramos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <h1 style="text-align: left; ">Convertidor de peso  </h1>
<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $libras = floatval ($_POST['libras']);
    $gramos=$libras*453.59237;
    $kilogramos=$gramos/1000;
    $onzas=$kilogramos*35.274;
    echo 'Valor de gramos: ' . $gramos . "<br/>\n";
    echo 'Valor de kilogramos: ' . $kilogramos . "<br/>\n";
    echo 'Valor de onzas: ' . $onzas . "<br/>\n";
}
 
?>
        <form method="post">
            <table style="text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="1" cellspacing="1">
                <tbody>
                    <tr>
                        <td>
                            <label for="libras">Ingresa el valor de libras:</label>
                        </td>
                        <td>
                            <input name="libras" required="required" step="0.000001" type="number" />
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" rowspan="1">
                            <input value="Procesar" type="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>