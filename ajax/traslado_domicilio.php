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

    $stmt = $conn->prepare("SELECT tc.telefono_traslados, tc.email_traslados, td.instrucciones 
                        FROM traslado_domicilio td
                        JOIN traslado_contacto tc ON td.contacto_id = tc.id
                        WHERE tc.aseguradora_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($datos) {
        echo "<div class='bloque_traslado_domicilio'>";
        echo "<h3>Gestión de traslados hospitalarios a domicilio</h3>";
        echo "<p><strong>Tfno. Traslados:</strong> " . htmlspecialchars($datos['telefono_traslados']) . "</p>";
        echo "<p><strong>Email Traslados:</strong> " . htmlspecialchars($datos['email_traslados']) . "</p>";
        echo "<p><strong>Instrucciones:</strong> <br><br>" . nl2br(htmlspecialchars($datos['instrucciones'])) . "</p>";
        echo "</div>";
    } else {
        echo "No se encontraron datos para gestionar traslados con esta aseguradora.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>