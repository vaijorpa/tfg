<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include('conexion.php');

$json = file_get_contents('php://input');

$params = json_decode($json);


$sql = "insert into empleado(id_rol, nombre, apellidos, email, password_hash) values ($params->id_rol, '$params->nombre', '$params->apellidos', '$params->email', '$params->password_hash')";

mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;

		header('Content-Type: application/json');
		echo json_encode($response);  

?>