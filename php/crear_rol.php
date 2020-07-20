<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$json = file_get_contents('php://input');

$params = json_decode($json);


$sql = "INSERT INTO rol(nombre, permiso_empleado, permiso_reunion, permiso_sala_reunion) VALUES ('$params->nombre', $params->permiso_empleado , $params->permiso_reunion, $params->permiso_sala_reunion)";



mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;

		header('Content-Type: application/json');
		echo json_encode($response);  

 
?>


