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

    $stmt = $conn->prepare("SELECT autorizable_por_terminal, autorizable_por_telefono, 
    telefono_autorizaciones, email_autorizaciones, instrucciones 
    FROM ingresos WHERE aseguradora_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($datos) {
        echo "<div class='bloque-ingresos'>";
        echo "<h3>Autorización de Ingresos</h3>";
        echo "<p><strong>Autorización por terminal:</strong> " . htmlspecialchars($datos['autorizable_por_terminal']) . "</p>";
        echo "<p><strong>Autorización por teléfono:</strong> " . htmlspecialchars($datos['autorizable_por_telefono']) . "</p>";
        echo "<p><strong>Tfno autorizaciones:</strong> " . htmlspecialchars($datos['telefono_autorizaciones']) . "</p>";
        echo "<p><strong>Email autorizaciones:</strong> " . htmlspecialchars($datos['email_autorizaciones']) . "</p>";
        echo "<p><strong>Instrucciones:</strong> <br><br>" . nl2br(htmlspecialchars($datos['instrucciones'])) . "</p>";
        echo "</div>";
    } else {
        echo "No se encontraron datos de autorización de ingreso con esta aseguradora.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>