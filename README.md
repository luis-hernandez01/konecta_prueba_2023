# konecta_prueba_2023

-------------------------------------------------instalacion aplicacion konecta-----------------------------------------------

1) Se debera clonar el repositorio dentro de un servidor de pruebas o local

2) Dentro de la carpeta BD se encuentra el archivo sql de la base de datos de la aplicacion.

3) El nombre de la Base de datos se debera de llamar: konecta.

4) Para configurar la BD se ingresa al archivo de nombre configuracion.php que se encuentra en la raiz del proyecto, alli se podra realizar la configuracion hacia el servidor que se tenga.

5) La ruta URL que tendra el proyecto sera la siguiente en casotal de estar en un servidor local http://localhost/nombre_asignado_al_proyecto/ 

6) Credenciales de ingreso al sistema Usuario: konecta Contraseña: 123456789  y por ultimo ingresar la capchats para el ingreso

7) Para registrar un Item dar click sobre el icono de datos basicos y donde estaran los formulsrios para registrar a preferencia




-------------------------realizacion de consultas directas en base de datos:------------------------------------------------------------


1 Realizar una consulta que permita conocer cuál es el producto que más stock tiene. SELECT * FROM productos ORDER by stock DESC LIMIT 1

2 Realizar una consulta que permita conocer cuál es el producto más vendido. SELECT p.nombre_producto, SUM(d.cantidad) AS mas_vendido, SUM(p.precio) AS valor_total FROM productos p, detalle d WHERE d.id_producto=p.id GROUP BY p.nombre_producto ORDER BY SUM(d.cantidad) desc LIMIT 1


 
