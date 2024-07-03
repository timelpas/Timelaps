
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIMELAPS</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2 class="logo">TIMELAPS</h2>
        <nav class="navigation">
            <!-- <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#" id="btnContact">Contact</a> -->
            <button id="btnLoginPopup" class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <main>
        <p id="eslogan" class="Eslogan">
            "Timelaps: Herramienta esencial para psicólogos y pacientes con TDAH."
        </p>
    </main>

    <div id="wrapper" class="wrapper">
        <div id="loginForm" class="form-box">
            <span class="icon-close"><ion-icon name="close"></ion-icon></span>
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" name="correo" required>
                    <label>Correo</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="contrasena" required>
                    <label>Contraseña</label>
                </div>
                <button type="submit" class="btn">Ingresar</button>
                <div class="login-register">
                    <p>¿No tienes una cuenta? <a href="#" id="registerLink" class="register-link">Regístrate</a></p>
                </div>
            </form>
        </div>

        <div id="registerForm" class="form-box form-scroll">
            <span class="icon-close"><ion-icon name="close"></ion-icon></span>
            <h2>Registro</h2>
            <form id="registroFormulario" action="Registro.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="nombres" name="nombres" required>
                    <label>Nombre(s)</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="apellido_paterno" name="apellido_paterno" required>
                    <label>Apellido Paterno</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="apellido_materno" name="apellido_materno" required>
                    <label>Apellido Materno</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="tel" id="telefono" name="telefono" required>
                    <label>Teléfono</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="card"></ion-icon></span>
                    <input type="text" id="cedula" name="cedula" required>
                    <label>Cédula</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="correo" name="correo" required>
                    <label>Correo</label>
                </div>
                <button type="submit" class="btn">Registrar</button>
            </form>
        </div>
    </div>
    <div class="wrapper" id="contactWrapper">
        <span class="icon-close"><ion-icon name="close"></ion-icon></span>
        <div class="form-box contact">
            <h2>Contact Us</h2>
            <form id="contactForm">
                <div class="input-box">
                    <input type="text" id="contactName" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <input type="email" id="contactEmail" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <textarea id="contactMessage" required></textarea>
                    <label>Message</label>
                </div>
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>
    

    <script src="login.js"></script>
    <script src="Registro.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://apis.google.com/js/api.js" async defer></script>
    <!-- <script src="gmail.js"></script> -->
</body>

</html>