<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['usuario'])){
    header("location: formAcceder.php"); // Redirigir a la página de inicio de sesión si no ha iniciado sesión
}

// Conexión a la base de datos
include 'db.php';

// Obtener el nombre del estudiante
$usuario = $_SESSION['usuario'];
$query = "SELECT * FROM estudiantes WHERE usuario = '$usuario'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$nombre = $row['nombre'];
$apellido = $row['apellido'];

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Inscripción de Alumnos</title>
    <style>
        /* Estilos personalizados */
        .hero-bg {
            background-image: url('https://frro.cvg.utn.edu.ar/theme/image.php/snap/theme/1710991180/img/bg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- header -->
    <header class="w-full bg-gray-900 shadow-md">
        <nav class="flex justify-between items-center w-full py-4 px-6">
            <div class="flex items-center space-x-4 ml-12">
                <a href="./pagePrincipal.php" aria-label="logo" class="flex items-center space-x-2">
                    <img src="https://frro.cvg.utn.edu.ar/theme/image.php/snap/theme/1710991180/img/logo" class="w-100 h-10" alt="logo">
                </a>
            </div>
            <div class="hidden lg:flex items-center space-x-6 gap-x-8 mr-12">
    <p class="text-gray-300 border-r-2 border-gray-400 pr-16">
        <span class="hover:text-white transition transform hover:scale-110"><?php echo $nombre . " " . $apellido; ?></span>
    </p>
    <a href="./logout.php" class="text-gray-300 hover:text-white hover:scale-105 transform transition">Cerrar sesión</a>
</div>



            <div class="lg:hidden flex items-center">
                <button id="menu-button" class="text-gray-600 hover:text-primary transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <div id="mobile-menu" class="hidden lg:hidden flex flex-col items-center space-y-4 p-4 bg-white shadow-md">
            <a href="#carreras" class="text-gray-600 hover:text-primary transition">Carreras</a>
            <a href="#investigacion" class="text-gray-600 hover:text-primary transition">Investigación</a>
            <a href="#asuntos-universitarios" class="text-gray-600 hover:text-primary transition">Asuntos Univ.</a>
            <a href="#extension" class="text-gray-600 hover:text-primary transition">Extensión</a>
        </div>
    </header>
    <!-- fin de header -->

    <!-- Contenido principal -->
    <div class="flex-grow flex flex-col items-center justify-center my-8">
        <!-- Hero -->
        <section class="hero-bg w-full h-64 flex items-center justify-center text-white text-center p-4">
            <div class="bg-gray-900 p-8 rounded-xl">
                <h1 class="text-4xl font-bold mb-4">Inscripción de Alumnos</h1>
                <p class="text-lg">Bienvenidos a la Universidad Tecnológica Nacional. Aquí podrás inscribirte en las distintas carreras y participar en nuestros programas de investigación y extensión.</p>
            </div>
        </section>
        <!-- fin de hero -->

        <!-- Sección de Carreras -->
        <section id="carreras" class="w-full bg-white py-8">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold mb-4">Carreras</h2>
                <p class="text-gray-700 mb-6">Ofrecemos una amplia variedad de carreras tecnológicas y de ingeniería.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Repetir este bloque para cada carrera -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Ingeniería en Sistemas</h3>
                        <p class="text-gray-700">Descripción breve de la carrera.</p>
                    </div>
                    <!-- Fin del bloque -->
                </div>
            </div>
        </section>
        <!-- Fin de sección de Carreras -->

        <!-- Sección de Investigación -->
        <section id="investigacion" class="w-full bg-gray-100 py-8">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold mb-4">Investigación</h2>
                <p class="text-gray-700 mb-6">Participa en nuestros proyectos de investigación y contribuye al avance tecnológico.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Repetir este bloque para cada proyecto de investigación -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Proyecto de Investigación 1</h3>
                        <p class="text-gray-700">Descripción breve del proyecto.</p>
                    </div>
                    <!-- Fin del bloque -->
                </div>
            </div>
        </section>
        <!-- Fin de sección de Investigación -->

        <!-- Sección de Asuntos Universitarios -->
        <section id="asuntos-universitarios" class="w-full bg-white py-8">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold mb-4">Asuntos Universitarios</h2>
                <p class="text-gray-700 mb-6">Información sobre servicios y actividades universitarias.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Repetir este bloque para cada asunto universitario -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Servicio Universitario 1</h3>
                        <p class="text-gray-700">Descripción breve del servicio.</p>
                    </div>
                    <!-- Fin del bloque -->
                </div>
            </div>
        </section>
        <!-- Fin de sección de Asuntos Universitarios -->

        <!-- Sección de Extensión -->
        <section id="extension" class="w-full bg-gray-100 py-8">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold mb-4">Extensión</h2>
                <p class="text-gray-700 mb-6">Participa en nuestros programas de extensión y vinculación con la comunidad.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Repetir este bloque para cada programa de extensión -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Programa de Extensión 1</h3>
                        <p class="text-gray-700">Descripción breve del programa.</p>
                    </div>
                    <!-- Fin del bloque -->
                </div>
            </div>
        </section>
        <!-- Fin de sección de Extensión -->
    </div>
    
    <!-- Footer -->
 <footer class="bg-gray-900 w-full p-6 mt-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 justify-center align-middle">
        
            
            <div class=" text-center mt-24 inline-flex ml-36 gap-x-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="none" viewBox="0 0 150 104"><path fill="white" d="M150 49.027c0-26.944-33.685-48.87-75-48.87-41.501 0-75 21.926-75 48.87v2.787c0 28.616 29.404 51.843 75 51.843 45.968 0 75-23.227 75-51.843v-2.787Z"/><path fill="#1A202C" d="M147.022 49.027c0 25.457-32.196 46.083-72.022 46.083-39.826 0-72.022-20.626-72.022-46.083C2.978 23.57 35.174 2.944 75 2.944c39.826.186 72.022 20.626 72.022 46.083Z"/><path fill="transparent " d="M50.993 34.533s-.745.743-.373 1.487c1.117 1.486 4.653 2.23 8.189 1.486 2.047-.557 4.839-2.601 7.444-4.645 2.792-2.23 5.583-4.46 8.56-5.389 2.979-.93 4.84-.558 6.142-.186 1.49.372 2.978 1.3 5.584 3.345 5.024 3.716 24.751 20.997 28.101 23.97 2.792-1.3 15.075-6.503 31.638-10.22-1.117-8.919-6.514-17.095-14.702-23.784-11.353 4.831-25.31 7.247-39.082.557 0 0-7.444-3.53-14.702-3.345-10.794.186-15.447 5.017-20.472 9.849l-6.327 6.875Z"/><path fill="transparent" d="M114.082 56.274c-.186-.186-23.263-20.44-28.474-24.342-2.978-2.23-4.653-2.788-6.514-3.16-.93-.185-2.233 0-3.163.372-2.42.744-5.584 2.788-8.375 5.017-2.978 2.416-5.77 4.46-8.189 5.017-3.163.93-7.258 0-9.119-1.114-.744-.558-1.303-1.115-1.489-1.673-.744-1.486.559-2.787.745-2.973l6.327-6.875 2.233-2.23c-2.047.186-3.908.743-5.769 1.3-2.233.558-4.466 1.302-6.7 1.302-.93 0-5.955-.744-6.885-1.115-5.77-1.487-10.794-3.16-18.425-6.69C11.166 25.8 5.211 34.161 3.536 43.452c1.303.372 3.35.93 4.28 1.115 20.472 4.46 26.8 9.291 28.102 10.22 1.303-1.3 2.978-2.23 5.025-2.23 2.233 0 4.28 1.115 5.583 2.974 1.117-.93 2.792-1.673 4.839-1.673.93 0 1.86.186 2.977.558a6.83 6.83 0 0 1 4.095 3.716c.744-.372 1.675-.557 2.791-.557 1.117 0 2.233.185 3.35.743 3.722 1.672 4.28 5.389 4.094 8.176h.745c4.466 0 8.189 3.716 8.189 8.176 0 1.3-.373 2.601-.931 3.902 1.303.743 4.28 2.23 7.072 1.858 2.233-.186 2.978-.929 3.35-1.486.186-.372.372-.558.186-.93l-5.77-6.503s-.93-.93-.558-1.3c.373-.372.93.185 1.303.557 2.978 2.415 6.514 6.132 6.514 6.132s.372.557 1.675.743c1.116.186 3.163 0 4.652-1.115.373-.372.745-.743.93-1.115 1.49-1.858-.185-3.716-.185-3.716l-6.7-7.619s-.93-.929-.558-1.3c.372-.372.93.185 1.302.557a253.206 253.206 0 0 1 8.003 7.619c.558.371 3.164 2.044 6.513-.186 2.048-1.301 2.42-2.973 2.42-4.274-.186-1.672-1.489-2.787-1.489-2.787l-9.305-9.291s-.93-.744-.558-1.301c.372-.372.93.186 1.302.557 2.978 2.416 10.98 9.663 10.98 9.663.186 0 2.792 2.044 6.328-.186 1.303-.743 2.047-1.858 2.047-3.345-.372-2.044-2.047-3.53-2.047-3.53Z"/><path fill="transparent" d="M69.417 67.98c-1.489 0-2.978.744-3.164.744-.186 0 0-.558.186-.93.186-.371 2.047-5.946-2.605-7.99-3.536-1.486-5.583.186-6.328.93-.186.185-.372.185-.372 0 0-.93-.558-3.717-3.536-4.646-4.28-1.3-7.072 1.672-7.816 2.787-.373-2.415-2.42-4.46-5.025-4.46a5 5 0 0 0-5.025 5.018 5 5 0 0 0 5.025 5.017c1.303 0 2.605-.558 3.536-1.487v.186c-.186 1.3-.559 5.76 4.094 7.619 1.861.743 3.536.186 4.839-.744.372-.371.372-.185.372.186-.186 1.115 0 3.717 3.536 5.017 2.605 1.115 4.28 0 5.21-.929.373-.371.56-.371.56.372.185 3.345 2.977 5.946 6.327 5.946 3.536 0 6.327-2.787 6.327-6.318.186-3.344-2.605-6.132-6.141-6.318Z"/><path fill="white" d="M115.012 53.858c-7.072-6.132-23.635-20.44-27.915-23.785-2.606-1.858-4.28-2.973-5.77-3.344-.744-.186-1.674-.372-2.791-.372s-2.42.186-3.536.558c-2.792.929-5.77 3.158-8.56 5.388l-.187.186c-2.605 2.044-5.21 4.088-7.258 4.646-.93.185-1.861.371-2.605.371-2.234 0-4.28-.743-5.025-1.672-.186-.186 0-.372.186-.744l6.141-7.06c4.839-4.832 9.492-9.477 20.1-9.663h.558c6.7 0 13.213 2.973 13.958 3.345 6.327 2.973 12.655 4.46 19.168 4.46 6.7 0 13.586-1.673 21.03-5.018-.744-.743-1.675-1.3-2.605-2.044-6.328 2.787-12.469 4.088-18.425 4.088-5.955 0-12.096-1.486-17.866-4.274-.372-.186-7.63-3.53-15.26-3.53h-.558c-8.933.186-13.958 3.344-17.308 6.132-3.35 0-6.142.929-8.747 1.672-2.233.558-4.28 1.115-6.142 1.115h-2.233c-2.233 0-13.213-2.787-21.96-6.132-.93.557-1.675 1.3-2.605 2.044 9.119 3.716 20.285 6.69 23.82 6.875.931 0 2.048.186 2.979.186 2.233 0 4.652-.557 6.885-1.3 1.303-.372 2.792-.744 4.28-1.116l-1.302 1.301-6.328 6.876c-.558.557-1.674 1.858-.93 3.53.372.743.93 1.3 1.675 1.858 1.489.93 4.28 1.673 6.7 1.673.93 0 1.86 0 2.605-.372 2.606-.557 5.397-2.787 8.375-5.203 2.42-1.858 5.77-4.274 8.188-5.017.745-.186 1.675-.372 2.234-.372h.558c1.675.186 3.35.744 6.328 2.973 5.21 3.903 28.287 24.157 28.473 24.343 0 0 1.489 1.3 1.303 3.344 0 1.115-.744 2.23-1.861 2.974-.93.557-2.047.929-2.978.929-1.488 0-2.605-.744-2.605-.744s-8.002-7.247-10.98-9.662c-.372-.372-.93-.744-1.303-.744-.186 0-.372.186-.558.372-.372.557 0 1.3.744 1.858l9.305 9.291s1.117 1.115 1.303 2.416c0 1.486-.744 2.787-2.233 3.902-1.117.743-2.233 1.115-3.35 1.115-1.489 0-2.42-.557-2.605-.743l-1.303-1.301c-2.42-2.416-4.839-4.831-6.7-6.318-.372-.371-.93-.743-1.303-.743-.186 0-.372 0-.558.186-.186.186-.372.743.186 1.3a2.3 2.3 0 0 0 .372.558l6.7 7.618s1.303 1.673.186 3.16l-.186.37-.558.558c-1.117.93-2.606 1.115-3.35 1.115h-.93c-.745-.186-1.117-.371-1.303-.557-.373-.372-3.722-3.902-6.514-6.132-.372-.372-.744-.743-1.303-.743-.186 0-.372 0-.558.185-.558.558.372 1.487.558 1.859l5.77 6.317s0 .186-.186.372c-.187.372-.931.93-2.978 1.3h-.745c-2.233 0-4.466-1.114-5.583-1.672.559-1.115.745-2.415.745-3.716 0-4.645-3.908-8.548-8.561-8.548h-.372c.186-2.23-.186-6.317-4.28-7.99-1.117-.557-2.42-.743-3.537-.743-.93 0-1.86.186-2.605.557-.93-1.672-2.233-2.973-4.28-3.53-1.117-.372-2.048-.558-3.164-.558-1.675 0-3.35.558-4.839 1.487-1.303-1.672-3.536-2.787-5.583-2.787-1.861 0-3.722.743-5.211 2.044-1.861-1.301-8.933-5.947-27.916-10.22-.93-.186-2.977-.744-4.28-1.115-.186 1.115-.372 2.044-.558 3.159 0 0 3.536.929 4.28.929 19.355 4.274 25.868 8.733 26.985 9.662a7.446 7.446 0 0 0-.558 2.787c0 4.089 3.35 7.247 7.258 7.247.372 0 .93 0 1.303-.185.558 2.973 2.605 5.203 5.397 6.317.93.372 1.675.558 2.605.558.558 0 1.117 0 1.675-.186.558 1.3 1.861 3.159 4.466 4.274.931.372 1.861.557 2.792.557.745 0 1.489-.185 2.233-.371 1.303 3.159 4.467 5.389 8.003 5.389 2.233 0 4.466-.93 6.141-2.602 1.303.743 4.28 2.23 7.258 2.23h1.117c2.978-.372 4.28-1.487 4.839-2.416.186-.186.186-.371.372-.557.744.186 1.489.371 2.233.371 1.675 0 3.164-.557 4.653-1.672 1.489-1.115 2.605-2.601 2.791-4.088.559.186 1.117.186 1.489.186 1.675 0 3.35-.558 4.839-1.487 2.977-2.044 3.536-4.46 3.536-6.132.558.186 1.116.186 1.675.186 1.489 0 2.977-.557 4.466-1.3a6.49 6.49 0 0 0 3.164-5.018c.186-1.486-.186-2.787-.931-4.088 5.025-2.23 16.378-6.318 29.963-9.29 0-1.116-.186-2.045-.372-3.16-16.191 2.974-28.288 8.176-31.452 9.477ZM69.417 80.244c-3.164 0-5.77-2.415-5.956-5.574 0-.186 0-.93-.558-.93-.186 0-.372.187-.744.372-.745.558-1.675 1.301-2.792 1.301-.558 0-1.302-.186-1.86-.371-3.35-1.301-3.35-3.717-3.165-4.646 0-.186 0-.557-.186-.743l-.186-.186h-.186c-.186 0-.372 0-.558.186-1.117.743-2.047 1.115-2.978 1.115-.558 0-1.116-.186-1.675-.372-4.466-1.672-4.094-5.946-3.908-7.061 0-.186 0-.372-.186-.557l-.372-.186-.373.371c-.93.744-2.047 1.301-3.163 1.301-2.606 0-4.653-2.044-4.653-4.645 0-2.602 2.047-4.646 4.653-4.646 2.233 0 4.28 1.672 4.466 3.902l.186 1.301.745-1.115c0-.186 1.86-2.973 5.397-2.973.558 0 1.302.186 2.047.372 2.791.743 3.164 3.344 3.164 4.273 0 .558.558.558.558.558.186 0 .372-.186.558-.186.559-.557 1.675-1.486 3.35-1.486.745 0 1.675.185 2.606.557 4.28 1.858 2.419 7.247 2.419 7.433-.372.929-.372 1.3 0 1.486h.372c.186 0 .372 0 .745-.186.558-.185 1.489-.557 2.233-.557 3.164 0 5.955 2.602 5.955 5.946 0 3.345-2.605 5.946-5.955 5.946Z"/></svg>
                <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.0//EN'  'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'><svg enable-background="new 0 0 32 20" height="40" overflow="visible" viewBox="0 0 32 20" width="40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g id="Master_Card_1_"><g id="Master_Card"><circle cx="10" cy="10" fill="white" id="Red_x5F_Circle" r="10"/><path d="M22,0c-2.246,0-4.312,0.75-5.98,2H16v0.014        C15.604,2.312,15.24,2.648,14.893,3h2.214c0.308,0.313,0.592,0.648,0.855,1H14.03c-0.242,0.319-0.464,0.652-0.667,1h5.264        c0.188,0.324,0.365,0.654,0.518,1h-6.291c-0.143,0.325-0.269,0.658-0.377,1h7.044c0.104,0.326,0.186,0.661,0.258,1h-7.563        c-0.067,0.328-0.123,0.66-0.157,1h7.881C19.979,9.328,20,9.661,20,10h-8c0,0.339,0.027,0.67,0.06,1h7.882        c-0.038,0.339-0.093,0.672-0.162,1h-7.563c0.069,0.341,0.158,0.673,0.261,1h7.044c-0.108,0.342-0.234,0.675-0.377,1h-6.291        c0.151,0.344,0.321,0.678,0.509,1h5.264c-0.202,0.348-0.427,0.681-0.669,1H14.03c0.266,0.352,0.553,0.687,0.862,1h2.215        c-0.348,0.353-0.711,0.688-1.107,0.986C17.672,19.245,19.745,20,22,20c5.523,0,10-4.478,10-10S27.523,0,22,0z" fill="gray" id="Yellow_x5F_Circle"/></g></g></g></svg>
                <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="40" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="形状_1_3_" style="enable-background:new    ;"><g id="形状_1"><g><path d="M211.328,184.445l-23.465,144.208h37.542l23.468-144.208     H211.328z M156.276,184.445l-35.794,99.185l-4.234-21.358l0.003,0.007l-0.933-4.787c-4.332-9.336-14.365-27.08-33.31-42.223     c-5.601-4.476-11.247-8.296-16.705-11.559l32.531,124.943h39.116l59.733-144.208H156.276z M302.797,224.48     c0-16.304,36.563-14.209,52.629-5.356l5.357-30.972c0,0-16.534-6.288-33.768-6.288c-18.632,0-62.875,8.148-62.875,47.739     c0,37.26,51.928,37.723,51.928,57.285c0,19.562-46.574,16.066-61.944,3.726l-5.586,32.373c0,0,16.763,8.148,42.382,8.148     c25.616,0,64.272-13.271,64.272-49.37C355.192,244.272,302.797,240.78,302.797,224.48z M455.997,184.445h-30.185     c-13.938,0-17.332,10.747-17.332,10.747l-55.988,133.461h39.131l7.828-21.419h47.728l4.403,21.419h34.472L455.997,184.445z      M410.27,277.641l19.728-53.966l11.098,53.966H410.27z" style="fill-rule:evenodd;clip-rule:evenodd;fill:white;"/></g></g></g><g id="形状_1_2_" style="enable-background:new    ;"><g id="形状_1_1_"><g><path d="M104.132,198.022c0,0-1.554-13.015-18.144-13.015H25.715     l-0.706,2.446c0,0,28.972,5.906,56.767,28.033c26.562,21.148,35.227,47.51,35.227,47.51L104.132,198.022z" style="fill-rule:evenodd;clip-rule:evenodd;fill:gray;"/></g></g></g></svg>
                
            </div>

            <div class="mb-0 text-center justify-center">
                <h1 class="text-4xl text-gray-500">UTN</h1>
                <p class="text-2xl text-gray-600">Mejorando la calidad de la educación</p>
                <nav class="mb-6 text-center pt-6">
                <a href="#" class="text-gray-500 mx-2 hover:text-white">Home</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">About</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">Shop</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">New Arrivals</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">Bestsellers</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">B2B</a>
                <a href="#" class="text-gray-500 mx-2 hover:text-white">Contact</a>
            </nav>
            <div class="text-center mb-4 text-sm text-gray-600">
                <p>© 2022 Nama Home Studio</p>
                <p>
                    <a href="#" class="hover:text-white">Newsletter</a> |
                    <a href="#" class="hover:text-white">Terms</a> |
                    <a href="#" class="hover:text-white">Shipping</a> |
                    <a href="mailto:Namaste@NamaHome.In" class="hover:text-white">Namaste@NamaHome.In</a>
                </p>
                <p>copyright©M/s Nodi India. All rights reserved</p>
            </div>
            </div>

            <div class="mb-2 text-center mt-24 inline-flex ml-48 gap-x-10">
                <a href="#"><svg class=" fill-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" fill="white" height="30" width="30"><defs><linearGradient x1="50%" x2="50%" y1="97.078%" y2="0%" id="a"><stop offset="0%" stop-color="#0062E0"/><stop offset="100%" stop-color="#19AFFF"/></linearGradient></defs><path d="M15 35.8C6.5 34.3 0 26.9 0 18 0 8.1 8.1 0 18 0s18 8.1 18 18c0 8.9-6.5 16.3-15 17.8l-1-.8h-4l-1 .8z"/><path fill="#1A202C" d="m25 23 .8-5H21v-3.5c0-1.4.5-2.5 2.7-2.5H26V7.4c-1.3-.2-2.7-.4-4-.4-4.1 0-7 2.5-7 7v4h-4.5v5H15v12.7c1 .2 2 .3 3 .3s2-.1 3-.3V23h4z"/></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" preserveAspectRatio="xMidYMid" viewBox="0 0 256 256"><path fill="#fff" d="M128 23.064c34.177 0 38.225.13 51.722.745 12.48.57 19.258 2.655 23.769 4.408 5.974 2.322 10.238 5.096 14.717 9.575 4.48 4.479 7.253 8.743 9.575 14.717 1.753 4.511 3.838 11.289 4.408 23.768.615 13.498.745 17.546.745 51.723 0 34.178-.13 38.226-.745 51.723-.57 12.48-2.655 19.257-4.408 23.768-2.322 5.974-5.096 10.239-9.575 14.718-4.479 4.479-8.743 7.253-14.717 9.574-4.511 1.753-11.289 3.839-23.769 4.408-13.495.616-17.543.746-51.722.746-34.18 0-38.228-.13-51.723-.746-12.48-.57-19.257-2.655-23.768-4.408-5.974-2.321-10.239-5.095-14.718-9.574-4.479-4.48-7.253-8.744-9.574-14.718-1.753-4.51-3.839-11.288-4.408-23.768-.616-13.497-.746-17.545-.746-51.723 0-34.177.13-38.225.746-51.722.57-12.48 2.655-19.258 4.408-23.769 2.321-5.974 5.095-10.238 9.574-14.717 4.48-4.48 8.744-7.253 14.718-9.575 4.51-1.753 11.288-3.838 23.768-4.408 13.497-.615 17.545-.745 51.723-.745M128 0C93.237 0 88.878.147 75.226.77c-13.625.622-22.93 2.786-31.071 5.95-8.418 3.271-15.556 7.648-22.672 14.764C14.367 28.6 9.991 35.738 6.72 44.155 3.555 52.297 1.392 61.602.77 75.226.147 88.878 0 93.237 0 128c0 34.763.147 39.122.77 52.774.622 13.625 2.785 22.93 5.95 31.071 3.27 8.417 7.647 15.556 14.763 22.672 7.116 7.116 14.254 11.492 22.672 14.763 8.142 3.165 17.446 5.328 31.07 5.95 13.653.623 18.012.77 52.775.77s39.122-.147 52.774-.77c13.624-.622 22.929-2.785 31.07-5.95 8.418-3.27 15.556-7.647 22.672-14.763 7.116-7.116 11.493-14.254 14.764-22.672 3.164-8.142 5.328-17.446 5.95-31.07.623-13.653.77-18.012.77-52.775s-.147-39.122-.77-52.774c-.622-13.624-2.786-22.929-5.95-31.07-3.271-8.418-7.648-15.556-14.764-22.672C227.4 14.368 220.262 9.99 211.845 6.72c-8.142-3.164-17.447-5.328-31.071-5.95C167.122.147 162.763 0 128 0Zm0 62.27C91.698 62.27 62.27 91.7 62.27 128c0 36.302 29.428 65.73 65.73 65.73 36.301 0 65.73-29.428 65.73-65.73 0-36.301-29.429-65.73-65.73-65.73Zm0 108.397c-23.564 0-42.667-19.103-42.667-42.667S104.436 85.333 128 85.333s42.667 19.103 42.667 42.667-19.103 42.667-42.667 42.667Zm83.686-110.994c0 8.484-6.876 15.36-15.36 15.36-8.483 0-15.36-6.876-15.36-15.36 0-8.483 6.877-15.36 15.36-15.36 8.484 0 15.36 6.877 15.36 15.36Z"/></svg></a>
                <a href="#"><svg width="30" height="30" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 256"><path fill="#fff" d="M218.123 218.127h-37.931v-59.403c0-14.165-.253-32.4-19.728-32.4-19.756 0-22.779 15.434-22.779 31.369v60.43h-37.93V95.967h36.413v16.694h.51a39.907 39.907 0 0 1 35.928-19.733c38.445 0 45.533 25.288 45.533 58.186l-.016 67.013ZM56.955 79.27c-12.157.002-22.014-9.852-22.016-22.009-.002-12.157 9.851-22.014 22.008-22.016 12.157-.003 22.014 9.851 22.016 22.008A22.013 22.013 0 0 1 56.955 79.27m18.966 138.858H37.95V95.967h37.97v122.16ZM237.033.018H18.89C8.58-.098.125 8.161-.001 18.471v219.053c.122 10.315 8.576 18.582 18.89 18.474h218.144c10.336.128 18.823-8.139 18.966-18.474V18.454c-.147-10.33-8.635-18.588-18.966-18.453" fill="#1A202C"/></svg></a>
            </div>
        </div>
    </footer>

<script>
  const menuButton = document.getElementById('menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  
  menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>

</body> <!-- fin de body -->
</html>