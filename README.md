# sis_academico
SISTEMA ACADÉMICO ISC
------------------------------------------------------------------------------------------

PASOS PRE_PRE-INSTALACIÓN:
Registro y alta en github
0.- Crear una cuenta en https://github.com/join
1.- Descargar la herramienta GITHUB para windows: https://windows.github.com
2.- Luego de iniciado la APP, logearse con su respectivo usuario y contraseña que crearon.

------------------------------------------------------------------------------------------
PASOS PARA LA PRE-INSTALACIÓN:
------------------------------

1.- Clonar el repositorio: https://github.com/SisAcademico/sis_academico.git
2.- Cuando se les pida la carpeta para clonar, ingresar su carpeta "htdocs" ó "www", según tengan congifurado con el XAMP o WAMP


PASOS PARA LA INSTALACIÓN:
-------------------------
NOTA: En la carpeta SQL, se encuentra la estructura de la base de datos del sistema académico ISC

1.- Crear una Base de datos "db_sisacademico" con la herramienta PHPMYADMIN: 
	Ejecutar en el navegador: http://localhost/phpmyadmin  ó
	Ejmplo: PUERTO:"8081"
	http://localhost:PUERTO/phpmyadmin
	
2.- Importar el archivo "db_sisacademico.sql" de la carpeta SQL en la base de datos
3.- Modificar el archivo "\app\config\database.php" en la parte:

	'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'db_sisacademico',
			'username'  => 'jack',
			'password'  => 'macfoxes',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),
		
		
	Para que pueda funcionar en cada una de vuestras instalaciones de su servidor local WAMP o XAMP
	// MODIFICAR 'username'  => 'jack' USUARIO DE LA BASE DE DATOS,
	Ejemplo: 'username'  => 'root'
	// MODIFICAR EN ESTA PARTE, PASSWORD DE LA BASE DE DATOS,
	Ejemplo: 'password'  => '',
	
	NOTA: Con "root" y '' en password en blanco es la configuración por defecto en la mayoria de servidores WAMP o XAMP
	
4.- Ejecutar en el navegador: http://localhost/sis_academico/public/  ó
	Ejmplo: PUERTO:"8081"
	http://localhost:PUERTO/sis_academico/public/ 

	
 
