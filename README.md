# BienesPublicos
Modulo de Bienes Publicos del Sistema SIAP


-- Pasos para instalar:
- cuando descargues el proyecto crea dentro de el una carpeta que se llame runtime/, web/assets/ y darle permisos

BienesPublicos$# mkdir runtime
BienesPublicos$# chmod 777 -R runtime/
BienesPublicos$# mkdir web/assets/


- Luego ya podremos ver el proyecto corriendo en nuestras maquinas(para esto necesitaremos Apache y postgresql instalado y configurado)

- la base de datos se encuentra en la carpeta archivos/diagramas/ con el nombre de BIENES en texto plano, solo nos queda restaurar la base de datos en nuestro servidor sql y configurar la conexion del sistema en el archivo db.php ubicado en config/db.php

- la base de datos se divide por esquemas la cual utilizaremos bienes. como esquema predeterminado

