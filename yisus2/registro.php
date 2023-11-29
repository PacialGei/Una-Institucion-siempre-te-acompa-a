<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login1";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash de la contraseña
    
    // Aquí puedes agregar lógica para validar y sanitizar los datos si es necesario

    // Guarda los datos en una base de datos (ejemplo: usando MySQLi)
    $conexion = new mysqli("$localhost", "$username", "$password", "$database");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Inserta los datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

    if ($conexion->query($query) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . $conexion->error;
    }

    // Cierra la conexión
    $conexion->close();
}
?>