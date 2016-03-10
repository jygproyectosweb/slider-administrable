<?php
//1. Crear conexión a la Base de Datos
	$conexion = mysqli_connect("localhost","root","");
	if (!$conexion) {
		die("Fallo la conexión a la Base de Datos: " . mysql_error()); }
	//2. Seleccionar la Base de Datos a utilizar
	$seleccionar_bd = mysqli_select_db($conexion,"slider");
	if (!$seleccionar_bd) {
		die("Fallo la selección de la Base de Datos: " . mysql_error()); }
?>