<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo del IMC</title>
    <script>
        function CalcularIMC(sexo, altura, peso) {
            altura = Math.round(altura) / 100;
            peso = Math.round(peso);
            var indice = peso / (altura * altura);
            var resultado = "";

            switch (sexo) {
                case "m":
                    if (indice < 20) {
                        resultado = "Peso inferior al normal.";
                    } else if (indice >= 20 && indice < 24) {
                        resultado = "Peso Normal.";
                    } else if (indice >= 24 && indice < 29) {
                        resultado = "Peso superior al normal.";
                    } else {
                        resultado = "Obesidad.";
                    }
                    break;
                case "h":
                    if (indice < 21) {
                        resultado = "Peso inferior al normal.";
                    } else if (indice >= 21 && indice < 25) {
                        resultado = "Peso Normal.";
                    } else if (indice >= 25 && indice < 30) {
                        resultado = "Peso superior al normal.";
                    } else {
                        resultado = "Obesidad";
                    }
                    break;
                default:
                    resultado = "No se ha podido calcular. No ha indicado h (hombre) o m (mujer).";
            }

            return "Su IMC es: " + indice.toFixed(2) + " y su clasificación es: " + resultado;
        }

        function MostrarResultadoIMC(sexo, altura, peso, indice) {
            var mensaje = "Usted mide " + altura / 100 + " metros y pesa " + peso + " Kg.\n\n" + indice;
            alert(mensaje);
        }

        var sexo = prompt("Indique su sexo (h para hombre, m para mujer):");
        var altura = parseInt(prompt("Indique su altura en centímetros:"));
        var peso = parseInt(prompt("Indique su peso en kilogramos:"));

        var resultado = CalcularIMC(sexo, altura, peso);
        MostrarResultadoIMC(sexo, altura, peso, resultado);
    </script>
</head>
<body>
    <!-- No es necesario agregar elementos visibles en el cuerpo de la página -->
</body>
</html>