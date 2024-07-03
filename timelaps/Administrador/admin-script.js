document.addEventListener('DOMContentLoaded', function() {
    const navPsicologo = document.getElementById('navPsicologo');
    const navPacientes = document.getElementById('navPacientes');
    const seccionPsicologo = document.getElementById('seccionPsicologo');
    const seccionPacientes = document.getElementById('seccionPacientes');

    navPsicologo.addEventListener('click', function(event) {
        event.preventDefault();
        seccionPsicologo.classList.remove('hidden');
        seccionPacientes.classList.add('hidden');
    });

    navPacientes.addEventListener('click', function(event) {
        event.preventDefault();
        seccionPsicologo.classList.add('hidden');
        seccionPacientes.classList.remove('hidden');
    });

    document.getElementById('formAsignarContrasena').addEventListener('submit', function(event) {
        const nuevaContrasena = document.getElementById('nuevaContrasena').value;
        const confirmarContrasena = document.getElementById('confirmarContrasena').value;
        const mensajeError = document.getElementById('mensajeError');

        if (nuevaContrasena !== confirmarContrasena) {
            mensajeError.classList.remove('hidden');
            event.preventDefault();
        } else {
            mensajeError.classList.add('hidden');
        }
    });

    window.togglePasswordVisibility = function(fieldId) {
        const field = document.getElementById(fieldId);
        const fieldType = field.getAttribute('type');
        if (fieldType === 'password') {
            field.setAttribute('type', 'text');
        } else {
            field.setAttribute('type', 'password');
        }
    }
});
