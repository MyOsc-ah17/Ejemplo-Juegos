<?php
// Verificar si se ha enviado una nueva tarea
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tarea'])) {
    $tareas = [];

    // Verificar si el archivo JSON existe
    if (file_exists('tareas.json')) {
        // Obtener las tareas existentes
        $tareas = json_decode(file_get_contents('tareas.json'), true);
    }

    // Obtener la nueva tarea desde el formulario
    $nuevaTarea = $_POST['tarea'];

    // Crear un ID único para la nueva tarea
    $id = uniqid();

    // Agregar la nueva tarea al arreglo de tareas
    $tareas[] = [
        'id' => $id,
        'texto' => $nuevaTarea,
        'completada' => false
    ];

    // Guardar las tareas actualizadas en el archivo JSON
    file_put_contents('tareas.json', json_encode($tareas));

    // Redireccionar a la página principal
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Obtener las tareas desde el archivo JSON
$tareas = [];
if (file_exists('tareas.json')) {
    $tareas = json_decode(file_get_contents('tareas.json'), true);
}

// Verificar si se ha solicitado marcar una tarea como completada
if (isset($_GET['marcar_completada'])) {
    $id = $_GET['marcar_completada'];

    // Marcar la tarea como completada
    foreach ($tareas as &$tarea) {
        if ($tarea['id'] === $id) {
            $tarea['completada'] = true;
            break;
        }
    }

    // Guardar las tareas actualizadas en el archivo JSON
    file_put_contents('tareas.json', json_encode($tareas));

    // Redireccionar a la página principal
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Verificar si se ha solicitado eliminar una tarea
if (isset($_GET['eliminar_tarea'])) {
    $id = $_GET['eliminar_tarea'];

    // Eliminar la tarea del arreglo de tareas
    foreach ($tareas as $key => $tarea) {
        if ($tarea['id'] === $id) {
            unset($tareas[$key]);
            break;
        }
    }

    // Guardar las tareas actualizadas en el archivo JSON
    file_put_contents('tareas.json', json_encode(array_values($tareas)));

    // Redireccionar a la página principal
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
if (isset($_GET['editar_tarea'])) {
    $id = $_GET['editar_tarea'];

    // Obtener la tarea por su ID
    $tareaAEditar = array_filter($tareas, function ($t) use ($id) {
        return $t['id'] === $id;
    });

    if (!empty($tareaAEditar)) {
        $tareaAEditar = reset($tareaAEditar);
        $texto = $tareaAEditar['texto'];
        $id = $tareaAEditar['id'];
    
        // Formulario para editar la tarea con un ID único
        echo "
        <form id='formEditarTarea$id' style='display: none;' action='" . $_SERVER['PHP_SELF'] . "' method='POST'>
            <input type='hidden' name='id' value='$id'>
            <input type='text' name='texto' value='$texto' required>
            <button type='submit' style='padding: 10px 20px; background-color: black; color: white; border: none; border-radius: 4px; cursor: pointer;'>Guardar Cambios</button>
        </form>
        ";
    } else {
        echo "Tarea no encontrada.";
        exit();
    }
    
}    

// Verificar si se ha enviado una tarea editada
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['texto'])) {
    $id = $_POST['id'];
    $nuevoTexto = $_POST['texto'];

    // Actualizar la tarea con el nuevo texto
    foreach ($tareas as &$tarea) {
        if ($tarea['id'] === $id) {
            $tarea['texto'] = $nuevoTexto;
            break;
        }
    }

    // Guardar las tareas actualizadas en el archivo JSON
    file_put_contents('tareas.json', json_encode($tareas));

    // Redireccionar a la página principal
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
</head>
<body>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding-left: 350px;
    padding-right: 350px;
    
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

.container {
    max-width: 800px;
    width: 100%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    color: black;
}
p{
    color: #333;
}
form {
    margin-bottom: 20px;
    width: 100%; /* Asegurar que el formulario ocupe todo el ancho del contenedor */
}

form input[type="text"] {
    display: block;
    width: calc(100% - 20px); /* Restar el padding del input para que no desborde el contenedor */
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    width: calc(100% - 20px); /* Restar el padding del botón para que no desborde el contenedor */
    padding: 10px;
    background-color: black;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: white;
    color: black;
    border: solid black 2px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    width: 100%; /* Asegurar que la lista ocupe todo el ancho del contenedor */
}

li {
    background-color: #f2f2f2;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 10px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between; /* Alinear los elementos al principio y al final de la línea */
}

li a {
    text-decoration: none;
    color: white;
    padding: 10px 20px;
    background-color: black;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 20px; /* Espacio entre botones */
}




.completed {
    text-decoration: line-through; /* Tachar el texto cuando la tarea está completada */
}
li.completed {
    background-color: #e0e0e0;
    color: #888;
}

li a:hover {
    background-color: white;
    color: black;
    border: solid black 2px;
}


    </style>
    
    <h1>Lista de Tareas</h1>
    <p>Miguel Angel Aguirre Cruz</p>

    <!-- Formulario para agregar una nueva tarea -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="tarea" placeholder="Ingrese una nueva tarea" autocomplete=off>
        <button type="submit">Agregar Tarea</button>
    </form>

    <!-- Mostrar lista de tareas -->
    <ul>
    
    <?php
    // Mostrar cada tarea
    foreach ($tareas as $tarea) {
        $id = $tarea['id'];
        $texto = $tarea['texto'];
        $completada = $tarea['completada'];

        // Agregar la clase 'completed' si la tarea está completada
        $claseCompletada = $completada ? 'completed' : '';
            
        echo "<li class='$claseCompletada'>$texto ";

        // Mostrar el botón de marcar como completada solo si la tarea no está completada
        if (!$completada) {
            echo "<a href='" . $_SERVER['PHP_SELF'] . "?marcar_completada=$id'>Completar</a>";
        }
        //if (!$tarea['completada']) {
        //    echo "<a href='" . $_SERVER['PHP_SELF'] . "?editar_tarea=$id'>Editar</a>";
        //}

        // Mostrar el botón de eliminar
        echo "<a href='" . $_SERVER['PHP_SELF'] . "?eliminar_tarea=$id'>Eliminar</a>";

        echo "</li>";
    }
    ?>

    </ul>
</body>
</html>


