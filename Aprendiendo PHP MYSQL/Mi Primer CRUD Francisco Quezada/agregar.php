<?php include_once("conexion.php"); 
$con=conectar();    
	$nombre 	= $_POST['txtnom'];
    $correo 	= $_POST['txtcorreo'];
    $telefono 	= $_POST['txttel'];
    
	mysqli_query($con, "INSERT INTO usuarios(nom,correo,tel) VALUES('$nom','$correo','$tel')");
    
header("Location:index.php");
	

?>
