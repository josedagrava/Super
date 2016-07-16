<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>

<?php

include("conexion.inc");
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDNI'];
$clave = $_POST['txtPass'];
$telefono = $_POST['txtTelefono'];
$email = $_POST['txtEmail'];
$direccion = $_POST['txtDireccion'];
$tipo = "null";
$sql = "SELECT * FROM personas WHERE dni='$dni'";
$resultado= mysqli_query($link, $sql) or die (mysqli_error($link));
if (mysqli_num_rows($resultado) == 0)
    {
		echo("El usuario ya ha sido registrado");
		$sql = "INSERT INTO personas (dni, clave, nombre, apellido, tel, direccion, tipo, email) VALUES ('$dni', '$clave', '$nombre', '$apellido', 				 		'$telefono', '$direccion', '$tipo', '$direccion')";
		$resultado= mysqli_query($link, $sql) or die (mysqli_error($link));
		mysqli_close($link);
		session_start();
		$_SESSION['nombre'] = $nombre;
		$_SESSION['tipo'] = $tipo;
		$_SESSION['email'] = $email;

	    $fecha=date("d-m-Y");
		$hora=date("H:i:s");
		$destino=$_POST['txtEmail'];
		$asunto="Registro de Supermercado Nogoya";
		$desde='From: registro@nogoya.com';
		$comentario= "
			\n
			Se ha registrado correctamente en nuestro sitio.\n
			Ya puede realizar su compra online!\n
			Gracias.\n
			\n
			Supermercado Nogoya\n
			Enviado el $fecha a las $hora\n";
		mail($destino,$asunto,$comentario,$desde);
    	header('Location: Principal.php');
	}
else
	{
		echo("El usuario ya existe");
	}
?>
<p><a href="FormRegistro.html">Volver atras</a></p>

</body>
</html>
