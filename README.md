## Instalación paso a paso

### 1. Clonar el repositorio

- git clone https://github.com/alfredito7685/gamedeals.git<br>
- cd gamedeals


### 2. Instalar las dependencias de PHP

\`\`\`bash
composer install
\`\`\`

### 3. Configurar el archivo de entorno

Copia el archivo de ejemplo y renómbralo:

\`\`\`bash
cp .env.example .env
\`\`\`

Genera la clave de la aplicación:

\`\`\`bash
php artisan key:generate
\`\`\`

### 4. Configurar Firebase

Este proyecto usa Firebase Firestore como base de datos. Para que funcione:

1. Solicita al equipo el archivo `firebase_credentials.json` (no se incluye en este repositorio por seguridad).
2. Colócalo en la ruta:
   \`\`\`
   storage/app/firebase_credentials.json
   \`\`\`
3. Abre tu archivo `.env` y agrega la siguiente línea:
   \`\`\`
   FIREBASE_CREDENTIALS=storage/app/firebase_credentials.json
   \`\`\`

### 5. Iniciar el servidor

\`\`\`bash
php artisan serve
\`\`\`

Abre tu navegador en:

\`\`\`
http://127.0.0.1:8000
\`\`\`

## Rutas principales de la aplicación

| Ruta | Descripción |
|---|---|
| `/login` | Iniciar sesión |
| `/registro` | Crear una cuenta nueva |
| `/ofertas` | Ver las ofertas de videojuegos (requiere sesión iniciada) |
| `/dashboard` | Panel principal del usuario |

## Notas

- El archivo `firebase_credentials.json` **no se sube a GitHub** por motivos de seguridad (contiene credenciales privadas de acceso a la base de datos). Debe compartirse entre el equipo por otro medio (Drive, USB, etc.).
- La API de CheapShark es pública y no requiere ninguna llave de acceso.
