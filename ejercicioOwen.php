<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <style>
         body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
}

.container {
    max-width: 500px; /* Cambia el tamaño máximo según lo necesites */
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: left;
}

form {
    margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
input[type="submit"] {
    padding: 8px;
    margin-bottom: 10px;
    width: calc(100% - 16px); /* Resta el padding para ajustar el ancho */
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: black;
    color: #fff;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: white;
    color: black;
    border: solid black 2px;
}



    </style>
</head>
<body>
    <div class="container">
        <h1>Agenda de Contactos</h1>
        <p>Edxon Owen Reyna Islas</p>

        <!-- Formulario para agregar nuevo contacto -->
        <h2>Agregar Nuevo Contacto:</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <input type="submit" name="agregarContacto" value="Agregar Contacto">
        </form>

        <?php
        session_start();

        // Verificar si se envió el formulario de agregar
        if (isset($_POST['agregarContacto'])) {
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];

            // Validar los datos (puedes agregar más validaciones si lo necesitas)
            if (!empty($nombre) && !empty($telefono) && !empty($email)) {
                // Crear el arreglo del nuevo contacto
                $nuevoContacto = array(
                    'nombre' => $nombre,
                    'telefono' => $telefono,
                    'email' => $email
                );

                // Agregar el nuevo contacto al array de contactos en la sesión
                if (!isset($_SESSION['contactos'])) {
                    $_SESSION['contactos'] = array();
                }
                $_SESSION['contactos'][] = $nuevoContacto;

                // Redirigir para evitar reenvío de formulario
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "<p style='color: red;'>Por favor, completa todos los campos.</p>";
            }
        }

        // Función para mostrar la tabla de contactos
        function mostrarTablaContactos() {
            if (isset($_SESSION['contactos']) && count($_SESSION['contactos']) > 0) {
                echo "<h2>Contactos:</h2>";
                echo "<table>";
                echo "<tr><th>Nombre</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr>";
                foreach ($_SESSION['contactos'] as $key => $contacto) {
                    echo "<tr>";
                    echo "<td>{$contacto['nombre']}</td>";
                    echo "<td>{$contacto['telefono']}</td>";
                    echo "<td>{$contacto['email']}</td>";
                    echo "<td><a href='{$_SERVER['PHP_SELF']}?indice={$key}&accion=eliminar' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este contacto?\")'>Eliminar</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<form action='{$_SERVER['PHP_SELF']}' method='POST'><input type='submit' name='ocultarContactos' value='Ocultar Contactos'></form>";
            } else {
                echo "<p>No hay contactos en la agenda.</p>";
            }
        }

        // Mostrar u ocultar la tabla de contactos según el botón presionado
        

        // Eliminar un contacto si se envió el índice y la acción de eliminar
        if (isset($_GET['indice']) && isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
            $indiceEliminar = $_GET['indice'];
            if (isset($_SESSION['contactos'][$indiceEliminar])) {
                unset($_SESSION['contactos'][$indiceEliminar]);
                header('Location: ' . $_SERVER['PHP_SELF']); // Redirigir para evitar reenvío de formulario
                exit;
            }
        }
        ?>

        <!-- Formulario para mostrar contactos -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" name="mostrarContactos" value="Mostrar Contactos">
        </form>
    </div>
    
        <?php
        if (isset($_POST['mostrarContactos'])) {
            mostrarTablaContactos();
        } elseif (isset($_POST['ocultarContactos'])) {
            // No hace falta hacer nada, ya que la tabla se ocultará automáticamente al recargar la página
        }
        ?>
</body>
</html>

