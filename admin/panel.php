<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre_usuario'];

if ($varsesion == null || $varsesion=='') {
	echo "Usted no tiene autorizacion";
	die();
}
include ("cn.php");
$consulta = "SELECT * FROM item";
 ?>

 <!DOCTYPE html>
 <html lang="es">
 	<head>
 		<title>Panel de administración</title>
 		<meta charset="UTF-8">
 		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<?php header('Content-Type: text/html; charset=UTF-8'); ?>
		<link rel="stylesheet" href="../css/panel.css">
 	</head>
 	<body>
 	<header class="main-header">
    <div class="contenedor">
      <h1 class="main-header__titulo">Panel de administración</h1>
      <a class="main-header__btn-cerrar" href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
 	</header>
 	<main>
    <div class="contenedor">
     <h2>Administrar slider</h2>
      <div class="caja-item">
     <?php 
      if ($resultado = mysqli_query($conexion, $consulta)) {
        while ($row = mysqli_fetch_assoc($resultado)) { ?>
        <div class="item">
          <form enctype="multipart/form-data" action="update.php" method="POST">
            <div class="update__imagen">
              <img src="../img/<?php echo $row ['imagen'];?>" alt="">
              <input class="oculto" name="id" value="<?php echo $row ['id']; ?>" readonly>
              <input class="oculto" name="img" type="text" value="<?php echo $row ['imagen'];?>" readonly>
            </div>
            <div class="update__text">
               <label for="imagen">Reemplazar imagen:</label>
              <input name="imagen" type="file" accept="image/jpeg">
              <p class="nota">Solo se aceptan imágenes en formato .jpg. Se sugiere imágenes de 700 x 300.</p>
              <label for="descripcion">Cambiar la descripcion del slider</label>
              <textarea name="descripcion" id=""><?php echo $row ['descripcion']; ?></textarea>
            <input type="submit" value="Actualizar" class="btn-actualizar">
            </div>
          </form>
        </div>

        <?php } mysqli_free_result($resultado);} ?>
      </div>
    </div>
  </main>
 		</body>
 	</html>
