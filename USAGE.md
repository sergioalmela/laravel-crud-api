## Requisitos

Se ha usado  la última versión de Laravel, 8.10.0 junto con la versión de PHP 7.4.8

## Iniciar proyecto

Para el desarrollo del proyecto se ha arrancado el proyecto mediante el comando php artisan serve.

Entonces, el proyecto es accesible desde http://127.0.0.1:8000/

## Base de datos

Para este proyecto se ha hecho uso de SQLite, pero en producción se puede hacer uso perfectamente de MySQL desde el fichero .env

Las migraciones de usuarios se han empleado las que da Laravel por defecto ya que nos sirven perfectamente para realizar un CRUD de usuarios.

### Librerías

Para AdminLTE, se ha instalado vía composer el paquete jeroennoten/laravel-adminlte que puede configurarse desde config/adminlte.php


### Uso

El proyecto contiene la tabla users, la cual contiene el registro de todos los usuarios para hacer el CRUD. No he creado un sistema de autenticación para acceder al AdminLTE ya que no lo he visto necesario para este proyecto, aunque se podría hacer de forma sencilla con php artisan make:auth

### Tests

He creado test para la inserción, modificación y eliminación que se pueden usar desde php artisan test

He hecho uso de RefreshDatabase así que se eliminarán los registros al empezar el test.
