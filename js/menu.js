/*Evento para el botón de seguros de salud*/
document.getElementById('btn-seguros-salud').addEventListener('click', function () {
    limpiarBloquesAseguradoras();
    fetch('ajax/seguros_salud.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            activarClicksEnAseguradoras();
        })
        .catch(error => console.error('Error en la petición:', error));
});

/*Evento para el botón de seguros de deportes y accidentes*/
document.getElementById('btn-seguros-deportes').addEventListener('click', function () {
    limpiarBloquesAseguradoras();
    fetch('ajax/seguros_deportes.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            activarClicksEnAseguradoras();
        })
        .catch(error => console.error('Error en la petición:', error));
});

/*Evento para el botón de mutuas laborales*/
document.getElementById('btn-mutuas-laborales').addEventListener('click', function () {
    limpiarBloquesAseguradoras();
    fetch('ajax/mutuas_laborales.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            activarClicksEnAseguradoras();
        })
        .catch(error => console.error('Error en la petición:', error));
});

/*Función para limpiar los bloques de grid con el resultado de las aseguradoras de cada tipo*/
function limpiarBloquesAseguradoras() {
    document.getElementById('resultado').innerHTML = '';
}


function activarClicksEnAseguradoras() {
    const aseguradoras = document.querySelectorAll('.aseguradora');
    aseguradoras.forEach(item => {
        item.addEventListener('click', () => {
            const nombre = item.dataset.nombre;
            const logo = item.dataset.logo;
            const id = item.dataset.id;
            mostrarOpciones(nombre, logo, id);
        });
    });
}

function mostrarOpciones(nombre, logo, id) {
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
            <button class="btn-opcion" data-opcion="${opcion.texto}" data-id="${id}">
                <i class="${opcion.icono}"></i>
                <span>${opcion.texto}</span>
            </button>
        `;
    });

    html += `</div>`;
    document.getElementById('resultado').innerHTML = html;
}


document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-opcion')) {
        const opcion = e.target.dataset.opcion;
        const id = e.target.dataset.id; // ✅ ya no necesitas buscarlo

        if (opcion === "Contacto") {
            mostrarContacto(id);
        }

        if (opcion === "Urgencias") {
            mostrarUrgencias(id);
        }

        if (opcion === "Antígenos") {
            mostrarAntigenos(id);
        }

        if (opcion === "TAC") {
            mostrarTacs(id);
        }

        if (opcion === "Autorización de Ingreso") {
            mostrarIngresos(id);
        }

        if (opcion === "Traslado a otro centro") {
            mostrarTrasladosOtrosCentros(id);
        }

        if (opcion === "Traslado a domicilio") {
            mostrarTrasladosDomicilio(id);
        }
    }
});


function mostrarContacto(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/contacto.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
            const contenedorOpciones = document.querySelector('.opciones');
            let bloqueExistente = document.querySelector('.bloque-contacto');
            if (bloqueExistente) bloqueExistente.remove();
            contenedorOpciones.insertAdjacentHTML('afterend', data);
        })
        .catch(error => console.error('Error al cargar contacto:', error));
}

function mostrarUrgencias(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/protocolo_urgencias.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
            const bloqueExistente = document.querySelector('.bloque-protocolo');
            if (bloqueExistente) bloqueExistente.remove();
            const contenedor = document.querySelector('.opciones');
            contenedor.insertAdjacentHTML('afterend', data);
        })
        .catch(error => console.error('Error al cargar protocolo de urgencias:', error));
}

function limpiarBloquesDinamicos() {
    const bloques = document.querySelectorAll('.bloque-contacto, .bloque-protocolo, .bloque-antigeno, .bloque-tac, .bloque-ingresos, .bloque_traslado_hospitalario, .bloque_traslado_domicilio, .bloque-incidencias');
    bloques.forEach(b => b.remove());
}

function mostrarAntigenos(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/antigeno.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
        const bloqueExistente = document.querySelector('.bloque-antigeno');
        if(bloqueExistente) bloqueExistente.remove();
        const contenedor = document.querySelector('.opciones');
        contenedor.insertAdjacentHTML('afterend', data);
    })
    .catch(error => console.error('Error al cargar los datos de antígenos:', error))
}

function mostrarTacs(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/tac.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
        const bloqueExistente = document.querySelector('.bloque-tac');
        if(bloqueExistente) bloqueExistente.remove();
        const contenedor = document.querySelector('.opciones');
        contenedor.insertAdjacentHTML('afterend', data);
    })
    .catch(error => console.error('Error al cargar los datos de autorizaciones de TACs:', error))
}

function mostrarIngresos(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/ingreso.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
        const bloqueExistente = document.querySelector('.bloque-ingresos');
        if(bloqueExistente) bloqueExistente.remove();
        const contenedor = document.querySelector('.opciones');
        contenedor.insertAdjacentHTML('afterend', data);
    })
    .catch(error => console.error('Error al cargar los datos de autorizaciones de Ingresos:', error))
}

function mostrarTrasladosOtrosCentros(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/traslado_hospitalario.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
        const bloqueExistente = document.querySelector('.bloque_traslado_hospitalario');
        if(bloqueExistente) bloqueExistente.remove();
        const contenedor = document.querySelector('.opciones');
        contenedor.insertAdjacentHTML('afterend', data);
    })
    .catch(error => console.error('Error al cargar los datos de traslados a otros centros:', error))
}

function mostrarTrasladosDomicilio(id) {
    limpiarBloquesDinamicos();
    fetch(`ajax/traslado_domicilio.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
        const bloqueExistente = document.querySelector('.bloque_traslado_domicilio');
        if(bloqueExistente) bloqueExistente.remove();
        const contenedor = document.querySelector('.opciones');
        contenedor.insertAdjacentHTML('afterend', data);
    })
    .catch(error => console.error('Error al cargar los datos de traslados a domicilio:', error))
}