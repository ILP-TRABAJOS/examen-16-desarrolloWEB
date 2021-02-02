var boton = document.getElementById("boton");

function traer() {
    var dni = document.getElementById("dni").value;
    fetch('https://dni.optimizeperu.com/api/persons/' + dni).then(res => res.json()).then(data => {
        document.getElementById("doc").value = (data.dni);
        document.getElementById("nombre").value = (data.name);
        document.getElementById("apellido").value = (data.first_name + " " + data.last_name);
        document.getElementById("cui").value = (data.cui);
    });
}
boton.addEventListener('click', traer);