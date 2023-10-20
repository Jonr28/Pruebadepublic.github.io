<?php
// Configuración de la base de datos
$servername = "localhost";  // Dirección del servidor de la base de datos
$username = "root";         // Nombre de usuario de la base de datos
$password = "";             // Contraseña de la base de datos (en este caso, vacía)
$database = "reserva";      // Nombre de la base de datos que se usará

// Crear una nueva conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); // Si falla, muestra un mensaje de error y termina el script
}

// Comprobar si la solicitud es un POST (se envió un formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $carne = $_POST["carne"];
    $libro = $_POST["libro"];

    // Crear la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO reservas (nombre, carne, libro) VALUES ('$nombre', '$carne', '$libro')";

    // Ejecutar la consulta SQL y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada con éxito."; // Si es exitosa, muestra un mensaje de éxito
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Si hay un error, muestra un mensaje de error
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
