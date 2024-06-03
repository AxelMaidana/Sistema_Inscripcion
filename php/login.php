<?php
// Conexión a la base de datos
include 'db.php';

// Iniciar sesión
session_start();

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales
    $query = "SELECT * FROM estudiantes WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Las credenciales son válidas, obtener el nombre y apellido del estudiante
        $row = mysqli_fetch_assoc($result);
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];

        // Iniciar sesión y redirigir
        $_SESSION['usuario'] = $usuario;
        echo "<script>alert('Bienvenido, " . $nombre . " " . $apellido . "!'); window.location.href = 'pagePrincipal.php';</script>"; // Mostrar alerta de inicio de sesión exitoso y redirigir
    } else {
        // Credenciales inválidas, mostrar mensaje de error con alerta y redirigir
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href = 'formAcceder.php';</script>";
    }
}
?>
