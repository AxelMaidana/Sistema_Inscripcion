<?php
require 'db.php';

$sql = "SELECT id, nombre, apellido, dni, email, fecha_nacimiento, fecha_inscripcion FROM alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Alumnos Inscritos</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Email</th><th>Fecha de Nacimiento</th><th>Fecha de Inscripción</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["apellido"]. "</td><td>" . $row["dni"]. "</td><td>" . $row["email"]. "</td><td>" . $row["fecha_nacimiento"]. "</td><td>" . $row["fecha_inscripcion"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay alumnos inscritos.";
}

$conn->close();
?>

<!-- Botón para volver al index -->
<div style="margin-top: 20px;">
    <button onclick="location.href='../index.php'">Volver al inicio</button>
</div>
