<?php 
	$fecha = date("d-m-Y");
	$hora = date("H:i:s");
	$destino = "franf_14@hotmail.com";
	$asunto = "Consulta de supermercado Nogoya";
	$comentario= "
	\n 
	Nombre: $_POST[txtNombre]\n
	Email: $_POST[txtEmail]\n
	Consulta: $_POST[txtConsulta]\n
	Enviado el $fecha a las $hora\n";
	mail($destino, $asunto, $comentario);
	
	header ("Location: Contacto.php");


	$fecha2=date("d-m-Y");
	$hora2=date("H:i:s");
	$destino2=$_POST['txtEmail'];
	$asunto2="Consulta de supermercado Nogoya";
	$comentario2= "
	\n
	Su consulta ha sido enviada. Brevemente nos contactaremos con usted.\n
	Gracias.\n
	\n
	HardComp\n
	Enviado el $fecha2 a las $hora2\n";
	mail($destino2,$asunto2,$comentario2);

	header ("Location: Contacto.php");

?>
