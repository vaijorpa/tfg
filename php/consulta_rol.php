<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$mysqli = mysqli_connect("localhost", "root", "", "tfg");

$response = array();

$sql = "SELECT * FROM rol";


if ($resultado = mysqli_query($mysqli, $sql))
{	
	while($row = mysqli_fetch_array($resultado)){
		$rol = array();
		$rol["id_rol"]=$row["id_rol"];
		$rol["nombre"]=$row["nombre"];
		$rol["permiso_empleado"]=$row["permiso_empleado"];
		$rol["permiso_reunion"]=$row["permiso_reunion"];
		$rol["permiso_sala_reunion"]=$row["permiso_sala_reunion"];
		array_push($response,$rol);
    }
	$resultado->close();
}
 $mysqli->close();
 echo json_encode($response);
 
?>

