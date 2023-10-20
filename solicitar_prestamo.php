<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud de Préstamo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .message-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
        }

        .message-box h2 {
            margin-top: 0;
        }

        .message-box p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        // Configuración de la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "biblioteca";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Procesar la solicitud de préstamo si se proporciona el libro_id
        if (isset($_GET['libro_id'])) {
            $libroId = $_GET['libro_id'];

            // Insertar la solicitud en la base de datos
            $sql = "INSERT INTO solicitudes (libro_id) VALUES ($libroId)";
            if ($conn->query($sql) === TRUE) {
                echo '<h2>Solicitud de Préstamo Exitosa</h2>';
                echo '<p>Gracias por solicitar el préstamo de este libro. Pronto nos pondremos en contacto contigo.</p>';
                echo '<p>Redirigiendo a la página principal en 5 segundos...</p>';
            } else {
                echo '<h2>Error al realizar la solicitud</h2>';
            }
        }

        // Cerrar la conexión
        $conn->close();
        ?>

        <script>
            setTimeout(function() {
                window.location.href = "index.html";
            }, 5000);
        </script>
    </div>
</body>
</html>
