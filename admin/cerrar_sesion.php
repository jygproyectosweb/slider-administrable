<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre_usuario'];
if ($varsesion == null || $varsesion=='') {
	echo "Usted no tiene autorizacion";
	die();
}
session_destroy();
header("location: ../uni-admin.html");
?>