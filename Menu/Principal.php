<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supermercado Nogoya</title>

<link rel="stylesheet" type="text/css" href="../Otros/estiloFinal.css" />

</head>

<body>
  <div id="contenedor">
	<div id="cabecera">
		<h1><img src="../Im�genes/Logos/logoSuper.jpg" alt="logo SuperMercado" />Supermercado Nogoya
		 <label class="login">
		 <?php
				session_start();
				if(isset($_SESSION['nombre'])){ ?>
				<li>Bienvenido, 
		                    	<span id="nombreUsuario"> <?php echo $_SESSION['nombre'] ?> </span>
		                    	| 
		                   		<a class="salirLogout" href="../Logout.php">Salir</a>
		        </li>
				<?php
				}
				else{
					echo "<a href='../FormLogin.html'>Iniciar sesi�n</a> | <a href='../FormRegistro.html'>Registrarse</a>";
				}
			?></label>
	  </h1>
	</div>
		<div id="menu">
		<p>
			<label><a href="../Menu/Principal.php">Inicio</a></label>
			<label><a href="../Menu/Productos.php">Productos</a></label>
			<label><a href="../Menu/Contacto.php">Contacto</a></label>
			<label><a href="../Menu/Promociones.php">Promociones</a></label>
		</p>
	</div>
	<div id="main">
		<ul class="lista">
			<li><h1>TARJETAS: VISA-SANTANDER 20% DESESCUENTOS DIAS MARTES Y JUEVES</h1></li>
			<li><h1>MACRO-GALICIA 15% DIAS MIERCOLES</h1></li>
			<li><h1>EFECTIVO 15% TODOS LOS DIAS</h1></li>
			<li><a href="http://precioscuidados.gob.ar/static/files/webservice/PC_BA_0.pdf" target="_blank"><h1>
										<img src="../Im�genes/PrecioCuidados.png" alt="Logo precio cuidados"/>Lista precios cuidados</h1></a></li>
		</ul>
		<p>&nbsp;</p>
		<p><h1>REGISTRESE Y HAGA SU PRIMER PEDIDO, EL MISMO SERA ENTREGADO A LA BREVEDAD.</h1></p>
		<p>&nbsp;</p>
		
	</div>
	<div id="pie">
		<hr />
			<ul class="lista">
				<li><a href="../Menu/Principal.php">Inicio</a></li>
				<li><a href="../Menu/Productos.php">Productos</a></li>
				<li><a href="../Menu/Contacto.html">Contacto</a></li>
				<li><a href="../Menu/Promociones.php">Promociones</a></li>
			</ul>
		<p id="datos">
			<label>Horarios: 8-13 y 17-22<label><br>
			<label>Echeverria 666 - San Nicolas</label><br />
			<label>Tel. 0336-4425114</label><br />
		</p>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
  </div>
</body>
</html>
