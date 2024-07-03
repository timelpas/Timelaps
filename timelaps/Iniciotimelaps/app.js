const express = require('express');
const app = express();

app.use((req, res, next) => {
    res.setHeader('Cross-Origin-Opener-Policy', 'same-origin');
    res.setHeader('Cross-Origin-Embedder-Policy', 'require-corp');
    next();
});

// Resto de tu configuración y rutas de Express

app.listen(3000, () => {
    console.log('Servidor escuchando en el puerto 3000');
});
