<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"] ?? '';
    $contrasena = $_POST["contrasena"] ?? '';

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "timelaps2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta para buscar en la tabla Psicologo (con contraseña encriptada)
    $stmt = $conn->prepare("SELECT * FROM psicologo WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($contrasena, $user['contrasena'])) {
            $_SESSION["correo"] = $correo;
            $_SESSION["tipo_usuario"] = "psicologo";
            header("Location: ../Psicologo/psicologo.php");
            exit();
        }
    }

    // Si no se encontró en Psicologo, buscar en Administrador (con contraseña sin encriptar)
    $stmt = $conn->prepare("SELECT * FROM administrador WHERE correo = ? AND contrasena = ?");
    $stmt->bind_param("ss", $correo, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION["correo"] = $correo;
        $_SESSION["tipo_usuario"] = "administrador";
        header("Location: ../Administrador/administrador.php");
        exit();
    }

    // Si llegamos aquí, las credenciales son inválidas
    echo "Credenciales inválidas. Por favor, intenta nuevamente.";

    $stmt->close();
    $conn->close();
}
?>