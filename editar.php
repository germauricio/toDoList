<?php
	session_start();
	if(isset($_SESSION['usuario'])==false){
		die("No se puede ingresar a funcionalidades sin haber iniciado sesion");
	}

	$nombre="";
	$realizada=0;
	$id=0;
	$conexion = mysqli_connect("localhost", "root", "", "todo");
	$sql = "select * from `tareas-pendientes` where id=$_GET[id]";
	$respuesta = mysqli_query($conexion, $sql);
	
	if($registro = mysqli_fetch_array($respuesta)){
		$id=$registro['id'];
		$nombre=$registro['nombre'];
		$realizada=$registro['realizada'];
		$descripcion=$registro['descripcion'];
		$fechalimite=$registro['fechalimite'];
	}
?>
​
<html>
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="favicon.png" />
	
  </head>
	<body>
		<nav class = "navbar navbar-light">
		<a href = "listadoLinkeado.php" class= "navbar-brand">To Do <span style="color:gray">List</span></a>
			<span class="navbar-text">
				<a href="logout.php" class ="btn btn-primary">
					<span style="color:white;">Cerrar Sesion</span>
				</a>
			</span>
	</nav>
	<hr>  

	<div class = "container" style="width: 18rem;">
		<form method="POST" align ="center">
			<label>Nombre de la tarea: </label>
			<input type="text" class ="form-control"name="nombre" value="<?php echo $nombre; ?>"><br>
			<label>Descripcion de la tarea: </label>
			<input type="text" class ="form-control" name ="descripcion" value="<?php echo $descripcion; ?>"><br>
			<label>La tarea fue realizada:</label><br>
			<input type="radio" name="realizada" value=1>Si<br>
		    <input type="radio" name="realizada" value=0>No<br>
		    <label>Fecha limite para realizar:</label><br>
		    <input type="date" class ="form-control" name="fechalimite" value="<?php echo $fechalimite; ?>"><br>
			<button class="btn btn-primary" type="submit">Actualizar</button>
		</form>
	</div>
	</body>
</html>


<?php

if(empty($_POST)==false){
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	$realizada = $_POST["realizada"];
	$fechalimite = $_POST["fechalimite"];
	$sql = "UPDATE `tareas-pendientes` SET nombre = '$nombre', descripcion = '$descripcion', realizada = '$realizada', fechalimite = '$fechalimite' WHERE id = '$id'";
	$conexion = mysqli_connect("localhost", "root", "", "todo");
	$respuesta = mysqli_query($conexion, $sql);
	
	if($respuesta){
	header("Location: listadoLinkeado.php?&nombre=$nombre");
	}else{
	echo "No se pudo actualizar";
	}
}

?>