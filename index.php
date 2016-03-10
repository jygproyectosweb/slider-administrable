<?php
include ("cn.php");
$consulta = "SELECT * FROM item";
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Slider Jquery</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="css/estilos.css">
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	</head>
	<body>
		<div id="c-slider">
			<div id="slider">
		<?php 
		if ($resultado = mysqli_query($conexion, $consulta)) {
			while ($row = mysqli_fetch_assoc($resultado)) { ?>
				<section>
					<img src="img/<?php echo $row ['imagen'];?>" alt="">
				</section>
				<?php }
				mysqli_free_result($resultado); } ?>
			</div>
			<div id="btn-prev">&#60;</div>
			<div id="btn-next">&#62;</div>
		</div>
		<script src="js/slider.js"></script>
	</body>
</html>