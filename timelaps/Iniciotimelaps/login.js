document.addEventListener("DOMContentLoaded", () => {
    const wrapper = document.getElementById("wrapper");
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const btnLoginPopup = document.getElementById("btnLoginPopup");
    const iconCloses = document.querySelectorAll(".icon-close");
    const eslogan = document.getElementById("eslogan");
    const registerLink = document.getElementById("registerLink");

    btnLoginPopup.addEventListener("click", () => {
        wrapper.classList.add("active-popup");
        eslogan.classList.add("hidden");
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    });

    iconCloses.forEach(iconClose => {
        iconClose.addEventListener("click", () => {
            wrapper.classList.remove("active-popup");
            eslogan.classList.remove("hidden");
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        });
    });

    registerLink.addEventListener("click", (e) => {
        e.preventDefault();
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    });

    // Eliminamos el preventDefault del formulario de login para permitir su envío normal

    registerForm.addEventListener("submit", (e) => {
        e.preventDefault();
        // Aquí enviaríamos los datos del formulario a un servidor
        // y manejaríamos la respuesta, pero por ahora mostraremos un mensaje de registro exitoso
        alert("Registro exitoso");
        wrapper.classList.remove("active-popup");
        eslogan.classList.remove("hidden");
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    });

    // Opcional: Agregar validación de formulario de login en el lado del cliente
    loginForm.addEventListener("submit", (e) => {
        const correo = loginForm.querySelector('input[name="correo"]').value;
        const contrasena = loginForm.querySelector('input[name="contrasena"]').value;

        if (!correo || !contrasena) {
            e.preventDefault();
            alert("Por favor, complete todos los campos.");
        }
    });
});