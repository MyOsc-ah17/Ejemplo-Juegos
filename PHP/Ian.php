<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reloj en Tiempo Real</title>
    <style>
        #clock {
            font-size: 24px;
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    </style>
    <script>
        function startClock() {
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('clock').innerText = `${hours}:${minutes}:${seconds}`;
            }
            updateClock(); // initial call
            setInterval(updateClock, 1000); // update every second
        }
    </script>
</head>
<body onload="startClock()">
    <h1>Reloj en Tiempo Real</h1>
    <div id="clock">
        <?php
        // Mostrar la hora inicial desde el servidor
        date_default_timezone_set('America/Los_Angeles'); // Ajusta la zona horaria según sea necesario
        echo date('H:i:s');
        ?>
    </div>
</body>
</html>

</html>
