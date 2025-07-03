<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Protocolos</title>
    <link rel="stylesheet" href="estilo_menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>Hospital Quirónsalud Toledo</h1>
    </header>

    <main>
        <section class="buscador">
            <input type="text" id="buscarAseguradora" placeholder="Buscar aseguradora...">
        </section>

        <section class="menu">
            <button class="btn-menu" data-tipo="salud" id="btn-seguros-salud">
                <i class="fas fa-user-md"></i>
                <span>Seguros Salud</span>
            </button>
            <button class="btn-menu" data-tipo="accidentes">
                <i class="fas fa-running"></i>
                <span>Seguros Deportivos y Accidentes</span>
            </button>
            <button class="btn-menu" data-tipo="mutuas">
                <i class="fas fa-briefcase-medical"></i>
                <span>Mutuas Laborales</span>
            </button>
            <button class="btn-menu" data-tipo="privados">
                <i class="fas fa-user"></i>
                <span>Privados</span>
            </button>
            <button class="btn-menu" data-tipo="internacional">
                <i class="fas fa-globe"></i>
                <span>Internacional</span>
            </button>
            <button class="btn-menu" data-tipo="trafico">
                <i class="fas fa-car-crash"></i>
                <span>Tráfico</span>
            </button>
            <button class="btn-menu" data-tipo="cuadro">
                <i class="fas fa-address-book"></i>
                <span>Cuadro Médico</span>
            </button>
        </section>

        <section id="resultado"></section>
    </main>

    <footer>
        <p>&copy; 2025 Hospital Quirónsalud Toledo</p>
    </footer>

    <script src="menu.js"></script>
    
</body>
</html>
