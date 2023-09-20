document.addEventListener("DOMContentLoaded", function () {
    const formularioBusqueda = document.getElementById("formularioBusqueda");
    const resultadosBusqueda = document.getElementById("resultadosBusqueda");
    const inputBusqueda = document.getElementById("busqueda");

    // Agregar un evento al campo de búsqueda que se dispara cuando se escribe en él
    inputBusqueda.addEventListener("input", function () {
        const busqueda = inputBusqueda.value.toLowerCase(); // Convertir a minúsculas

        // Verificar si el cuadro de búsqueda está vacío
        if (busqueda === "") {
            resultadosBusqueda.innerHTML = ""; // Borrar resultados
            return; // Dejar de procesar
        }

        // Realiza una solicitud AJAX para buscar resultados
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "buscarcomando.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                resultadosBusqueda.innerHTML = xhr.responseText;
            }
        };
        xhr.send("busqueda=" + busqueda);
    });
});
