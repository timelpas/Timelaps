
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - TIMELAPS</title>
    <link rel="stylesheet" href="admin-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h2 class="logo">TIMELAPS Admin</h2>
        <nav class="navigation">
            <a href="#" id="navPsicologo">Psicólogo</a>
            <a href="#" id="navPacientes">Pacientes</a>
            <button class="btnLogout">Cerrar Sesión</button>
        </nav>
    </header>

    <main>
        <section id="seccionPsicologo" class="admin-form">
            <h2>Lista de Psicólogos</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaPsicologos">
                    <?php
                    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
                    $sql = "SELECT * FROM psicologo";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id_psicologo']}</td>
                                    <td>{$row['nombres']}</td>
                                    <td>{$row['apellido_paterno']} {$row['apellido_materno']}</td>
                                    <td>{$row['telefono']}</td>
                                    <td>{$row['cedula']}</td>
                                    <td>{$row['correo']}</td>
                                    <td>{$row['contrasena']}</td>
                                    
                                    <td>
                                        <button class='btn-action btn-delete'>Eliminar</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay psicólogos registrados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>

            <h2>Asignar Contraseña</h2>
            <form class="cajapsicolo" id="formAsignarContrasena" method="POST" action="asignar_contrasena.php">
                <div class="input-box">
                    <input type="text" id="idPsicologo" name="idPsicologo" required>
                    <label>ID del Psicólogo</label>
                </div>
                <div class="input-box">
                    <input type="password" id="nuevaContrasena" name="nuevaContrasena" required>
                    <label>Nueva Contraseña</label>
                    <i class="fas fa-eye-slash toggle-password" onclick="togglePasswordVisibility('nuevaContrasena')"></i>
                </div>
                <div class="input-box">
                    <input type="password" id="confirmarContrasena" required>
                    <label>Confirmar Contraseña</label>
                    <i class="fas fa-eye-slash toggle-password" onclick="togglePasswordVisibility('confirmarContrasena')"></i>
                </div>
                <p id="mensajeError" class="error-message hidden">Las contraseñas no coinciden</p>
                <button type="submit" class="btn">Asignar Contraseña</button>
            </form>
        </section>

        <section id="seccionPacientes" class="admin-form hidden">
            <h2>Lista de Pacientes</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaPacientes">
                    <?php
                    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos
                    $sql = "SELECT * FROM paciente";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nombre']}</td>
                                    <td>{$row['usuario']}</td>
                                    <td>{$row['telefono']}</td>
                                    <td>{$row['correo']}</td>
                                    <td>
                                        <button class='btn-action btn-delete'>Eliminar</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No hay pacientes registrados</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <script src="admin-script.js"></script>
</body>
</html>
