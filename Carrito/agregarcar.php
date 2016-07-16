<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
	<?php
		session_start();
		extract($_REQUEST);
		include("../Otros/conexion.inc");		
		$result=mysqli_query($link,"select * from productos where idProducto=$id;");
		while($row = mysqli_fetch_array($result)){
			if(isset($_SESSION['carro'])){
				$carro=$_SESSION['carro'];}
			$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'precio'=>$row['precioUnitario'],'idCat'=>$id, 'nombre'=>$row['nombreProd']);
			$_SESSION['carro']=$carro;
		header("Location:../Menu/Productos.php?".SID);
		}
		
		mysqli_free_result($result);
		mysqli_close($link);
	?>
</body>
</html>
