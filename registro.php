<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="favicon.png" />
</head>
<body>
	<nav class = "navbar navbar-light">
		<a href = "#" class= "navbar-brand">Tareas Pendientes</a>
			<span class="navbar-text">
				<a href="logout.php" class ="btn btn-primary">
					<span style="color:white;">Cerrar Sesion</span>
				</a>
			</span>
	</nav>
	<hr>  

	<div class = "container" style="width: 18rem;">
	<form method = "post">
		<label>Usuario:<br> 
	    <input type="text" class ="form-control" name="usuario"><br>
	    </label>
	    <label>Contraseña:<br> 
	    <input type="password" class ="form-control" name="password"><br>
	    </label>
	    <label>Apellido:<br>
	    <input type="text" class ="form-control" name="apellido"><br>
	    </label>
	    <label>Nombre:<br>
	    <input type="text" class ="form-control" name="nombre"><br>
	    </label>
 	    <button class ="btn btn-primary" type="submit">Guardar</button>	
  		</form>
	</div>
  </div>
</body>
</html>
<?php
  if($_POST){ 
	if(empty($_POST['nombre'])){
		die("No completo el campo nombre");
	}
	if(empty($_POST['usuario'])){
		die("No completo el campo usuario");
	}
	if(empty($_POST['password'])){
		die("No completo el campo contraseña");
	}
	if(empty($_POST['apellido'])){
		die("No completo el campo email");
	}

	$nombre = $_POST['nombre'];
	$password = $_POST['password'];
	$usuario = $_POST['usuario'];
	$apellido = $_POST['apellido'];


	$user = $nombre.$password.$usuario.$apellido;
	$user_trim = trim($user);

	if(empty($user_trim)){
		die("El formulario esta relleno con espacios");
	}

	//Una vez que pasa las validaciones, asigno la fecha

	$año = date('Y');
	$mes = date('m');
	$dia= date('d');

	$fecha = $año."-".$mes."-".$dia;

	$conexion = mysqli_connect("127.0.0.1", "root", "", "todo");

	$password_encriptada = password_hash($password, PASSWORD_BCRYPT);

	$sql = "INSERT INTO `listausuarios`(`usuario`, `password`, `nombre`, `apellido`, `fecha`) VALUES ('$usuario', '$password_encriptada', '$nombre', '$apellido', '$fecha')";

	$respuesta_consulta = mysqli_query($conexion,$sql);

	if($respuesta_consulta == false){
		die("No se pudo registrar la tarea");
	}

	echo "Se ha registrado un usuario";
	
	header("Location: login.php");

	mysqli_close($conexion);
 }

?>