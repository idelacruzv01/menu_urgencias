<?php
require_once '../core/Database.php';

if (!isset($_GET['id'])) {
    echo "Error: ID de aseguradora no proporcionado.";
    exit;
}

$id = (int) $_GET['id'];

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT telefono, horario, mail1, mail2 FROM seguros_salud WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($datos) {
        echo "<div class='bloque-contacto'>";
        echo "<h3>Información de Contacto</h3>";
        echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($datos['telefono']) . "</p>";
        echo "<p><strong>Horario:</strong> " . htmlspecialchars($datos['horario']) . "</p>";
        echo "<p><strong>Email 1:</strong> " . htmlspecialchars($datos['mail1']) . "</p>";
        echo "<p><strong>Email 2:</strong> " . htmlspecialchars($datos['mail2']) . "</p>";
        echo "</div>";
    } else {
        echo "No se encontraron datos de contacto.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
