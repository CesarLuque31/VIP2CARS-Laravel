# VIP2CARS - Laravel

Proyecto Laravel para la gestión de vehículos (vehículos/clientes). Autor: @CesarLuque

## Requisitos del entorno
- **PHP**: ^8.2 (ver `composer.json`)
- **Laravel**: ^12.x
- **Base de datos**: por defecto SQLite (archivo `database/database.sqlite`). Opcional: MySQL/MariaDB/PostgreSQL/SQL Server
- **Extensiones PHP** necesarias:
  - `pdo`, `pdo_sqlite` (por defecto) o `pdo_mysql`/`pdo_pgsql`/`pdo_sqlsrv` según motor
  - `openssl`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`
- **Node.js**: recomendado LTS (para Vite)
- **Composer**: 2.x

## Instalación y configuración
1. Clonar el repositorio y entrar en el proyecto
2. Instalar dependencias de PHP
   ```bash
   composer install
   ```
3. Instalar dependencias de frontend
   ```bash
   npm install
   ```
4. Variables de entorno
   - Copia `.env.example` a `.env` (si no existe, Composer lo hará en el primer install)
   - Genera la clave de la app (Composer también lo hace en `post-create-project-cmd`):
     ```bash
     php artisan key:generate
     ```
   - Configuración por defecto usa SQLite. Asegúrate de que el archivo exista:
     ```bash
     php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
     ```
   - Si prefieres MySQL/MariaDB/PostgreSQL/SQL Server, ajusta en `.env`:
     ```env
     DB_CONNECTION=mysql   # o mariadb/pgsql/sqlsrv
     DB_HOST=127.0.0.1
     DB_PORT=3306          # 5432 para pgsql, 1433 para sqlsrv
     DB_DATABASE=laravel
     DB_USERNAME=root
     DB_PASSWORD=
     ```

##  Puesta en marcha
1. Ejecutar migraciones (crea tablas)
   ```bash
   php artisan migrate
   ```
2. Poblar datos demo (vehículos de prueba)
   ```bash
   php artisan db:seed
   ```
3. Levantar el servidor de desarrollo
   ```bash
   php artisan serve
   ```
4. (Opcional) Levantar Vite para assets
   ```bash
   npm run dev
   ```

Atajo disponible (script `dev` en `composer.json`) para correr varios servicios a la vez con `concurrently`:
```bash
composer run dev
```

## Estructura de la BBDD
- Motor por defecto: SQLite (`config/database.php` → `default = sqlite`)
- Tabla principal creada por migración `database/migrations/2025_09_10_035829_create_vehicles_table.php`:
  - `vehiculos`
    - `id` (bigint, PK)
    - `placa` (string, único)
    - `marca` (string)
    - `modelo` (string)
    - `anio_fabricacion` (year)
    - `cliente_nombre` (string)
    - `cliente_apellido` (string)
    - `cliente_documento` (string)
    - `cliente_correo` (string)
    - `cliente_telefono` (string)
    - `esta_activo` (boolean, por defecto true)
    - `created_at` / `updated_at` (timestamps)

- Seeders: `database/seeders/DatabaseSeeder.php` crea ~25 vehículos de ejemplo usando `VehiculoFactory`.

Para recrear desde cero:
```bash
php artisan migrate:fresh --seed
```

## Usuario demo (no aplica)
- No se define autenticación de usuarios en este repo por defecto. 

## Rutas principales
- `GET /` → vista `welcome`
- Recurso `vehiculos` (controlador `App\Http\Controllers\VehiculoController`):
  - `GET /vehiculos`, `POST /vehiculos`, `GET /vehiculos/{id}`, `PUT/PATCH /vehiculos/{id}`, `DELETE /vehiculos/{id}`

## Tests
```bash
php artisan test
```

## Autor
- **@CesarLuque**
