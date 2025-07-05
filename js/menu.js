
document.getElementById('btn-seguros-salud').addEventListener('click', function () {
    fetch('ajax/seguros_salud.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
        })
        .catch(error => console.error('Error en la petición:', error));
});

