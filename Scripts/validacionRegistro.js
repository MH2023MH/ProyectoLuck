function validarRegistro() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    var confirmarContrasena = document.getElementById("confirmar_contrasena").value;
    var generoMasculino = document.getElementById("genero_masculino").checked;
    var generoFemenino = document.getElementById("genero_femenino").checked;
    var generoOtro = document.getElementById("genero_otro").checked;
    var fechaNacimiento = document.getElementById("fecha_nacimiento").value;

    if (nombre === "" || apellido === "" || correo === "" || usuario === "" || contrasena === "" || confirmarContrasena === "" || fechaNacimiento === "") {
        alert("Por favor, completa todos los campos.");
        return false;
    }

    if (!(generoMasculino || generoFemenino || generoOtro)) {
        alert("Por favor, selecciona tu género.");
        return false;
    }

    if (contrasena !== confirmarContrasena) {
        alert("Las contraseñas no coinciden.");
        return false;
    }

    // Validar longitud del nombre y apellido
    if (nombre.length > 50 || apellido.length > 50) {
        alert("El nombre y el apellido deben tener menos de 50 caracteres.");
        return false;
    }

    // Validar que el nombre y el apellido solo contengan letras
    var letrasRegex = /^[a-zA-Z]+$/;
    if (!letrasRegex.test(nombre) || !letrasRegex.test(apellido)) {
        alert("El nombre y el apellido solo deben contener letras.");
        return false;
    }

    // Validar longitud del usuario y la contraseña
    if (usuario.length < 6 || usuario.length > 20 || contrasena.length < 8 || contrasena.length > 20) {
        alert("El usuario debe tener entre 6 y 20 caracteres, y la contraseña entre 8 y 20 caracteres.");
        return false;
    }

    // Validar fecha de nacimiento para ser mayor de 18 años
    var fechaHoy = new Date();
    var fechaNac = new Date(fechaNacimiento);
    var edad = fechaHoy.getFullYear() - fechaNac.getFullYear();

    if (edad < 18) {
        alert("Debes tener al menos 18 años para registrarte.");
        return false;
    }

    return true;
}
