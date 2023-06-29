// Función para mostrar el mensaje de sesión expirada y redirigir a index.html
function mostrarSesionExpirada() {
    // Muestra el mensaje de sesión expirada
    alert("Tu sesión ha expirado. Serás redirigido a la página de inicio.");

    // Redirige al usuario a index.html
    window.location.href = "Formulario_admin.html";
}

// Función para reiniciar el contador de inactividad
function reiniciarContadorInactividad() {
    // Define el tiempo en segundos antes de que se considere inactivo al usuario (por ejemplo, 5 minutos)
    var tiempoInactividad = 3; 
    var contador;

    // Función para redirigir al usuario después del tiempo de inactividad
    function redireccionar() {
        mostrarSesionExpirada();
    }

    // Reinicia el contador de inactividad
    function reiniciarContador() {
        clearTimeout(contador);
        contador = setTimeout(redireccionar, tiempoInactividad * 1000); // Convierte segundos a milisegundos
    }

    // Agrega eventos para reiniciar el contador de inactividad en acciones del usuario
    document.onload = reiniciarContador;
    document.onmousemove = reiniciarContador;
    document.onmousedown = reiniciarContador;
    document.ontouchstart = reiniciarContador;
    document.onclick = reiniciarContador;
    document.onkeypress = reiniciarContador;
}
