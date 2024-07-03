<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Psicólogo - TIMELAPS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2 class="logo">TIMELAPS</h2>
        <nav class="navigation">
            <a href="#"><i class="fas fa-home"></i> Inicio</a>
            <a href="#"><i class="fas fa-cog"></i> Configuración</a>
            <button class="btn" id="btnLogout"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</button>
        </nav>
    </header>

    <main>
        <div id="psicologoInfo" class="psicologo-info">
            <!-- La información del psicólogo se insertará aquí dinámicamente -->
        </div>

        <table class="pacientes-table">
            <thead>
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="pacientesList">
                <!-- La lista de pacientes se insertará aquí dinámicamente -->
            </tbody>
        </table>
    </main>

    <footer>
        <div>
            <a href="mailto:timelaps@gmail.com"><i class="fas fa-envelope"></i> timelaps@gmail.com</a>
            <a href="https://wa.me/7751537388"><i class="fab fa-whatsapp"></i> 7751537388</a>
        </div>
        <p>&copy; 2024 TIMELAPS. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>