<?php
session_start();
if(isset($_SESSION['usuario'])==false){
	die("No se puede ingresar a funcionalidades sin haber iniciado sesion");
	}
$id=$_SESSION["id"];
?>

<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="favicon.png" />
</head>
<body>
<nav class = "navbar navbar-light">
		<a href = "listadoLinkeado.php" class= "navbar-brand">Tareas Pendientes</a>
			<span class="navbar-text">
				<a href="logout.php" class ="btn btn-primary">
					<span style="color:white;">Cerrar Sesion</span>
				</a>
			</span>
	</nav>
	<hr>  

	<div class = "container" style="width: 18rem;">
	<form method = "post">
		<div class="form-group">
			<label>Nombre de tarea:<br> 
		    <input type="text" class = "form-control" name="nombre"><br>
		    </label>
		    <label>Descripcion:<br> 
		    <input type="text" class = "form-control" name="descripcion"><br>
		    </label>
		    <label>Realizada:<br>
		    <input type="radio" name="realizada" value=1>Si<br>
		    <input type="radio" name="realizada" value=0>No<br><br>
		    </label>
		    <label>Fecha Limite:</label><br>
		    <input type="date" class = "form-control" name="fechalimite"><br>
	 	    <button class="btn btn-primary" type="submit">Guardar</button>
	</form>

</body>
</html>

<?php

if($_POST){
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$realizada = $_POST['realizada'];
	$fechalimite = $_POST['fechalimite'];

	if(empty($_POST['nombre'])){
			die("No completo el campo nombre");
		}
	if(empty($_POST['descripcion'])){
			die("No completo el campo descripcion");
		}

	$tarea = '$nombre'.'$descripcion'.'$realizada'.'$fechalimite';
	$tarea_trim = trim($tarea);

	if(empty($tarea_trim)){
		die("La tarea esta rellena con espacios");
	}

	$año = date('Y');
	$mes = date('m');
	$dia= date('d');

	$fecha = $año."-".$mes."-".$dia;

	$conexion = mysqli_connect("127.0.0.1", "root", "", "todo");

	$sql = "INSERT INTO `tareas-pendientes`(`nombre`, `descripcion`, `realizada`, fecha, fechalimite, asignadoa) VALUES ('$nombre', '$descripcion', '$realizada', '$fecha', '$fechalimite', '$id')";

	$respuesta_consulta = mysqli_query($conexion,$sql);

	if($respuesta_consulta == false){
		die("No se pudo registrar la tarea");
	}

	echo "Se ha registrado la tarea";

	header("Location: listadoLinkeado.php");

	mysqli_close($conexion);
	}
?>