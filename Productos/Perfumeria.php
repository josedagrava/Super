<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Perfumeria</title>
<link rel="stylesheet" type="text/css" href="../Otros/estiloProductos.css" />

<script>
	function agregar(id){
		window.location="../Carrito/detalleProducto.php?id="+id;
	}
	
	function borrar(id){
		if(window.confirm("Esta seguro que desea quitar este articulo?")){
			window.location="../Carrito/borrarID.php?id="+id;
		}
	}
</script>
</head>

<body>
	<div id="contenedor">
	<div id="cabecera">
		<h1><img src="../Imágenes/Logos/logoSuper.jpg" alt="logo SuperMercado" />Supermercado Nogoya
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
					echo "<a href='../FormLogin.html'>Iniciar sesión</a> | <a href='../FormRegistro.html'>Registrarse</a>";
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
		<p>&nbsp;</p>
		<div id="lateralLeft">
			<?php
				include('../Otros/conexion.inc');
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
		<?php
			if(isset($_SESSION['carro']))
				$carro=$_SESSION['carro'];
			else $carro=false;
			
			$cantPorPag=2;
			$pagina=isset ( $_GET['pagina']) ? $_GET['pagina'] : null;
			if (!$pagina) {
				$inicio = 0;
				$pagina=1;
			}
			else {
			$inicio = ($pagina - 1) * $cantPorPag;
			}
			$id=$_GET['idCat'];
			$result=mysqli_query($link,"select * from productos where idCat=$id;");
			$total_registros= mysqli_num_rows($result);
			$total_paginas = ceil($total_registros/ $cantPorPag);
			$result= mysqli_query($link,"select * from productos where idCat=$id order by nombreProd limit ".$inicio.",".$cantPorPag.";");
			$total_registros= mysqli_num_rows($result);
		?>
		<table class="catalogo">
			<tr>
				<th>Imagen</th>
				<th>Nombre</th>	
				<th>Precio</th>
				<th>Estado</th>
				<th></th>
			</tr>
			<?php
			while($fila=mysqli_fetch_array($result)){
			?>
			<tr>
				<td><img src="<?php echo $fila['imagen'] ?>" width="100" height="92" alt="Imagen del Producto"  /></td>
				<td><?php echo $fila['nombreProd'];?></td>
				<td><?php echo $fila['precioUnitario'];?></td>
				<td><?php if(!$carro || !isset($carro[md5($fila['idProducto'])]['identificador']) || $carro[md5($fila['idProducto'])]['identificador']!=md5($fila['idProducto']))
						{?>
						 <input type="button" value="Agregar al Carrito" onclick="agregar(<?php echo $fila['idProducto']; ?>)" />
				  <?php }
				  		else{?>
						<input type="button" value="Borrar del Carrito" onclick="borrar(<?php echo $fila['idProducto']; ?>)" />
					<?php }?></td>
			</tr>
			<?php
			}
			mysqli_free_result($result);
			mysqli_close($link);
			?>
		</table>
		<p>&nbsp;</p>
		<p class="paginacion">
		<?php
			if($total_paginas > 0){
				for ($i=1;$i<=$total_paginas;$i++){
					if ($pagina == $i) echo $pagina . " ";
					else echo "<a href='../Productos/Perfumeria.php?idCat=".$id."&pagina=" . $i ."'>" . $i . "</a> ";
				}
			}?>
		</p>
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
