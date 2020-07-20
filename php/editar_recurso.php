<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include('conexion.php');

$json = file_get_contents('php://input');
	
$params = json_decode($json);

$sql = "update recurso set	nombre='$params->nombre', 
							tipo_recurso='$params->tipo_recurso', 
							cantidad=$params->cantidad 
							where id_recurso=$params->id_recurso";
	
mysqli_query($mysqli, $sql);
 
 
class Result {}

	$response = new Result();
	$response->resultado = 'OK';
	$response->mensaje = $sql;

	header('Content-Type: application/json');
	echo json_encode($response);  


?>