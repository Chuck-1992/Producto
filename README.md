# configuración del proyecto
1.- Instalación de dependencias del proyecto con composer install
2.- Cree un nuevo archivo en la carpeta ráiz llamado .env, luego copie todo el contenido de env.example dentro del archivo creado mediante la consola git bash con la siguiente línea de comando --- cp .env.example .env  ----
3.- Crear una base de datos con el nombre ---- productos ------
4.- Ejecutar el comando ---- php artisan migrate ----- para crear las migraciones
5.- Ejecutar el comando ----- php artisan storage:link ----- para crear el acceso directo a la carpeta storage
6.- Ejecute el comando ------- php artisan serve ---- para levantar el proyecto.
7.- Ejecute el comando ------- php artisan key:generate ---- en el proyecto.



/* ESÓLO EN CASO DE QUE EXISTA ALGUN ERROR EN LA INSTALACIÓN DEL AS DEPENDENCIAS*/

1.- ELIMINAMOS LA CARPETA VENDOR
2.- NOS DIRIGIMO A cd storage/
3.- EJECUTAMOS LA SIGUIENTE LÍNEA DE COMANDO ---  mkdir -p framework/{sessions,views,cache} ---
4.- AHORA SII! INSTALAMOS LA DEPENDENCIAS composer install
5.- LIMPIAMOS LOS ARCHIVOS DE CONFIGURACIÓN ---- php artisan config:cache ----
