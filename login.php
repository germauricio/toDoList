<?php
	$password="";
	$username ="";
?>
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
		<form method="POST" align ="center">
			<div class="form-group">
				<label>Usuario: </label><br>
		 		<input type="text" class="form-control" name="username" placeholder="Nombre de Usuario"><br><br>
		 		<label>Contraseña: </label><br>
		 		<input type="password" class="form-control" name="password" placeholder="Contraseña"><br>		 	
				<a href="editarcontra.php">Cambiar contraseña</a><br><br>
		 		<button class="btn btn-primary" type="submit">Validar</button><br><br>
		 		<a href ="registro.php" >Registrarse</a>
	 		</div>
		 </form>
	</div>

	
	<?php

	if($_POST){
	$username = $_POST["username"];
	$password = $_POST["password"];

	$conexion = mysqli_connect("localhost", "root", "", "todo");

	$sql = "SELECT * FROM listausuarios WHERE usuario = '$username'";

	$respuesta = mysqli_query($conexion, $sql);
	
	while($vector = mysqli_fetch_array($respuesta)){
		$pass = $vector["password"];
		$id= $vector["id"];
	}
	if(isset($pass)==false){
		die("Ese usuario no fue registrado");
	}	
	$coinciden = password_verify($password, $pass);

	if($coinciden){
		echo "El usuario es valido";

		session_start();
		$_SESSION['usuario']=$username;
		$_SESSION['id']=$id;
		header("Location: listadoLinkeado.php");
	}else{
		echo "El usuario no es valido<br>";

		}
	}
?>

</body>
</html>
