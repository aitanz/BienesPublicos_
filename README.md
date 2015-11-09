Módulo de Registro del Sistema de Bienes Públicos
=================================================


* Para instalar este módulo debemos conocer lo siguiente:
  - GIT (Control de versiones).
  - PostgreSQL.
  - Apache y administración web.

* Los requerimientos técnicos en el servidor o computador a instalar son:
  - Apache configurado correctamente y con las librerias php5-pgsql, php5-pdo debidamente instaladas.
  - PostgreSQL 9.1 o mayor instalado y configurado con un usuario administrador con clave asignada.
  - PgAdmin 3 (si desea).
  - Gedit.
  - GIT (control de versiones).

INSTALACIÓN
===========

* Para instalar el modulo, lo mas conveniente es utilizar control de versiones ya que al ser una aplicación en desarrollo de nuevos módulos, freuentemente se tendrá que actualizar la version de nuestro sistema y para mayor facilidad y rapidez, se recomienda utilizar control de versiones GIT.

  - Nos ubicamos en una terminal LINUX y vamos a nuestro directorio de proyectos de APACHE (por defecto se encuentra en /var/www/ en debian).
  - Inicializamos un repositorio GIT con el comando "git init" (sin las comillas).
  - Vamos a nuestro navegador preferido y visitamos http://ait.anzoategui.gob.ve la cua nos direccionara al portal de version del proyecto.
  - Copiamos el URL que esta en la parte inferior derecha que hace referencia a la clonación GIT y con el comando de clonación en nuestra terminal vamos a clonar el proyecto con dicha URL "git clone pegamos_el_url_que_hemos_copiado" (sin las comillas).
  - Luego de clonado el proyecto exitosamente, crearemos una base de datos limpia en nuestro postgreSQL con pgAdmin si lo desea. de no ser así tambien se puede crear desde la terminal con el usuario postgres.
  - Al crear nuestra base de datos limpia vamos a restaurar nuestra estructura de datos en dicha BDD con el SQL que se encuentra en archivos/diagramas  dentro del proyecto. revisamos que la estructura sea la correcta al finalizar la restauración (20 esquemas, el primer esquema se llama bienes y contiene 11 tablas)
  - cambiamos los datos de conexion según nuestros datos en "config/db.php" y luego verificamos si todo esta correcto visitando en nuestro navegador http://localhost/BienesPublicos_/




ERRORES DE CONFIGURACIÓN COMUNES
================================

- Falta de permisos o inexistencia de fichero runtime/ (se soluciona con darle permisos al fichero o creando el fichero).
- Falta de permisos o inexistencia de fichero assets/ dentro de web/ (se soluciona con darle permisos al fichero o creando el fichero)
- Error de conexion (verificar librerias PHP5 o archivo de conexion config/db.php)

