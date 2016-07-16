<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrito</title>
<link rel="stylesheet" type="text/css" href="estiloProductos.css" />

<script>
function borrar(id){
		window.location="../Carrito/borrarID.php?id="+id;
	}
	
	function actualizar(id){
		borrar(id);
		window.location="../Carrito/detalleProducto.php?id="+id;
	}
</script>
</head>

<body>
	<div id="contenedor">
	<div id="cabecera">
		<h1><img src="logoSuper.jpg" alt="logo SuperMercado" />Supermercado Nogoya
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
		<?php
			session_start();
			$carro=$_SESSION['carro'];
			if($carro){ ?>
			<table class="catalogo">
				<tr>
					<th>Producto</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Subtotal</th>
					<th></th>
					<th></th>
				</tr>
			<?php
				$contador=0;
				$suma=0;
				foreach($carro as $k => $v){
					$subto=$v['cantidad']*$v['precio'];
					$suma=$suma+$subto;
					$contador++;
				?>
				<tr>
					<td><?php echo $v['nombre']; ?></td>
					<td><?php echo $v['precio']; ?></td>
					<td><?php echo $v['cantidad']; ?></td>
					<td><?php echo $subto; ?></td>
					<td><input type="button" value="Quitar" onclick="borrar(<?php echo $v['id']; ?>"  /> </td>
					<td><input type="button" value="Actualizar Cantidad" onclick="actualizar(<?php echo $v['id']; ?>)"  /> </td>
				</tr>
			<?php } ?>
				<tr>
					<td></td>
					<td></td>
					<td>Total</td>
					<td><?php echo number_format($suma,2); ?></td>
				</tr>
				<tr>
					<td><a href="Productos.php?<?php echo SID; ?>">Continuar con la selección de productos</a></td>
				</tr>
	</table>
		<?php }else{ ?>
				<p>No hay productos seleccionados, <a href="Productos.php?<?php echo SID; ?>">Ir a seleccón de articulos</a></p>
		<?php }?>
	</div>
	<div id="pie">
		<hr />
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
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
  </div>
</body>
</html>
