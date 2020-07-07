<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$mysqli = mysqli_connect("localhost", "root", "", "tfg");

	$json = file_get_contents('php://input');
 
	$params = json_decode($json);

	$sql = "update rol set nombre='$params->nombre', 
							permiso_empleado=$params->permiso_empleado,
							permiso_reunion=$params->permiso_reunion, 
							permiso_sala_reunion=$params->permiso_sala_reunion
							where id_rol=$params->id_rol";
	mysqli_query($mysqli, $sql);
 
 
	class Result {}

	$response = new Result();
	$response->resultado = 'OK';
	$response->mensaje = $sql;

	header('Content-Type: application/json');
	echo json_encode($response);  

 
?>


