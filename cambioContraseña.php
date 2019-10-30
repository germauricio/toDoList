<?php 

	$username = "";
	$password = "";

	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}

	$conexion = mysqli_connect("localhost", "root", "", "usuarios");

	$sql = "SELECT * FROM listausuarios WHERE usuario LIKE '%$username%'";

	$respuesta_consulta = mysqli_query($conexion, $sql);

	if($respuesta_consulta == false){
		die("No se pudo realizar la consulta");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<body>

	<form method="POST">
			<label>Usuario: </label><br>
 			<input type="text" name="username" placeholder="Nombre de Usuario" value = "<?php echo $username; ?>"><br><br>
 			<label>Contraseña: </label><br>
 			<input type="password" name="password" placeholder="Contraseña" value = "<?php echo $password; ?>"><br>
 		<button type="submit">Validar</button><br><br>
 		
 		<?php
 			$username="";
 			if(empty($_POST["username"])==false){
 				$username=$_POST["username"];
 			}
 			echo "<a href ='editarcontra.php?username=$username'>Cambiar contraseña</a>";
 		?>

	</form>

	<?php

	while($vector = mysqli_fetch_array($respuesta_consulta)){
		$pass = $vector["password"];
	}
	if(isset($pass)==false){
		die("Ese usuario no fue registrado");
	}	
	$coinciden = password_verify($password, $pass);

	if($coinciden){
		echo "El usuario es valido";
	}else{
		echo "El usuario no es valido";
	}

	?>
	</table>

</body>
</html>
