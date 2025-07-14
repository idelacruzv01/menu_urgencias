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

    $stmt = $conn->prepare("SELECT precisa_autorizacion, codigo_aut, instrucciones FROM antigenos WHERE aseguradora_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($datos) {
        echo "<div class='bloque-antigeno'>";
        echo "<h3>Información de Antígenos</h3>";
        echo "<p><strong>Necesita autorización?</strong> " . htmlspecialchars($datos['precisa_autorizacion']) . "</p>";
        echo "<p><strong>Codigo:</strong> " . htmlspecialchars($datos['codigo_aut']) . "</p>";
        echo "<p><strong>Instrucciones:</strong> <br><br>" . nl2br(htmlspecialchars($datos['instrucciones'])) . "</p>";
        echo "</div>";
    } else {
        echo "No se encontraron datos de antígenos con esta aseguradora.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>