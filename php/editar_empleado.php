<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include('conexion.php');

$json = file_get_contents('php://input');
	
$params = json_decode($json);

$sql = "update empleado set	id_rol=$params->id_rol, 
							nombre='$params->nombre',
							apellidos='$params->apellidos', 
							email='$params->email', 
							password_hash='$params->password_hash'
							where id_persona=$params->id_persona";
	
mysqli_query($mysqli, $sql);
 
 
class Result {}

	$response = new Result();
	$response->resultado = 'OK';
	$response->mensaje = $sql;

	header('Content-Type: application/json');
	echo json_encode($response);  


?>