<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$json = file_get_contents('php://input');
	
$params = json_decode($json);

$sql = "update sala set	nombre='$params->nombre', 
							localizacion='$params->localizacion',
							capacidad='$params->capacidad', 
							disponibilidad='$params->disponibilidad'
							where id_sala=$params->id_sala";
	
mysqli_query($mysqli, $sql);
 
 
class Result {}

	$response = new Result();
	$response->resultado = 'OK';
	$response->mensaje = $sql;

	header('Content-Type: application/json');
	echo json_encode($response);  

?>


  