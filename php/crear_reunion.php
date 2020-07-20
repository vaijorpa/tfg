<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$json = file_get_contents('php://input');

$params = json_decode($json);


$sql = "INSERT INTO reunion(id_sala, hora_inicio, hora_fin, fecha, concepto) VALUES ($params->id_sala, '$params->hora_inicio', '$params->hora_fin' , '$params->fecha', '$params->concepto')";



mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;

		header('Content-Type: application/json');
		echo json_encode($response);  

 
?>




