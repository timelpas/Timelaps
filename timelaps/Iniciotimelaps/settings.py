# Asegúrate de tener django.middleware.security.SecurityMiddleware en MIDDLEWARE
MIDDLEWARE = [
    'django.middleware.security.SecurityMiddleware',
    # Otros middlewares
]

# Añade las cabeceras de seguridad
SECURE_BROWSER_XSS_FILTER = True
SECURE_CONTENT_TYPE_NOSNIFF = True

# Añade tus propias cabeceras con middleware personalizado
from django.middleware.common import MiddlewareMixin

class CustomHeaderMiddleware(MiddlewareMixin):
    def process_response(self, request, response):
        response['Cross-Origin-Opener-Policy'] = 'same-origin'
        response['Cross-Origin-Embedder-Policy'] = 'require-corp'
        return response

MIDDLEWARE.append('path.to.CustomHeaderMiddleware')
