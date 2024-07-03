from flask import Flask, make_response

app = Flask(__name__)

@app.after_request
def apply_headers(response):
    response.headers['Cross-Origin-Opener-Policy'] = 'same-origin'
    response.headers['Cross-Origin-Embedder-Policy'] = 'require-corp'
    return response

# Resto de tu configuración y rutas de Flask

if __name__ == '__main__':
    app.run(debug=True)
