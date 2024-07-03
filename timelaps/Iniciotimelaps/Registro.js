document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('registroFormulario');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(form);

            fetch('Registro.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Mostrar la respuesta del servidor en la consola
                if (data.includes("Registro exitoso")) {
                    mostrarMensaje('Registro exitoso. Ya puedes iniciar sesión.', 'success');
                    form.reset(); // Limpiar el formulario
                } else {
                    mostrarMensaje('Error al registrar. Por favor, inténtalo de nuevo.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarMensaje('Error de conexión. Por favor, inténtalo más tarde.', 'error');
            });
        });
    } else {
        console.error('El formulario de registro no se encontró en el DOM');
    }
});

function mostrarMensaje(mensaje, tipo) {
    const mensajeElement = document.createElement('div');
    mensajeElement.textContent = mensaje;
    mensajeElement.className = tipo === 'success' ? 'success-message' : 'error-message';
    
    const form = document.getElementById('registroFormulario');
    form.parentNode.insertBefore(mensajeElement, form.nextSibling);
    
    setTimeout(() => {
        mensajeElement.remove();
    }, 5000);
}
