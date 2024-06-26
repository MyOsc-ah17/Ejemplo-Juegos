<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    echo '<table>';

    // Cabecera (1º fila)
    echo '<tr>';
    echo '<th>X</th>';

    for ($i=1; $i <= 10; $i++) { 
        echo '<th>';
        echo $i;
        echo '</th>';
    }

    echo '</tr>';

    // contenido

    //columna vertical
    for ($i=1; $i <= 10; $i++) { 
        echo '<tr>';
        echo '<td>';
        echo $i;
        echo '</td>';

        //calculo tabla multiplicar
        for ($j=1; $j <= 10; $j++) { 
            
            echo '<td>';
            echo $i * $j;
            echo '</td>';

        }


        echo '</tr>';
    }


    echo '</table>';
    ?>
</body>
</html>
