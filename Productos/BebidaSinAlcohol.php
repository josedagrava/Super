<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bebidas sin alcohol</title>
<link rel="stylesheet" type="text/css" href="estiloFinal.css" />
</head>

<body>
	<div id="contenedor">
	<div id="cabecera">
		<h1><img src="Imágenes/Logos/logoSuper.jpg" alt="logo SuperMercado" />Supermercado Nogoya
		 <label class="login">
		 <?php
				session_start();
				if(isset($_SESSION['usuario'])){
					echo $_SESSION['usuario'];
				}
				else{
					echo "<a href='Login.html'>Iniciar sesión</a>--<a href='FormRegistro.html'>Registrarse</a>";
				}
			?></label>
	  </h1>
	</div>
		<div id="menu">
		<p>
			<label><a href="Principal.php">Inicio</a></label>
			<label><a href="Productos.php">Productos</a></label>
			<label><a href="Contacto.php">Contacto</a></label>
			<label><a href="Promociones.php">Promociones</a></label>
		</p>
	</div>
	<div id="main">
		<p>&nbsp;</p>
		<div id="lateralLeft">
			<?php
				include('conexion.inc');
				$query="select * from categorias;";
				$result=mysqli_query($link,$query);

				echo "<ul class='categorias'>";
				while($fila=mysqli_fetch_array($result))
				{
					echo ("<li><a href='" . $fila['url'] . "'>" . $fila['nombreCat'] . "</a></li>");
				}
				echo "</ul>";			
				?>
		</div>
	</div>
	<div id="pie">
			<ul class="lista">
				<li><a href="Principal.php">Inicio</a></li>
				<li><a href="Productos.php">Productos</a></li>
				<li><a href="Contacto.html">Contacto</a></li>
				<li><a href="Promociones.php">Promociones</a></li>
			</ul>
		<p id="datos">
			<label>Horarios: 8-13 y 17-22<label><br>
			<label>Echeverria 666 - San Nicolas</label><br />
			<label>Tel. 0336-4425114</label><br />
		</p>
	</div>
  </div>
</body>
</html>
