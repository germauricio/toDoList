<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="favicon.png" />
</head>
	<body>

	<nav class = "navbar navbar-light">
		<a href = "#" class= "navbar-brand">Tareas Pendientes<span style="color:gray"></span></a>
			<span class="navbar-text">
				<a href="logout.php" class ="btn btn-primary">
					<span style="color:white;">Cerrar Sesion</span>
				</a>
			</span>
	</nav>
	<hr>  
	<div class = "container" style="width: 18rem;">
		<form method="POST">
			<label>Usuario</label>
			<input class="form-control" type="text" name="username"><br>
			<label>Nueva Contraseña</label>
			<input class="form-control" type="password" name="password"><br>
			<button class ="btn btn-primary" type="submit">Actualizar contraseña</button>
		</form>
	</body>
</html>


<?php

	$conexion = mysqli_connect("localhost", "root", "", "todo");

if($_POST){

	$password = $_POST["password"];
	$user = $_POST["username"];
	$password_encriptada = password_hash($password, PASSWORD_BCRYPT);
	$sql = "UPDATE listausuarios SET password = '$password_encriptada' WHERE usuario = '$user'";
	$respuesta = mysqli_query($conexion, $sql);
	
	if($respuesta){
		header("Location: login.php");
	}else{
	echo "No se pudo actualizar";
	}
}

?>