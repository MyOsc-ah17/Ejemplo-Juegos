<?php
# Nombre de la práctica: Archivo Santiago PHP. Generador de contraseñas seguras mediante código PHP-->
# Autor/es: Santiago Nicolás De la mora Núñez-->
# Fecha: 24/5/2024

#-------------------------------------------------------------------------Links-------------------------------------------------------------------------------#
echo
"
<!--Vínculo el archivo de JavaScript que proporciona los íconos-->
<script src='https://kit.fontawesome.com/41bcea2ae3.js' crossorigin='anonymous'></script>
";

#---------------------------------------------------------------------------CSS-------------------------------------------------------------------------------#
// Líneas de código que agregan estilos a la página mediante la impresion de una etiqueta "<style>" 
echo 
"
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: Century Gothic;
        color: white;
    }

    .body
    {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    /* Estilos que añaden una imagen de fondo a la página */
    .body::before
    {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url('https://images.fineartamerica.com/images/artworkimages/mediumlarge/1/rise-with-the-sun-ursula-coccomo.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        opacity: 0.8;
    }

    .oculto {display: none}

    .contenedor-principal 
    {
        text-align: center;
        width: 1100px;
        border-radius: 25px;
        background-color: rgb(0, 120, 255);
        padding: 150px 0;  
    }

    .label
    {
        font-size: 17px;
        font-weight: bold;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.28);
    }
    
    .entrada-numeros
    {
        width: 450px;
        height: 40px;
        border-radius: 20px;
        padding: 0 15px;
        border: none;
        color: black;
        font-family: Arial;
        box-shadow: 5px 5px 8px rgb(0, 0, 0, 0.2);
    }

    .entrada-numeros:focus {outline: none}

    .btn-enviar
    {
        padding: 10px 15px;
        width: fit-content;
        border-radius: 21px;
        border: none;
        cursor: pointer;
        background-color: rgb(250, 250, 250);
        font-size: 17px;
        color: black;
        font-weight: 600;
        box-shadow: 5px 5px 8px rgb(0, 0, 0, 0.2);
        transition: all 0.4s ease;
    }

    .btn-enviar:hover
    {
        background-color: rgb(190, 190, 190);
        transform: scale(1.1);
        box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.4); 
    }
    
    .titulo-principal
    {
        transform: translateY(-39px);
        font-size: 40px;
        text-shadow: 3px 3px 5px rgba(0 0 0 / 33%);
        z-index: 1;
        position: relative;
    }

    .formulario
    {
        position: relative;
        bottom: 38px;
    }
    
    .sugerencia-longitud
    {
        position: absolute;
        right: 40px;
        bottom: 35px;
        width: 230px;
        font-size: 16px;
        text-align: left;
        z-index: 1;
    } 

    .btn-salir
    {
        position: absolute;
        top: -76px;
        left: 30px;
        padding: 7px 14px;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        background-color: blue;
        font-size: 15px;
        font-weight: bolder;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
    }

    .btn-salir:hover
    {
        box-shadow: 4px 4px 5px rgba(0, 0, 0, 0.5);
        transform: scale(1.05);
        background-color: #0037ff;
    }
    
    .btn-salir:active
    {
        transform: scale(1);
        background-color: blue;
        box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.3);
        transition-duration: 0s;
    }
    
    /* Estilos de los niveles de seguridad de las contraseñas */
    .extremadamente-debil {background-color: black}   .extremadamente-debil h4 {color: white}
    .muy-debil {background-color: #8A0000}   .muy-debil h4 {color: white}
    .debil {background-color: red}
    .mediana {background-color: yellow}
    .fuerte {background-color: green}
    
    /*------------------------------ Estilos de los elementos que se añaden desde el servidor ----------------------------*/
    .contenedor-aniadidos-desde-servidor
    {
        position: absolute;
        bottom: 100px;
        width: 80%;
        height: fit-content;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        z-index: 7;
    }
    
    .contenedor-contrasenia-btncopiar
    {
        width: 100%;
        margin-left: 185px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .contenedor-contrasenia
    {
        padding: 10px 25px;
        margin-right: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #0037ff;
        color: white;
        width: fit-content;
        border-radius: 33px;
        font-family: Arial;
        box-shadow: 6px 6px 15px rgb(0, 0, 0, 0.4);
        z-index: 7;
    }
    
    .contrasenia {text-align: center}

    .btn-copiar
    {
        padding: 10px;
        border: none;
        border-radius: 10px;
        background-color: blue;
        box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.25);
        color: white;
        font-size: 21px;
        cursor: pointer;
        transition: all 0.3s ease-in;
    }
    
    .btn-copiar:hover
    {
        box-shadow: 4px 4px 5px rgba(0, 0, 0, 0.5);
        transform: scale(1.05);
        background-color: #0037ff;
    }
    
    .btn-copiar:active
    {
        transform: scale(0.9);
        background-color: blue;
        box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.3);
        transition-duration: 0s;
    }
    
    .mensaje-copia-exitosa
    {
        text-align: left;
        font-size: 10px;
        width: 105px;
        margin-left: 11px;
        margin-bottom: 24px;
        padding: 6px;
        border-radius: 8px;
        background-color: white;
        color: black;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .contenedor-fuerza-contrasenia
    {
        width: fit-content;
        padding: 10px 18px;
        border-radius: 20px;
        box-shadow: 3px 3px 7px rgb(0, 0, 0, 0.6);
    }
    
    .fuerza-contrasenia
    {
        color: black;
        text-align: center;
    }

</style>
";
    
#-----------------------------------------------------------------------------HTML--------------------------------------------------------------------------#
// Líneas de código que imprimen la estructura HTML
echo
"
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Generador de contraseñas seguras</title>
</head>
<body class='body'>
    <div class='contenedor-principal'>
        <form id='formulario' class='formulario' method='post'>
            <button class='btn-salir' onclick='redirijirPagPrincipal()'>Salir</button>
            <h1 class='titulo-principal'>Generador de contraseñas seguras</h1><br>
            <label for='entrada-numeros' class='label'>Ingrese el tamaño de carácteres que quiere que tenga su contraseña</label><br><br>
            <input type='number' name='tamanio-contrasenia' id='entrada-numeros' class='entrada-numeros' min='1' max='30' max-length='2'></input><br><br>
            <p class='sugerencia-longitud'>Una contraseña segura contiene al menos 8 carácteres.</p>
            <input type='submit' name='enviar' id='enviar' class='btn-enviar' value='Generar contraseña'>
        </form>
    </div>
</body>
";

#-----------------------------------------------------------------------JavaScript-------------------------------------------------------------------------#
// Líneas de código que controlan la lógica del programa mediante la impresión de la etiqueta "<script>"
echo
"
<script>
    // Fucnión que redirije a la página principal donde están los proyectos
    function redirigirPagPrincipal()
    {
        window.location.href = 'index.php';
    }

    // Fragmento de código que cambia el mensaje que aparece al hacer click en el botón submit sin haber completado el campo
    var formulario = document.getElementById('formulario');
    formulario.addEventListener('submit', (e) => {
        var entradaNumeros = document.getElementById('entrada-numeros');

        if (entradaNumeros.value.trim() === '')
        {
            e.preventDefault();
            entradaNumeros.setCustomValidity('No puede dejar el campo vacío.');
            entradaNumeros.reportValidity();
        }
    });

    // Fragmento de código que evita que se ingresen más de dos números en el campo de entrada
    var entradaNumeros = document.getElementById('entrada-numeros');
    entradaNumeros.addEventListener('input', function(e) {
        // Limpiar el mensaje de validación personalizado cuando el usuario comienza a escribir
        entradaNumeros.setCustomValidity('');

        let valor = e.target.value;

        if (valor.length > 2)
            e.target.value = valor.slice(0, 2);

        if (parseInt(valor) < 8)
            document.querySelector('.sugerencia-longitud').classList.remove('oculto');                
        else
            document.querySelector('.sugerencia-longitud').classList.add('oculto');

        if (parseInt(valor) > 30)
            e.target.value = 30;
    });

    // Fragmento de código que evita que se ingresen la letra 'e' y el signo de menos '-' en el campo de entrada
    document.getElementById('entrada-numeros').addEventListener('keydown', function(e) {
        if (e.key === 'e' || e.key === 'E' || e.key === '-' || e.key == '+')
        {
            e.preventDefault();
        }
    });
</script>
";

#---------------------------------------------------------------------------PHP------------------------------------------------------------------------------#
// Fragmento de código que procesa los datos provenientes del formulario para procesarlas
if (isset($_POST['enviar']))
{
    if (intval($_POST['tamanio-contrasenia']) >= 1)
    {
        $tamanio_contrasenia = $_POST['tamanio-contrasenia'];
        $caracteres = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'Z', '!', '#', '$', '%', '&', '=', '?', '@', '_', '-', '+', '*', '/', '.', ',' , ';', ':', '<', '>', '[', ']', '{', '}', '(', ')'];
        $contrasenia = null;
        $numero_elementos = count($caracteres) - 1;

        for ($i = 1; $i <= $tamanio_contrasenia; $i++)
        {
            $indice_aleatorio = rand(1, $numero_elementos);
            $contrasenia .= $caracteres[$indice_aleatorio];
        }

        // Fragmento de código que imprime la estructura HTLM de elementos como la contraseña, el nivel de seguridad y el botón de copiar
        echo
        "
        <div class='contenedor-aniadidos-desde-servidor'>
            <div class='contenedor-contrasenia-btncopiar'>
                <div class='contenedor-contrasenia'>
                    <h1 class='contrasenia'>$contrasenia</h1>
                </div>
                <button class='btn-copiar' title='Copiar'><i class='fa-regular fa-copy'></i></button>
                <p class='mensaje-copia-exitosa'>¡Contraseña copiada con éxito!</p>
            </div>
            <div class='contenedor-fuerza-contrasenia'>
                <h4 class='fuerza-contrasenia'></h4>
            </div>
        </div>
        ";

        // Fragmento de código que calcula la seguridad de la contraseña generada y hace que al dar click en el botón de copiar se copie la contraseña
        echo 
        "
        <script>
            var contraseniaGenerada = document.querySelector('.contrasenia');
            // Función que verfica la seguridad de la contraseña
            function obtenerFortalezaContrasenia(contrasenia) {
                var fortaleza = 'extremadamente debil';
                var criterioLongitud = contrasenia.length >= 8;
                var criterioMayuscula = (/[A-Z]/).test(contrasenia);
                var criterioMinuscula = (/[a-z]/).test(contrasenia);
                var criterioNumeros = (/\d/).test(contrasenia);
                var criterioCaracteresEspeciales = (/[!@#$%^&*(),.?\"\':{}|<>\[\]]/).test(contrasenia);
                var criteriosTotales = [criterioLongitud, criterioMayuscula, criterioMinuscula, criterioNumeros, criterioCaracteresEspeciales].filter(Boolean).length;
            
                if (criteriosTotales === 5)
                    fortaleza = 'fuerte';
                else if (criteriosTotales >= 3)
                    fortaleza = 'mediana';
                else if (criteriosTotales === 2)
                    fortaleza = 'debil';
                else if (criteriosTotales <= 1)
                    fortaleza = 'muy debil';
            
                return fortaleza;
            }

            // Función que implementa la función que verifica la fuerza de la contraseña e imprime el resulatado en el formulario
            function checarFortalezaContrasenia(contrasenia) 
            {
                var contenedorResultado = document.querySelector('.contenedor-fuerza-contrasenia');
                var resultado = document.querySelector('.fuerza-contrasenia');
                var fortaleza = obtenerFortalezaContrasenia(contrasenia);

                if (fortaleza === 'extremadamente debil')
                {
                    resultado.textContent = 'Extremedamente débil ☠';
                    contenedorResultado.classList.remove('muy-debil');
                    contenedorResultado.classList.remove('debil');
                    contenedorResultado.classList.remove('mediana');
                    contenedorResultado.classList.remove('fuerte');
                    contenedorResultado.classList.add('extremadamente-debil');
                }
                else if (fortaleza === 'muy debil')
                {
                    resultado.textContent = 'Muy débil 😖';
                    contenedorResultado.classList.remove('extremadamente-debil');
                    contenedorResultado.classList.remove('debil');
                    contenedorResultado.classList.remove('mediana');
                    contenedorResultado.classList.remove('fuerte');
                    contenedorResultado.classList.add('muy-debil');
                }
                else if (fortaleza === 'debil')
                {
                    resultado.textContent = 'Débil ☹';
                    contenedorResultado.classList.remove('extremadamente-debil');
                    contenedorResultado.classList.remove('muy-debil');
                    contenedorResultado.classList.remove('mediana');
                    contenedorResultado.classList.remove('fuerte');
                    contenedorResultado.classList.add('debil');
                }
                else if (fortaleza === 'mediana')
                {
                    resultado.textContent = 'Mediana 😕';
                    contenedorResultado.classList.remove('extremadamente-debil');
                    contenedorResultado.classList.remove('muy-debil');
                    contenedorResultado.classList.remove('debil');
                    contenedorResultado.classList.remove('fuerte');
                    contenedorResultado.classList.add('mediana');
                }
                else if (fortaleza === 'fuerte')
                {
                    resultado.textContent = 'Fuerte 🗿';
                    contenedorResultado.classList.remove('extremadamente-debil');
                    contenedorResultado.classList.remove('muy-debil');
                    contenedorResultado.classList.remove('debil');
                    contenedorResultado.classList.remove('mediana');
                    contenedorResultado.classList.add('fuerte');
                }
            }

            // Fragmento de código que hace que se copie la contraseña en el portapapeles al hacer click en el botón hace que aparezca un pequeño mensaje que dice que se ha copiado la contraseña
            document.querySelector('.btn-copiar').addEventListener('click', function() {
                // Obtener el texto del elemento que tiene la contraseña como texto
                var textoACopiar = document.querySelector('.contrasenia').textContent;

                // Crear una elemento temporal <textarea>
                var textarea = document.createElement('textarea');
                textarea.value = textoACopiar;
                // Agrega el elemento a la estructura HTML
                document.body.appendChild(textarea);

                // Seleccionar el contenido de la etiqueta textarea
                textarea.select();
                textarea.setSelectionRange(0, 99999);

                // Copiar el texto al portapapeles
                document.execCommand('copy');
                
                // Eliminar la etiqueta texareatemporal 
                document.body.removeChild(textarea);

                // Se hace una prueba en la consola para verificar que todo esté bien
                console.log('Contraseña copiada: ' + textoACopiar);

                // Se hace aparecer un pequeño mensaje que dice que la copia del contenido fue exitosa
                var mensajeCopiaExitosa = document.querySelector('.mensaje-copia-exitosa');
                let aparecerDesaparecerMensaje = () => {
                    mensajeCopiaExitosa.style.opacity = 1;
                    setTimeout(() => {
                        mensajeCopiaExitosa.style.opacity = 0;
                    }, 3000);
                }
                
                // Se llama a la función para que se ejecute la aparición y desaparición del pequeño mensaje
                aparecerDesaparecerMensaje();
            });

            // Llamada a la función que verifica que la fortaleza de la contraseña e imprime el resultado en pantalla
            checarFortalezaContrasenia(contraseniaGenerada.textContent);
        </script>
        ";
    }
}