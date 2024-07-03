<?php
session_start();
require_once '../Iniciotimelaps/conexion.php';

if (!isset($_SESSION['id_psicologo'])) {
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$id_psicologo = $_SESSION['id_psicologo'];

$stmt = $conn->prepare("SELECT nombres, apellido_paterno, apellido_materno, cedula, correo FROM Psicologo WHERE id_psicologo = ?");
$stmt->bind_param("s", $id_psicologo);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Psicólogo no encontrado']);
}

$stmt->close();
$conn->close();
?>