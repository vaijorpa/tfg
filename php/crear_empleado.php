<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$json = file_get_contents('php://input');

$params = json_decode($json);

$mysqli = mysqli_connect("localhost", "root", "", "tfg");
$sql = "insert into empleado(id_rol, nombre, apellidos, email, password) values ($params->id_rol, '$params->nombre', '$params->apellidos', '$params->email', '$params->password')";

mysqli_query($mysqli, $sql);

		class Result {}

		$response = new Result();
		$response->resultado = 'OK';
		$response->mensaje = $sql;

		header('Content-Type: application/json');
		echo json_encode($response);  

?>