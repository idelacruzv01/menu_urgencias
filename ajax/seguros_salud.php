<?php
require_once '../core/Database.php'; // Ajusta la ruta si tu archivo está en otra ubicación

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->query("SELECT nombre FROM seguros_salud ORDER BY nombre ASC");
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados) {
        echo "<ul>";
        foreach ($resultados as $fila) {
            echo "<li>" . htmlspecialchars($fila['nombre']) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron aseguradoras.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
