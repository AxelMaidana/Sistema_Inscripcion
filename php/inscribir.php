<?php
// Incluir la conexión a la base de datos
$conn = include("db.php");

// Verificar si la conexión es válida
if (!$conn) {
    die("Conexión fallida: No se pudo incluir db.php");
}

// Obtener los datos del formulario
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

// Generar usuario y contraseña
$usuario = "tup24-" . $dni;
$contrasena = $dni;

// Insertar datos en la base de datos
$sql = "INSERT INTO estudiantes (usuario, contrasena, dni, nombre, apellido) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssiss", $usuario, $contrasena, $dni, $nombre, $apellido);
    if ($stmt->execute()) {
        echo "<script>alert('Inscripción exitosa, su usuario es $usuario y su contraseña es $contrasena'); window.location.href = 'formAcceder.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error al preparar la declaración: " . $conn->error;
}

$conn->close();
?>
