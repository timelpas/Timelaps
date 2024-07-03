document.addEventListener('DOMContentLoaded', function() {
    cargarInfoPsicologo();
    cargarPacientes();

    document.getElementById('btnLogout').addEventListener('click', cerrarSesion);
});

function cargarInfoPsicologo() {
    fetch('api/psicologo_info.php')
        .then(response => response.json())
        .then(data => {
            const infoElement = document.getElementById('psicologoInfo');
            infoElement.innerHTML = `
                <h2><i class="fas fa-user-md"></i> ${data.nombres} ${data.apellido_paterno} ${data.apellido_materno}</h2>
                <p><i class="fas fa-id-card"></i> Cédula: ${data.cedula}</p>
                <p><i class="fas fa-envelope"></i> Correo: ${data.correo}</p>
            `;
        })
        .catch(error => console.error('Error:', error));
}

function cargarPacientes() {
    fetch('api/pacientes_lista.php')
        .then(response => response.json())
        .then(data => {
            const listElement = document.getElementById('pacientesList');
            listElement.innerHTML = '';
            data.forEach(paciente => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${paciente.nombre}</td>
                    <td>
                        <button class="btn-action btn-consult" onclick="iniciarConsulta(${paciente.id})">
                            <i class="fas fa-comment-medical"></i> Consulta
                        </button>
                        <button class="btn-action btn-delete" onclick="eliminarPaciente(${paciente.id})">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </td>
                `;
                listElement.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));
}

function iniciarConsulta(id) {
    // Aquí puedes redirigir a la página de consulta o abrir un modal
    console.log('Iniciando consulta con el paciente ID:', id);
}

function eliminarPaciente(id) {
    if (confirm('¿Estás seguro de que quieres eliminar a este paciente?')) {
        fetch('api/eliminar_paciente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Paciente eliminado correctamente');
                cargarPacientes(); // Recargar la lista de pacientes
            } else {
                alert('Error al eliminar el paciente');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}

function cerrarSesion() {
    fetch('api/cerrar_sesion.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'login.php'; // Redirigir a la página de login
            }
        })
        .catch(error => console.error('Error:', error));
}