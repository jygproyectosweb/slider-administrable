<?php
session_start();
$usuario=$_POST['usuario'];
$password=$_POST['password'];

//quitar signos para evitar inyeccion sql
$arraysignos = array("?", "¿", "*", "~", "=", "#", "%", "&", "\\", "}", "<", ">", "/", "|", ":", ";", "\"", "!", "¡", "[", "]", "'", "(", ")", ",");
$usuario = str_replace($arraysignos, "nopudistehackear", $usuario);
$password = str_replace($arraysignos, "nopudistehackear", $password);

include("cn.php");
$sql_validar="SELECT * FROM usuarios WHERE usuario='$usuario' and password = '$password'";

$resultado = $conexion->query($sql_validar);

if ($resultado ->num_rows>0) {
	while ($registros = $resultado->fetch_array()) {
		$nombre = $registros['nombre'];
		$_SESSION['nombre_usuario'] =$nombre;
		header("location:admin/panel.php");
	}
}
else { 
		echo "Error de autentificacion"; 

}
	mysqli_free_result($resultado);	
?>