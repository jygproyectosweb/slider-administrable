<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre_usuario'];

if ($varsesion == null || $varsesion=='') {
	echo "Usted no tiene autorizacion";
	die();
}

include ("cn.php");
$id = $_POST['id'];
$nombre = $_POST['img'];
$descripcion = $_POST['descripcion'];
//actualizar imagen
$archivo_nombre = $nombre;
$target_path = "../img/".$archivo_nombre;
//actualizar descripcion
$insertar = "UPDATE item SET descripcion='$descripcion' WHERE id='$id'";
$resultado=mysqli_query($conexion, $insertar);
if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
  echo"<script type=\"text/javascript\">alert('Se han guardado los cambios correctamente, actualice la p\u00E1gina para ver los cambios'); window.location='panel.php';</script>";  
} else{
  echo"<script type=\"text/javascript\">alert('Debe seleccionar una imagen o cambiar la descripcion'); window.location='panel.php';</script>";  
}
?>

