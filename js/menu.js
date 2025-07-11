
document.getElementById('btn-seguros-salud').addEventListener('click', function () {
    fetch('ajax/seguros_salud.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            activarClicksEnAseguradoras();
        })
        .catch(error => console.error('Error en la petición:', error));
});

function activarClicksEnAseguradoras() {
    const aseguradoras = document.querySelectorAll('.aseguradora');
    aseguradoras.forEach(item => {
        item.addEventListener('click', () => {
            const nombre = item.dataset.nombre;
            const logo = item.dataset.logo;
            mostrarOpciones(nombre, logo);
        });
    });
}

function mostrarOpciones(nombre, logo) {
    const opciones = [
        { texto: "Contacto", icono: "fas fa-phone" },
        { texto: "Urgencias", icono: "fas fa-ambulance" },
        { texto: "Antígenos", icono: "fas fa-vial" },
        { texto: "TAC", icono: "fas fa-x-ray" },
        { texto: "Autorización de Ingreso", icono: "fas fa-file-signature" },
        { texto: "Traslado a otro centro", icono: "fas fa-hospital-alt" },
        { texto: "Traslado a domicilio", icono: "fas fa-house-medical" },
        { texto: "Incidencias", icono: "fas fa-triangle-exclamation" }
    ];

    let html = `
        <div class="cabecera-aseguradora">
            <img src="img/logos/${logo}" alt="Logo ${nombre}" class="logo-seleccionado">
            <h2>¿Qué quieres hacer con <span>${nombre}</span>?</h2>
        </div>
        <div class="opciones">
    `;

    opciones.forEach(opcion => {
        html += `
            <button class="btn-opcion" data-opcion="${opcion.texto}" data-aseguradora="${nombre}">
                <i class="${opcion.icono}"></i>
                <span>${opcion.texto}</span>
            </button>
        `;
    });

    html += `</div>`;
    document.getElementById('resultado').innerHTML = html;

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('btn-opcion')) {
            const opcion = e.target.dataset.opcion;
            const aseguradora = e.target.dataset.aseguradora;

            if (opcion === "Contacto") {
                mostrarContacto(aseguradora);
            }
            // Aquí podrías poner otros ifs para "Urgencias", etc.
        }
    });

    function mostrarContacto(nombre) {
        fetch(`ajax/contacto.php?nombre=${encodeURIComponent(nombre)}`)
            .then(response => response.text())
            .then(data => {
                // Inserta debajo del bloque de opciones, sin reemplazarlo
                const contenedorOpciones = document.querySelector('.opciones');
                let bloqueExistente = document.querySelector('.bloque-contacto');

                if (bloqueExistente) {
                    bloqueExistente.remove(); // Evita duplicados
                }

                contenedorOpciones.insertAdjacentHTML('afterend', data);
            })
            .catch(error => console.error('Error al cargar contacto:', error));
    }


}

