<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array();

    $nombres = $_POST["nombres"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $telefono = $_POST["telefono"];
    $cedula = $_POST["cedula"];
    $correo = $_POST["correo"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "timelaps2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        $response['status'] = 'error';
        $response['message'] = "Error de conexión: " . $conn->connect_error;
    } else {
        // Llamada al procedimiento almacenado para generar un nuevo ID de psicólogo
        $stmt = $conn->prepare("CALL generate_psicologo_id(@new_id)");
        if ($stmt->execute()) {
            $result = $conn->query("SELECT @new_id AS id_psicologo");
            if ($result) {
                $row = $result->fetch_assoc();
                $id_psicologo = $row['id_psicologo'];
                
                // Insertar los datos en la tabla Psicologo
                $stmt = $conn->prepare("INSERT INTO psicologo (id_psicologo, nombres, apellido_paterno, apellido_materno, telefono, cedula, correo) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssss", $id_psicologo, $nombres, $apellido_paterno, $apellido_materno, $telefono, $cedula, $correo);

                if ($stmt->execute()) {
                    $response['status'] = 'success';
                    $response['message'] = "Registro exitoso. Ya puedes iniciar sesión.";
                } else {
                    $response['status'] = 'error';
                    $response['message'] = "Error al registrar: " . $stmt->error;
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = "Error al recuperar el ID generado: " . $conn->error;
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = "Error al generar el ID de psicólogo: " . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }

    echo json_encode($response);
}
?>