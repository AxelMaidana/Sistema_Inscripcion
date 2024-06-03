<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tienes un usuario diferente
$password = ""; // Cambia esto si tienes una contraseña diferente
$dbname = "sistema_inscripciones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Retornar la conexión
return $conn;
?>
