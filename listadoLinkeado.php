<?php 
	session_start();
	if(isset($_SESSION['usuario'])==false){
		die("No se puede ingresar a funcionalidades sin haber iniciado sesion");
	}

	$realizada="";

	$nombre="";

	$conexion = mysqli_connect("localhost", "root", "", "todo");

	if(isset($_GET['realizada'])){
		$realizada = $_GET['realizada'];

	}

	if(isset($_GET['nombre'])){
		$nombre = $_GET['nombre'];
	}

	$sql = "SELECT * FROM `tareas-pendientes` WHERE nombre LIKE '%$nombre%' AND realizada LIKE '%$realizada%' AND asignadoa = '$_SESSION[id]'";

	$respuesta_consulta = mysqli_query($conexion, $sql);

	if($respuesta_consulta == false){
		die("Fallo la conexion o la consulta");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
	<form method="get" align = "center">
			<label>Realizada</label>
 			<input type="radio" name="realizada" value = 1>Si
 			<input type="radio" name="realizada" value = 0>No
 			<br>
 			<label>  Nombre: </label>
			<input type="text" name="nombre" placeholder="Filtrar por nombre" value = "<?php echo $nombre; ?>">
 		<button class = "btn btn-primary" type="submit">  Filtrar</button><br><br>
  	</form>

	  	<table class = "table" align = "center">
				<tr>

				<th>Nombre</th>

				<th>Descripcion</th>

				<th>Realizada</th>

				<th>Fecha</th>

				<th>Fecha Limite</th>
				
				<th>Editar</th>
		
				<th>Eliminar</th>
			</tr>

		<?php

			while($vector = mysqli_fetch_array($respuesta_consulta)){

			$nombre = $vector["nombre"];
			$descripcion = $vector["descripcion"];
			$fecha = $vector["fecha"];
			$realizada = $vector["realizada"];
			$fechalimite = $vector["fechalimite"];
			echo "<tr>";
			echo "<td>$nombre</td>";
			echo "<td>$descripcion</td>";
			echo "<td>";
			if($realizada){
				echo "Si";
			}else{
				echo "No";
				 }
			echo "</td>";
			echo "<td>$fecha</td>";
			echo "<td>$fechalimite</td>";
			echo "<td>";
			echo "<a href ='editar.php?id=$vector[id]&nombre=$nombre'>Editar</a>";
			echo "</td>";
			echo "<td>";
			echo "<a href ='eliminar.php?id=$vector[id]'>Eliminar tarea</a>";
			echo "</td>";
			echo "</tr>";

			}

		?>
	</table>

	<form method="get" action="agregarTareas.php" align = "center">
				<button class ="btn btn-primary" type="submit">Agregar Tarea</button>
	</form><br>
  </div>
</body>
</html>