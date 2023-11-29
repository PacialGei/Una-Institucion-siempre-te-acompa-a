




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
    $usuario = $_POST['usuario'];
    $password = $_POST['pass'];

    // Consulta SQL para verificar la autenticación utilizando una consulta preparada
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicia la sesión (si aún no está iniciada)
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Almacena el nombre de usuario en la variable de sesión
        $_SESSION["usuario"] = $usuario;

        // Redirige al usuario a la página deseada
        header("Location: conexion.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos
        // Redirige al usuario de nuevo a la página de inicio
        header("Location: index.html");
        exit();
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="proyecto.css">
    <title>Una institucion te acompaña siempre.</title>
</head>
<!-- MENU -->
<body>
    <header>
        <div class="content">
            <div class="menu container">
                <a href="https://cecytem.edomex.gob.mx/" class="logo">CECyTEM.</a>
                <input type="checkbox" id="menu">
                <label for="menu">
                    <img src="menu.png" class="menu-icon">
                </label>
                <nav class="navbar">
                    <ul>
                        <li><a href="instituciones.html">Instituciones.</a></li>
                        <li><a href="trastornos.html">Trastornos mentales.</a></li>
                        <li><a href="telefono.html">Consejos.</a></li>
                        <li><a href="aplicaciones.html">Aplicaciones moviles.</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <MARQUEE BGCOLOR="#FF7070"> NO ESTÁS SOLA/SOLO, RECUERDA QUE NO ESTÁ MAL PEDIR AYUDA, NOSOTROS ESTAMOS CONTIGO NO TE RINDAS JAMAS. </MARQUEE>
    </header>
    <!-- FIN DEL MENU. -->
<!-- TITULO -->
<hr>
    <h1>Una institución te acompaña siempre.</h1>
<!--  FIN TITULO. -->
<br>
<br>
    <!-- Bienvenida. -->
    <p> Hola estudiante del plantel CECyTEM, en este sitio web podrás encontrar información variada para que estes informado/informada y tambien para <br>
        que puedas encontrar ayuda en las instutciones verificadas (puedes encontrarlas en el apartado de arriba dónde dice instuciones) al igual puedes <br>
        marcar al número de las instituciones (en el apartado de numeros de telefono).</p>
        <br>
        <br>
        <br>
        <img src="https://logosave.com/images/large/17/cecytem-logo.gif" class="imagen1">
        <br>
        <br>
        
    <p>A continuación proporcionaremos información básica:</p>
    <!-- FIN BIEVENIDA. -->
    <hr>
    <br>
    <br>
    <!-- CONCEPTO DE QUE SON LOS TRASTORNOS MENTALES. -->
    <h1>¿Qué son los trastornos mentales?</h1>
    <br>
    <br>
    <p>Los trastornos mentales son un grupo de afecciones de la salud mental que afectan el estado de ánimo, el pensamiento y el comportamiento. <br>
        Se caracterizan por una alteración clínicamente significativa de la cognición, la regulación de las emociones o el comportamiento de un individuo. <br>
        Por lo general, van asociados a angustia o a discapacidad funcional en otras áreas importantes. 
        <br><br><br>
        <img src="https://voz.ucad.edu.mx/wp-content/uploads/2020/07/07-Transtornos.jpg" class="imagen1">
        <br><br>
        <p>La Organización Mundial de la Salud (OMS) estima que existen 400 tipos de trastornos mentales. Algunos ejemplos son:</p>
        <br> <br>
        <ul class="lista1">
            <li>Depresión.</li>
            <li>Ansiedad.</li>
            <li>Trastorno de oposición desafiante.</li>
            <li>Trastornos de conducta.</li>
            <li>Trastorno por déficit de atención e hiperactividad (TDAH).</li>
            <li>Síndrome de Gilles de la Tourette.</li>
            <li>Trastorno obsesivo-compulsivo.</li>
            <li>Trastorno por estrés postraumático.</li>
        </ul>
        <br>
        <br>
        <hr>
        <!-- FIN CONCEPTOS DE QUE SON LOS TRASTORNOS MENTALES -->
</p>
<br>
<br>
<br>
<div class="cont">
    <!-- IMAGENES DE LOS EJEMPLOS DE LOS TRASTORNOS: -->
        <!-- DEPRESION -->
        <img src="https://statics-cuidateplus.marca.com/cms/styles/natural/azblob/2023-05/depresion-cerebro.jpg.webp?itok=w_UkUrer" class="imagen2">
        <figcaption>Depresión.</figcaption>
        <!-- ANSIEDAD -->
        <img src="https://images.hola.com/imagenes/estar-bien/20220217204712/tipos-de-ansiedad-caracteristicas-psicologia/1-51-892/mujer-ansiedad-1m-m.jpg?tx=w_680" class="imagen2">
        <figcaption>Ansiedad.</figcaption>
        <!-- Trastorno de oposición desafiante-->
        <img src="https://despertardiario.com/wp-content/uploads/2021/06/trastorno-oposicionista-desafiante.jpg" class="imagen2">
        <figcaption>Trastorno de oposición desafiante.</figcaption>
        <!-- Trastornos de conducta.-->
        
        <!-- Trastorno por déficit de atención e hiperactividad (TDAH). -->
        
</div>
<br><br><br><br><br>
<div class="cont1">
    <img src="https://www.saludymedicina.org/wp-content/uploads/2017/03/TDAH.jpg" class="image">
        <figcaption>Trastorno por déficit de atención e himperactividad (TDAH).</figcaption>
        <!-- Síndrome de Gilles de la Tourette. -->
        <img src="https://cdn0.psicologia-online.com/es/posts/6/8/5/sindrome_de_tourette_sintomas_psicologicos_1586_0_600.jpg" class="image">
        <figcaption>Síndrome de Gilles en la Tourette.</figcaption>
        <!-- Trastorno obsesivo-compulsivo. -->
        <img src="https://www.areahumana.es/wp-content/uploads/2016/10/trastorno-obsesivo-compulsivo-1-1200x900-cropped.jpg" class="image">
        <figcaption>Trastorno obsesivo-compulsivo.</figcaption>
        <!-- Trastorno por estrés postraumático. -->
       
    </div>
<!-- FIN IMAGENES DE LOS EJEMPLOS. -->
<br><br><br><br><br><br><br><

<!-- FOOTER -->
<footer>
    <p>&copy; 2023 Mi Página Web</p>
    <nav>
      <a href="proyecto.html">Inicio</a> |
      <a href="somos.html">¿Quienes somos?</a> |
      <a href="contacto.html">Contacto</a>
    </nav>
  </footer>

</body>
</html>

</body>
</html>