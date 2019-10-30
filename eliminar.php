<?php
	session_start();
	if(isset($_SESSION['usuario'])==false){
		die("No se puede ingresar a funcionalidades sin haber iniciado sesion");
	}
	
	$conexion = mysqli_connect("localhost", "root", "", "todo");
	$sql = "DELETE FROM `tareas-pendientes` where id=$_GET[id]";
	$respuesta = mysqli_query($conexion, $sql);
	
	if($respuesta){
		echo "La tarea fue borrada con exito";
		header("Location: listadoLinkeado.php");
	}
?>