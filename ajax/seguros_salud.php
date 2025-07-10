<?php
require_once '../core/Database.php'; // Asegúrate de que esta ruta sea correcta

try {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->query("SELECT nombre, logo FROM seguros_salud ORDER BY nombre ASC");
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados) {
        echo "<div class='grid-aseguradoras'>";
            foreach ($resultados as $fila) {
                $nombre = htmlspecialchars($fila['nombre']);
                $logo = htmlspecialchars($fila['logo']);
                $rutaLogo = "img/logos/" . $logo;

                echo "<div class='aseguradora' data-nombre=\"$nombre\" data-logo=\"$logo\">";
                echo "<img src='$rutaLogo' alt='Logo $nombre' class='logo'>";
                echo "<span>$nombre</span>";
                echo "</div>";
            }
            echo "</div>";

    } else {
        echo "No se encontraron aseguradoras.";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
