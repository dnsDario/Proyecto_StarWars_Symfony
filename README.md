# Nombre del Proyecto

Proyecto Star Wars Symfony

## Requerimientos

* PHP >= 8.2
* MySQL >= 8.0
* Composer >= 2.5
* phpMyAdmin >= 5.2.0
* Symfony >= 7.2
* Xampp >= 8.2.12 (Apache, PHP, MySQL, phpMyAdmin)

### Instalación de requerimientos:
* Xampp (http://www.apachefriends.org/es/index.html) -> Para ejecutar el proyecto en local. Incluye Apache, PHP, MySQL, etc.

* Symfony (https://symfony.com/download) -> Framework PHP para desarrollo web. Seguir pasos de intalación.
    --> Windows: pegar en la carpeta de xampp/php el archivo de la aplicación: symfony.exe (binarios amd64 descargados)


#### Instalación del proyecto:

1. Descarga el código fuente del proyecto:

        git clone git@github.com:dnsDario/Proyecto_StarWars_Symfony.git

2. Entra en la carpeta del proyecto:

        cd Proyecto_StarWars_Symfony

3. Instala las dependencias del proyecto:

        composer install
        
4. Arranca el servidor web de Symfony:
        
       symfony server:start -d

5. Abre el navegador para ver la aplicación en acción:

        http://localhost:8000

6. Abre phpMyAdmin para administrar la base de datos:

        - http://http://localhost/phpmyadmin/  
        - Importar la base de datos "starwarsdb.sql" del proyecto
        - Se pueden configurar los puertos de Apache y MySQL en el Panel de Control de Xampp

7. Para cerrar el servidor web de Symfony:

        symfony server:stop

8. Para el login:

        Administradores:
                - usuario: guestAdmin@gmail.com
                  contraseña: guest
                - usuario: darioAdmin@gmail.com
                  contraseña: 1111
        * Entrando como administrados se pueden crear más administradores entrando en la ruta "/newAdmin"

        Usuarios: 
                - usuario: guestUser@gmail.com
                  contraseña: guest
                  (se pueden crear desde el registro)

