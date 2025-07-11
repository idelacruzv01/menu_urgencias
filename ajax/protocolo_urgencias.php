<?php
require_once '../core/Database.php';

if (!isset($_GET['id'])) {
    echo "Error: Falta el ID de la aseguradora.";
    exit;
}

$id = (int) $_GET['id'];
echo "<!-- ID recibido: $id -->";

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("
        SELECT codigo_general, codigo_pediatria, terminal, instrucciones 
        FROM protocolos_urgencias 
        WHERE aseguradora_id = :id
    ");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $protocolo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($protocolo) {
        echo "<div class='bloque-protocolo'>";
        echo "<h3>Protocolo de Urgencias</h3>";

        echo "<p><strong>Código General:</strong> " . htmlspecialchars($protocolo['codigo_general']) . "</p>";
        echo "<p><strong>Código Pediátrico:</strong> " . htmlspecialchars($protocolo['codigo_pediatria']) . "</p>";
        echo "<p><strong>Terminal:</strong> " . htmlspecialchars($protocolo['terminal']) . "</p>";
        echo "<p><strong>Instrucciones:</strong><br><br> " . nl2br(htmlspecialchars($protocolo['instrucciones'])) . "</p>";

        echo "</div>";
    } else {
        echo "<div class='bloque-protocolo'>";
        echo "<p>No hay protocolo de urgencias para esta aseguradora.</p>";
        echo "<!-- ID recibido: $id -->";
        echo "</div>";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
