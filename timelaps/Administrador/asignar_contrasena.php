<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php'; // Incluye el archivo de conexión a la base de datos

    $idPsicologo = $_POST['idPsicologo'];
    $nuevaContrasena = password_hash($_POST['nuevaContrasena'], PASSWORD_DEFAULT);

    $sql = "UPDATE psicologo SET contrasena = ? WHERE id_psicologo = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $nuevaContrasena, $idPsicologo);
        if ($stmt->execute()) {
            
            header("Location: administrador.php?mensaje=Contraseña actualizada exitosamente");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>
