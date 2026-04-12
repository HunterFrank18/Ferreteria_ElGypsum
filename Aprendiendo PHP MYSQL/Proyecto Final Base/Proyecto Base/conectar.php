<?php 
function conectar(){

	$server = "127.0.0.1";
	$user = "root"; // Cambiado de "root@localhost" a "root"
	$password = "";
	$db = "data1";


	$con = new mysqlli($server,$user,$password,$db);
	if($con->connect_errno){
		die("Ha ocurrido santo error");
	}
}
	/* $con = mysqli_connect($server, $user, $password, $db);
	if (mysqli_connect_errno()) { // Cambiado de $con->connect_errno() a mysqli_connect_errno()
		die("Error de conexión a la BD: " . mysqli_connect_errno()); // Cambiado de $con->connect_errno() a mysqli_connect_errno()
	}else {
		echo "conectado";
	}

	return $con;
}
?>
*/
 ?>
 