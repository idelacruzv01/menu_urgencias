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

    $stmt = $conn->prepare("SELECT precisa_autorizacion, autorizable_por_terminal, autorizable_por_telefono, 
    telefono_autorizaciones, email_autorizaciones, instrucciones, tac_doble, tac_con_contraste 
    FROM tac WHERE aseguradora_id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datos = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($datos) {
        echo "<div class='bloque-tac'>";
        echo "<h3>Autorización de TACs</h3>";
        echo "<p><strong>Necesita autorización?</strong> " . htmlspecialchars($datos['precisa_autorizacion']) . "</p>";
        echo "<p><strong>Se autoriza por terminal?</strong> " . htmlspecialchars($datos['autorizable_por_terminal']) . "</p>";
        echo "<p><strong>Se autoriza por teléfono?</strong> " . htmlspecialchars($datos['autorizable_por_telefono']) . "</p>";
        echo "<p><strong>Tfno autorizaciones:</strong> " . htmlspecialchars($datos['telefono_autorizaciones']) . "</p>";
        echo "<p><strong>Email autorizaciones:</strong> " . htmlspecialchars($datos['email_autorizaciones']) . "</p>";
        echo "<p><strong>TAC doble: </strong> " . htmlspecialchars($datos['tac_doble']) . "</p>";
        echo "<p><strong>TAC con contraste:</strong> " . htmlspecialchars($datos['tac_con_contraste']) . "</p>";
        echo "<p><strong>Instrucciones:</strong> <br><br>" . nl2br(htmlspecialchars($datos['instrucciones'])) . "</p>";
        echo "</div>";
    } else {
        echo "No se encontraron datos de antígenos con esta aseguradora.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>