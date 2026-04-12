<?php 
function conectar(){

	$server = "127.0.0.1";
	$user = "root"; 
	$password = "";
	$db = "crud";
$con = new mysqli($server, $user, $password,$db); 
 if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
	$con = mysqli_connect($server, $user, $password, $db);
	if (mysqli_connect_errno()) { 
		die("Error de conexión a la BD: " . mysqli_connect_errno()); 
	}else {
		echo "conectado";
	}

	//return $con;
}
?>
