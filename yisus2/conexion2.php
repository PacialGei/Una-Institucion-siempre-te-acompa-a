<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Diseño de formulario de inicio de sesión - KENYO</title>
    <link rel="stylesheet" href="style (1).css">
    <style>
      /* OJO DE PARA VER CONTRASEÑA CONTARSEÑA */
      .field {
        position: relative;
      }

      .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
      }
      
    </style>
    <script>
      /* OJO EN JAVASCRIPT */
      document.addEventListener('DOMContentLoaded', function () {
        var contrasenaInput = document.getElementById('contrasena');
        var togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
          if (contrasenaInput.type === 'password') {
            contrasenaInput.type = 'text';
          } else {
            contrasenaInput.type = 'password';
          }
        });
      });

      document.getElementById('registroForm').addEventListener('submit', function (event) {
        var contrasenaInput = document.getElementById('contrasena');
        var errorMensaje = document.getElementById('errorMensaje');

        if (contrasenaInput.value.length !== 8) {
          event.preventDefault(); // Evitar que se envíe el formulario
          errorMensaje.textContent = "La contraseña debe tener exactamente 8 caracteres.";
        } else {
          errorMensaje.textContent = "";
        }
      });

      document.getElementById('registroForm').addEventListener('submit', function (event) {
        var passwordInput = document.getElementById('contrasena');

        // Validar que la contraseña cumple con tus criterios
        if (!isValidPassword(passwordInput.value)) {
          alert('Error en la contraseña. Verifica tus credenciales.');
          event.preventDefault(); // Evitar que el formulario se envíe
        }
      });

      // Función para validar la contraseña según tus criterios
      function isValidPassword(password) {
        // Agrega aquí tus criterios de validación, por ejemplo:
        // - Longitud mínima
        // - Presencia de números
        // - Otros requisitos específicos
        
        // Ejemplo: Longitud mínima de 8 caracteres
        if (password.length < 8) {
          return false;
        }

        // Ejemplo: Al menos un número
        if (!/\d/.test(password)) {
          return false;
        }

        // Puedes agregar más condiciones según tus requisitos

        // Si todas las condiciones se cumplen, la contraseña es válida
        return true;
      }
    </script>
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Bienvenido</div>
      <form action="conexion.php" method="post" id="registroForm" >
        <div class="field">
          <input type="text" name="usuario" required>
          <label for="usuario">Correo Electrónico</label>
        </div>
        <div class="field">
          <input type="password" name="pass" id="contrasena" required>
          <label for="pass">Contraseña</label>
          <span class="toggle-password" id="togglePassword">&#128065;</span>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Recuérdame</label>
          </div>
          <div class="forgot-password-link"><a href="contra.html">¿Olvidó su contraseña?</a></div>
        </div>
        <div class="field">
          <input type="submit" value="Aceptar"> <!--BOTON.-->
        </div>
        <div class="signup-link">¿No es un usuario? <a href="index2.html">Regístrate ahora</a></div>
        <br>
        <a href="inicio.html" class="cancel-button">Cancelar</a>
      </form>
    </div>
  </body>
</html>





<?php
// conexion.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "login1";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $localidad = $_POST['localidad'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $domicilio = $_POST['domicilio'];
    $genero = $_POST['genero']; // Nuevo campo: género

    // Validar que se proporcionen correo electrónico y contraseña
    if (empty($correo) || empty($contrasena)) {
        echo "Error: Debes proporcionar correo electrónico y contraseña.";
    } else {
        // Insertar datos en la tabla 'usuarios'
        $sqlUsuarios = "INSERT INTO usuarios (usuario, pass) VALUES ('$correo', '$contrasena')";

        // Insertar datos en la tabla 'registros'
        $sqlRegistros = "INSERT INTO registros (correo, contrasena, nombre, apellido_paterno, apellido_materno, localidad, edad, telefono, domicilio, genero) 
                         VALUES ('$correo', '$contrasena', '$nombre', '$apellido_paterno', '$apellido_materno', '$localidad', '$edad', '$telefono', '$domicilio', '$genero')";

        // Realizar las consultas SQL
        if ($conn->query($sqlUsuarios) === TRUE && $conn->query($sqlRegistros) === TRUE) {
            echo "Datos insertados con éxito en ambas tablas.";
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>
