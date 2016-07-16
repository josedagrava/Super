<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login </title>
</head>

<body>
<?php 
	include("conexion.inc");
	$DNI = $_POST["txtDNI"];
	$contra = $_POST["txtPass"];
	$sql = "SELECT * FROM personas WHERE dni='$DNI' and clave='$contra'";
	$resultado= mysqli_query($link, $sql) or die (mysqli_error($link));
	$fila = mysqli_fetch_array($resultado);
	if(mysqli_num_rows($resultado) == 0)
		{
		 echo "Usuario no existe o contraseña incorrecta";
		}
	else
		{
		session_start();
		$_SESSION['nombre'] = $fila['nombre'];
		$_SESSION['tipo'] = $fila['tipo'];
		if($fila['tipo'] == "admin")
			{
				mysql_free_result($resultado);
				header('Location: Admin/admin.php');
			}
		else{
				mysql_free_result($resultado);
				header('Location: Principal.php');
			}
		}
?>

 <p><a href="FormLogin.html">Volver atras</a></p>
</body>
</html>